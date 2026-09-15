<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_sales' => Order::whereIn('status', ['confirmed', 'processing', 'shipped', 'delivered'])->sum('total'),
            'orders_count' => Order::count(),
            'clients_count' => User::where('role', 'customer')->count(),
            'products_count' => Product::count(),
        ];

        $recentOrders = Order::with('user')->latest()->take(5)->get();

        $lowStockProducts = Product::where('stock_quantity', '<=', 5)
            ->where('status', 'active')
            ->orderBy('stock_quantity')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentOrders', 'lowStockProducts'));
    }
}