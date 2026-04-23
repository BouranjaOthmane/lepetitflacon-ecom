<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Services\StripeService;
use App\Services\StockService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderService
{
    protected $stripeService;
    protected $stockService;
    protected $orderRepository, $productRepository;

    public function __construct(StripeService $stripeService, StockService $stockService, OrderRepository $orderRepository, ProductRepository $productRepository)
    {
        $this->stripeService = $stripeService;
        $this->stockService = $stockService;
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Get user orders.
     */
    public function getUserOrders(User $user, int $perPage = 10): LengthAwarePaginator
    {
        return $this->orderRepository->getPaginatedOrdersForUser($user->id, $perPage);
    }

    /**
     * Get paginated orders for admin.
     */
    public function getPaginatedOrders(int $perPage = 10): LengthAwarePaginator
    {
        return $this->orderRepository->getPaginatedOrders($perPage);
    }

    /**
     * Get order statistics for dashboard.
     */
    public function getOrderStats(): array
    {
        return [
            'total_orders' => $this->orderRepository->count(),
            'pending' => $this->orderRepository->countByStatus('pending'),
            'shipped' => $this->orderRepository->countByStatus('shipped'),
            'completed' => $this->orderRepository->countByStatus('completed'),
            'cancelled' => $this->orderRepository->countInStatuses(['cancelled', 'canceled']),
            'total_revenue' => $this->orderRepository->getTotalRevenue(),
        ];
    }

    /**
     * Get single order details.
     */

    public function getOrderDetails(User $user, $orderId): Order
    {
        $order = Order::findOrFail($orderId);
        // if ($order->user_id !== $user->id) {
        //     throw new \Exception('Unauthorized', 403);
        // }

        return $this->orderRepository->getOrderWithDetails($orderId);
    }

    /**
     * Process checkout and create order.
     */
    public function checkout(User $user, array $data): array
    {
        return DB::transaction(function () use ($user, $data) {
            $total = 0;
            $itemsData = [];

            foreach ($data['items'] as $itemData) {
                $product = $this->productRepository->findOrFail($itemData['product_id']);
                $itemTotal = $product->price * $itemData['quantity'];
                $total += $itemTotal;

                $itemsData[] = [
                    'product_id' => $product->id,
                    'quantity' => $itemData['quantity'],
                    'price' => $product->price,
                    'purchase_price' => $product->purchase_price,
                    'sale_price' => $product->sale_price,
                    'profit' => ($product->price - $product->purchase_price) * $itemData['quantity'],
                ];
            }

            $order = $this->orderRepository->create([
                'user_id' => $user->id,
                'order_number' => 'ORD-' . strtoupper(Str::random(10)),
                'total' => $total,
                'payment_method' => $data['payment_method'],
                'payment_status' => 'pending',
                'status' => 'pending',
                'address_details' => $data['address_details'],
            ]);

            foreach ($itemsData as $item) {
                $order->items()->create($item);

                // Now decrease stock after order creation
                $product =  $product = $this->productRepository->findOrFail($itemData['product_id']);
                $this->stockService->decrease($product, $item['quantity'], "API Order: " . $order->order_number);
            }

            $result = ['order' => $order];

            if ($data['payment_method'] === 'stripe') {
                $paymentIntent = $this->stripeService->createPaymentIntent($order);
                if ($paymentIntent) {
                    $result['client_secret'] = $paymentIntent->client_secret;
                } else {
                    throw new \Exception('Stripe PaymentIntent creation failed.');
                }
            }

            return $result;
        });
    }


    public function updateOrderStatus($orderId, string $status): Order
    {
        $order = Order::findOrFail($orderId);

        $validStatuses = ['pending', 'processing', 'shipped', 'delivered', 'completed', 'cancelled', 'canceled'];

        if (!in_array($status, $validStatuses)) {
            throw new \Exception('Invalid status: ' . $status);
        }

        $order->status = $status;

        // Auto-update payment status based on order status
        if (in_array($status, ['completed', 'delivered'])) {
            $order->payment_status = 'paid';
        } elseif (in_array($status, ['cancelled', 'canceled'])) {
            $order->payment_status = 'refunded';
        }

        $order->save();

        return $order;
    }


    public function updateOrderShipping($orderId, array $data): Order
    {
        $order = Order::findOrFail($orderId);

        if (isset($data['shipping_company'])) {
            $order->shipping_company = $data['shipping_company'];
        }

        if (isset($data['tracking_number'])) {
            $order->tracking_number = $data['tracking_number'];
        }

        $order->save();

        return $order;
    }
}
