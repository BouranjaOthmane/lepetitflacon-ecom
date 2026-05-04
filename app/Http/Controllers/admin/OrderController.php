<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    protected $orderService;

    /**
     * OrderController constructor.
     *
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $orders = $this->orderService->getPaginatedOrders(10);
        $orderStats = $this->orderService->getOrderStats();

        if ($request->ajax()) {
            return view('admin.sections.orders', compact('orders', 'orderStats'))->render();
        }

        return view('admin.orders.index', compact('orders', 'orderStats'));
    }

    public function show($id)
    {
        $user = auth()->user(); // Get authenticated user
        $order = $this->orderService->getOrderDetails($user, $id);
        return response()->json($order);
    }

    public function updateStatus(Request $request, $id)
    {
        $this->orderService->updateOrderStatus($id, $request->status);
        return response()->json(['success' => true, 'message' => 'تم تحديث حالة الطلب بنجاح']);
    }

    public function updateShipping(Request $request, $id)
    {
        $request->validate([
            'shipping_company' => 'required|string|max:255',
            'tracking_number' => 'required|string|max:255',
        ]);

        $this->orderService->updateOrderShipping($id, $request->only(['shipping_company', 'tracking_number']));

        return response()->json(['success' => true, 'message' => 'تم تحديث بيانات الشحن بنجاح']);
    }

    public function destroy($id)
    {
        $this->orderService->deleteOrder($id);
        return back()->with('success', 'Commande supprimée avec succès');
    }
    

    public function details(Order $order)
    {
        $order->load(['user', 'items.product']);

        return response()->json([
            'order_number' => $order->order_number,
            'status' => $order->status,
            'payment_status' => $order->payment_status,
            'payment_method' => $order->payment_method,
            'total' => $order->total,
            'created_at' => $order->created_at->format('d/m/Y H:i'),
            'customer' => [
                'name' => $order->user->name ?? 'Client inconnu',
                'email' => $order->user->email ?? '',
            ],
            'shipping' => [
                'company' => $order->shipping_company,
                'tracking_number' => $order->tracking_number,
            ],
            'items' => $order->items->map(function ($item) {
                return [
                    'name' => $item->product?->getTranslation('name', 'fr') ?? $item->product?->name ?? 'Produit supprimé',
                    'size' => $item->size ?? null,
                    'quantity' => $item->quantity ?? $item->qty ?? 1,
                    'price' => $item->price,
                    'total' => ($item->price * ($item->quantity ?? $item->qty ?? 1)),
                ];
            }),
        ]);
    }
}
