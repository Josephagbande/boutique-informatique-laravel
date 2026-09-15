@extends('admin.layout')

@section('title', 'Commandes')

@section('content')

    <h1 class="font-display text-2xl font-bold mb-8">Commandes</h1>

    <div class="bg-white border border-gray-200">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 text-left text-xs font-mono uppercase text-titanium">
                    <th class="p-3">N° commande</th>
                    <th class="p-3">Client</th>
                    <th class="p-3">Date</th>
                    <th class="p-3">Total</th>
                    <th class="p-3">Statut</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr class="border-b border-gray-200">
                        <td class="p-3 font-mono">{{ $order->order_number }}</td>
                        <td class="p-3">{{ $order->user->name }}</td>
                        <td class="p-3 text-titanium">{{ $order->created_at->format('d/m/Y') }}</td>
                        <td class="p-3 font-mono">{{ number_format($order->total, 0, ',', ' ') }} FCFA</td>
                        <td class="p-3">
                            <span class="text-xs font-mono uppercase text-royal">{{ $order->status }}</span>
                        </td>
                        <td class="p-3 text-right">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-royal hover:underline text-xs font-mono">DÉTAILS</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-titanium">Aucune commande.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $orders->links() }}
    </div>

@endsection