@extends('layouts.app')

@section('title', 'Mes commandes — TechShop')

@section('content')

    <div class="mb-8">
        <p class="font-mono text-xs text-royal uppercase tracking-widest mb-1">Compte</p>
        <h1 class="font-display text-3xl font-bold">Mes commandes</h1>
    </div>

    @if ($orders->isEmpty())
        <p class="text-titanium">Tu n'as pas encore passé de commande.</p>
    @else
        <div class="bg-white border border-gray-200 divide-y divide-gray-200">
            @foreach ($orders as $order)
                <a href="{{ route('orders.confirmation', $order) }}" class="flex justify-between items-center p-4 hover:bg-gray-50 transition">
                    <div>
                        <p class="font-mono text-sm font-medium">{{ $order->order_number }}</p>
                        <p class="text-xs text-titanium">{{ $order->created_at->format('d/m/Y') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-mono font-semibold text-sm">{{ number_format($order->total, 0, ',', ' ') }} FCFA</p>
                        <p class="text-xs text-royal font-mono uppercase">{{ $order->status }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

@endsection