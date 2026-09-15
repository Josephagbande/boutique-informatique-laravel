@extends('admin.layout')

@section('title', 'Clients')

@section('content')

    <h1 class="font-display text-2xl font-bold mb-8">Clients</h1>

    <div class="bg-white border border-gray-200">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 text-left text-xs font-mono uppercase text-titanium">
                    <th class="p-3">Nom</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Téléphone</th>
                    <th class="p-3">Commandes</th>
                    <th class="p-3">Inscrit le</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr class="border-b border-gray-200">
                        <td class="p-3 font-medium">{{ $client->name }}</td>
                        <td class="p-3 text-titanium">{{ $client->email }}</td>
                        <td class="p-3 font-mono">{{ $client->phone ?? '—' }}</td>
                        <td class="p-3 font-mono">{{ $client->orders_count }}</td>
                        <td class="p-3 text-titanium">{{ $client->created_at->format('d/m/Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-titanium">Aucun client.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $clients->links() }}
    </div>

@endsection