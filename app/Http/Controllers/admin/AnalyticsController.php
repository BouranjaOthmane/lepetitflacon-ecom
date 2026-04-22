<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AnalyticsService;
use Illuminate\Http\Request;
use App\Services\OrderService;

class AnalyticsController extends Controller
{
    protected $analyticsService;
    protected $orderService;

    public function __construct(AnalyticsService $analyticsService, OrderService $orderService,)
    {
        $this->analyticsService = $analyticsService;
        $this->orderService = $orderService;
    }

    /**
     * Display the analytics dashboard.
     */
    public function index()
    {
        $kpis = $this->analyticsService->getKPIMetrics();
        $revenueTrends = $this->analyticsService->getRevenueTrends();
        $topProducts = $this->analyticsService->getTopProducts();
        $topCustomers = $this->analyticsService->getTopCustomers();
        $recentOrders = $this->orderService->getPaginatedOrders(5);
        $recentActivities = \App\Models\ActivityLog::with('user')->latest()->take(10)->get();

        return view('admin.analytics.index', compact(
            'kpis', 
            'revenueTrends', 
            'topProducts', 
            'topCustomers',
            'recentOrders',
            'recentActivities'
        ));
    }
}
