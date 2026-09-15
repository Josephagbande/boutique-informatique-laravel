@extends('admin.layout')

@section('title', 'Tableau de bord')

@section('content')

    <h1 class="font-display text-2xl font-bold mb-8">Tableau de bord</h1>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mb-10">
        <div class="bg-white border border-gray-200 p-5">
            <p class="text-xs font-mono uppercase text-titanium mb-2">Chiffre d'affaires</p>
            <p class="font-display text-2xl font-bold">{{ number_format($stats['total_sales'], 0, ',', ' ') }} <span class="text-sm font-normal">FCFA</span></p>
        </div>
        <div class="bg-white border border-gray-200 p-5">
            <p class="text-xs font-mono uppercase text-titanium mb-2">Commandes</p>
            <p class="font-display text-2xl font-bold">{{ $stats['orders_count'] }}</p>
        </div>
        <div class="bg-white border border-gray-200 p-5">
            <p class="text-xs font-mono uppercase text-titanium mb-2">Clients</p>
            <p class="font-display text-2xl font-bold">{{ $stats['clients_count'] }}</p>
        </div>
        <div class="bg-white border border-gray-200 p-5">
            <p class="text-xs font-mono uppercase text-titanium mb-2">Produits</p>
            <p class="font-display text-2xl font-bold">{{ $stats['products_count'] }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- Commandes récentes --}}
        <div>
            <h2 class="font-display font-semibold mb-3">Commandes récentes</h2>
            <div class="bg-white border border-gray-200 divide-y divide-gray-200">
                @forelse ($recentOrders as $order)
                    <a href="{{ route('admin.orders.show', $order) }}" class="flex justify-between items-center p-4 text-sm hover:bg-gray-50">
                        <div>
                            <p class="font-mono">{{ $order->order_number }}</p>
                            <p class="text-xs text-titanium">{{ $order->user->name }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-mono font-semibold">{{ number_format($order->total, 0, ',', ' ') }} FCFA</p>
                            <p class="text-xs text-royal font-mono uppercase">{{ $order->status }}</p>
                        </div>
                    </a>
                @empty
                    <p class="p-4 text-sm text-titanium">Aucune commande pour le moment.</p>
                @endforelse
            </div>
        </div>

        {{-- Stock faible --}}
        <div>
            <h2 class="font-display font-semibold mb-3">Stock faible</h2>
            <div class="bg-white border border-gray-200 divide-y divide-gray-200">
                @forelse ($lowStockProducts as $product)
                    <a href="{{ route('admin.products.edit', $product) }}" class="flex justify-between items-center p-4 text-sm hover:bg-gray-50">
                        <span>{{ $product->name }}</span>
                        <span class="font-mono text-red-500">{{ $product->stock_quantity }} restant(s)</span>
                    </a>
                @empty
                    <p class="p-4 text-sm text-titanium">Aucun produit en stock faible.</p>
                @endforelse
            </div>
        </div>

    </div>

@endsection