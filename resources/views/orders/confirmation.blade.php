@extends('layouts.app')

@section('title', 'Commande confirmée — TechShop')

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="bg-terminal/10 border border-terminal/30 p-6 text-center mb-6">
            <p class="font-display text-xl font-bold text-terminal mb-1">Commande confirmée</p>
            <p class="text-sm font-mono text-titanium">N° {{ $order->order_number }}</p>
        </div>

        <div class="bg-white border border-gray-200 p-6">

            <h2 class="font-display font-semibold mb-3">Articles commandés</h2>
            <div class="divide-y divide-gray-200 font-mono text-sm">
                @foreach ($order->items as $item)
                    <div class="flex justify-between py-2">
                        <span>{{ $item->product->name }} x{{ $item->quantity }}</span>
                        <span>{{ number_format($item->subtotal, 0, ',', ' ') }} FCFA</span>
                    </div>
                @endforeach
            </div>

            <div class="border-t border-gray-200 mt-4 pt-4 space-y-1 text-sm font-mono">
                <div class="flex justify-between">
                    <span class="text-titanium">Sous-total</span>
                    <span>{{ number_format($order->subtotal, 0, ',', ' ') }} FCFA</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-titanium">Livraison</span>
                    <span>{{ number_format($order->shipping_cost, 0, ',', ' ') }} FCFA</span>
                </div>
                @if ($order->discount_amount)
                    <div class="flex justify-between text-champagne">
                        <span>Remise ({{ $order->promo_code }})</span>
                        <span>-{{ number_format($order->discount_amount, 0, ',', ' ') }} FCFA</span>
                    </div>
                @endif
                <div class="flex justify-between font-display font-bold text-base pt-2 border-t border-gray-200">
                    <span>Total</span>
                    <span>{{ number_format($order->total, 0, ',', ' ') }} FCFA</span>
                </div>
            </div>

            <div class="border-t border-gray-200 mt-4 pt-4 text-sm space-y-1">
                <p><strong>Adresse de livraison :</strong> {{ $order->shipping_address }}</p>
                <p><strong>Statut du paiement :</strong>
                    <span class="text-terminal font-mono">{{ $order->payment->status === 'paid' ? 'PAYÉ' : strtoupper($order->payment->status) }}</span>
                </p>
                <p><strong>Statut de la commande :</strong> <span class="font-mono">{{ strtoupper($order->status) }}</span></p>
            </div>

        </div>

        <a href="{{ route('products.index') }}" class="inline-block mt-6 font-mono text-xs text-royal hover:underline">
            &larr; RETOUR AUX PRODUITS
        </a>

    </div>

@endsection