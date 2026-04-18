<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class CheckoutController extends Controller
{
    public function placeOrder(Request $request)
    {
        try {
            $validated = $request->validate([
                'firstName'       => 'required|string|max:255',
                'lastName'        => 'required|string|max:255',
                'email'           => 'required|email|max:255',
                'phone'           => 'required|string|max:50',
                'address'         => 'required|string|max:500',
                'city'            => 'required|string|max:255',
                'zip'             => 'nullable|string|max:50',
                'country'         => 'required|string|max:255',
                'total'           => 'required|numeric|min:0',
                'payment_method'  => 'required|in:card,stripe,paypal,cod',
                'redeem_points'   => 'nullable|integer|min:0',
                'items'           => 'required|array|min:1',
                'items.*.id'      => 'required|integer|exists:products,id',
                'items.*.qty'     => 'required|integer|min:1',
                'items.*.price'   => 'required|numeric|min:0',
            ]);

            return DB::transaction(function () use ($request, $validated) {

                // 1) Stock check with locking
                foreach ($validated['items'] as $item) {
                    $product = \App\Models\Product::lockForUpdate()->find($item['id']);

                    if (!$product || $product->stock_quantity < $item['qty']) {
                        throw new \Exception('المنتج "' . ($product ? $product->name : 'Unknown') . '" غير متوفر في المخزون.');
                    }
                }

                $paymentMethod = $validated['payment_method'];

                // COD => pending
                // Stripe/Card => pending until payment success
                // PayPal => pending until integration success
                $paymentStatus = 'pending';

                $order = Order::create([
                    'user_id' => auth()->id(),
                    'order_number' => 'LP-' . date('Ymd') . '-' . rand(1000, 9999),
                    'total' => $validated['total'],
                    'status' => 'pending',
                    'address_details' => [
                        'first_name' => $validated['firstName'],
                        'last_name'  => $validated['lastName'],
                        'email'      => $validated['email'],
                        'phone'      => $validated['phone'],
                        'address'    => $validated['address'],
                        'city'       => $validated['city'],
                        'zip'        => $validated['zip'] ?? null,
                        'country'    => $validated['country'],
                    ],
                    'payment_method' => $paymentMethod,
                    'payment_status' => $paymentStatus,
                ]);

                $stockService = app(\App\Services\StockService::class);

                foreach ($validated['items'] as $item) {
                    $product = \App\Models\Product::find($item['id']);

                    $purchasePrice = $product ? $product->purchase_price : 0;
                    $salePrice = $item['price'];
                    $profit = ($salePrice - $purchasePrice) * $item['qty'];

                    \App\Models\OrderItem::create([
                        'order_id'       => $order->id,
                        'product_id'     => $item['id'],
                        'quantity'       => $item['qty'],
                        'price'          => $salePrice,
                        'purchase_price' => $purchasePrice,
                        'sale_price'     => $salePrice,
                        'profit'         => $profit,
                    ]);

                    if ($product) {
                        $stockService->decrease($product, $item['qty'], "طلب رقم #{$order->order_number}");
                    }
                }

                // Loyalty points
                if (auth()->check() && $request->redeem_points > 0) {
                    $loyaltyService = app(\App\Services\LoyaltyService::class);
                    $loyaltyService->redeemPoints(auth()->user(), $request->redeem_points, $order);
                }

                // Admin notification
                $admins = User::where('role', 'Admin')->get();
                if ($admins->isNotEmpty()) {
                    Notification::send($admins, new NewOrderNotification($order));
                }

                /**
                 * مهم:
                 * - COD: يمكن نعتبر الطلب مكتمل من ناحية إنشاء الفاتورة مباشرة
                 * - Stripe/Card: لا تطلق OrderCompleted هنا إلا بعد نجاح الدفع
                 */
                if ($paymentMethod === 'cod') {
                    event(new \App\Events\OrderCompleted($order));
                }

                return response()->json([
                    'success' => true,
                    'order_id' => $order->id,
                    'order_number' => $order->order_number,
                    'payment_method' => $paymentMethod,
                    'message' => $paymentMethod === 'cod'
                        ? 'Merci, votre commande a bien été enregistrée. Le règlement se fera à la livraison.'
                        : 'Merci, votre commande a bien été enregistrée. Veuillez maintenant procéder au paiement pour la valider.'
                ]);
            });
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->validator->errors()->first()
            ], 422);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Order Creation Failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 422);
        }
    }
}
