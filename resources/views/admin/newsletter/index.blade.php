@extends('admin.layout')

@section('title', 'Newsletter')

@section('content')

    <div class="flex justify-between items-center mb-8">
        <h1 class="font-display text-2xl font-bold">Abonnés newsletter</h1>
        <span class="font-mono text-sm text-titanium">{{ $subscribers->total() }} inscrit(s)</span>
    </div>

    <div class="bg-white border border-gray-200">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 text-left text-xs font-mono uppercase text-titanium">
                    <th class="p-3">Email</th>
                    <th class="p-3">Inscrit le</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($subscribers as $subscriber)
                    <tr class="border-b border-gray-200">
                        <td class="p-3 font-mono">{{ $subscriber->email }}</td>
                        <td class="p-3 text-titanium">{{ $subscriber->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="p-6 text-center text-titanium">Aucun abonné pour le moment.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $subscribers->links() }}
    </div>

@endsection