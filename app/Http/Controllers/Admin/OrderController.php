<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('user')->latest()->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        $order->load('items.product', 'user', 'payment', 'delivery');

        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,confirmed,processing,shipped,delivered,cancelled'],
        ]);

        $order->update(['status' => $validated['status']]);

        // Synchronise le statut de livraison quand c'est pertinent
        if ($order->delivery) {
            $deliveryStatusMap = [
                'processing' => 'preparing',
                'shipped' => 'shipped',
                'delivered' => 'delivered',
            ];

            if (isset($deliveryStatusMap[$validated['status']])) {
                $order->delivery->update(['status' => $deliveryStatusMap[$validated['status']]]);
            }
        }

        return back()->with('success', 'Statut de la commande mis à jour.');
    }
}