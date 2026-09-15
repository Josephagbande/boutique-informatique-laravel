@extends('admin.layout')

@section('title', 'Commande ' . $order->order_number)

@section('content')

    <a href="{{ route('admin.orders.index') }}" class="font-mono text-xs text-royal hover:underline">&larr; RETOUR AUX COMMANDES</a>

    <h1 class="font-display text-2xl font-bold mt-4 mb-8">{{ $order->order_number }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <div class="md:col-span-2">
            <div class="bg-white border border-gray-200 p-6 mb-6">
                <h2 class="font-display font-semibold mb-4">Articles</h2>
                <div class="divide-y divide-gray-200 text-sm">
                    @foreach ($order->items as $item)
                        <div class="flex justify-between py-2">
                            <span>{{ $item->product->name }} x{{ $item->quantity }}</span>
                            <span class="font-mono">{{ number_format($item->subtotal, 0, ',', ' ') }} FCFA</span>
                        </div>
                    @endforeach
                </div>
                <div class="border-t border-gray-200 mt-4 pt-4 flex justify-between font-display font-bold">
                    <span>Total</span>
                    <span class="font-mono">{{ number_format($order->total, 0, ',', ' ') }} FCFA</span>
                </div>
            </div>

            <div class="bg-white border border-gray-200 p-6">
                <h2 class="font-display font-semibold mb-3">Client & livraison</h2>
                <p class="text-sm"><strong>Client :</strong> {{ $order->user->name }} ({{ $order->user->email }})</p>
                <p class="text-sm mt-1"><strong>Adresse :</strong> {{ $order->shipping_address }}</p>
                @if ($order->delivery)
                    <p class="text-sm mt-1"><strong>Téléphone :</strong> {{ $order->delivery->phone }}</p>
                @endif
                @if ($order->payment)
                    <p class="text-sm mt-1"><strong>Paiement :</strong> {{ strtoupper($order->payment->status) }} ({{ $order->payment->method }})</p>
                @endif
            </div>
        </div>

        <div>
            <div class="bg-white border border-gray-200 p-5">
                <h2 class="font-display font-semibold mb-3">Statut</h2>
                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PUT')
                    <select name="status" class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
                        @foreach (['pending', 'confirmed', 'processing', 'shipped', 'delivered', 'cancelled'] as $status)
                            <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="w-full bg-obsidian text-ivory font-medium py-2 hover:bg-electric transition text-sm">
                        Mettre à jour
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection