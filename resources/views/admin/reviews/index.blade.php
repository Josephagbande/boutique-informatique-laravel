@extends('admin.layout')

@section('title', 'Avis clients')

@section('content')

    <h1 class="font-display text-2xl font-bold mb-8">Avis clients</h1>

    <div class="bg-white border border-gray-200">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 text-left text-xs font-mono uppercase text-titanium">
                    <th class="p-3">Produit</th>
                    <th class="p-3">Client</th>
                    <th class="p-3">Note</th>
                    <th class="p-3">Commentaire</th>
                    <th class="p-3">Statut</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reviews as $review)
                    <tr class="border-b border-gray-200">
                        <td class="p-3">{{ $review->product->name }}</td>
                        <td class="p-3 text-titanium">{{ $review->user->name }}</td>
                        <td class="p-3 text-champagne">{{ str_repeat('★', $review->rating) }}</td>
                        <td class="p-3 text-titanium max-w-xs truncate">{{ $review->comment ?? '—' }}</td>
                        <td class="p-3">
                            <span class="text-xs font-mono uppercase
                                {{ $review->status === 'approved' ? 'text-terminal' : ($review->status === 'rejected' ? 'text-red-500' : 'text-titanium') }}">
                                {{ $review->status }}
                            </span>
                        </td>
                        <td class="p-3 text-right space-x-3">
                            @if ($review->status !== 'approved')
                                <form action="{{ route('admin.reviews.approve', $review) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-terminal hover:underline text-xs font-mono">APPROUVER</button>
                                </form>
                            @endif
                            @if ($review->status !== 'rejected')
                                <form action="{{ route('admin.reviews.reject', $review) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-red-500 hover:underline text-xs font-mono">REJETER</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-titanium">Aucun avis.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $reviews->links() }}
    </div>

@endsection