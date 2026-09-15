@extends('admin.layout')

@section('title', 'Promotions')

@section('content')

    <div class="flex justify-between items-center mb-8">
        <h1 class="font-display text-2xl font-bold">Promotions</h1>
        <a href="{{ route('admin.promotions.create') }}" class="bg-obsidian text-ivory font-medium px-4 py-2 text-sm hover:bg-electric transition">
            + Nouveau code
        </a>
    </div>

    <div class="bg-white border border-gray-200">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 text-left text-xs font-mono uppercase text-titanium">
                    <th class="p-3">Code</th>
                    <th class="p-3">Remise</th>
                    <th class="p-3">Utilisations</th>
                    <th class="p-3">Expire le</th>
                    <th class="p-3">Statut</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($promotions as $promotion)
                    <tr class="border-b border-gray-200">
                        <td class="p-3 font-mono font-semibold">{{ $promotion->code }}</td>
                        <td class="p-3 font-mono">
                            {{ $promotion->discount_type === 'percentage' ? $promotion->discount_value . '%' : number_format($promotion->discount_value, 0, ',', ' ') . ' FCFA' }}
                        </td>
                        <td class="p-3 font-mono text-titanium">
                            {{ $promotion->used_count }}{{ $promotion->usage_limit ? ' / ' . $promotion->usage_limit : '' }}
                        </td>
                        <td class="p-3 text-titanium">{{ $promotion->expires_at?->format('d/m/Y') ?? '—' }}</td>
                        <td class="p-3">
                            <span class="text-xs font-mono uppercase {{ $promotion->isValid() ? 'text-terminal' : 'text-red-500' }}">
                                {{ $promotion->isValid() ? 'Valide' : 'Inactif/Expiré' }}
                            </span>
                        </td>
                        <td class="p-3 text-right space-x-3">
                            <a href="{{ route('admin.promotions.edit', $promotion) }}" class="text-royal hover:underline text-xs font-mono">MODIFIER</a>
                            <form action="{{ route('admin.promotions.destroy', $promotion) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Supprimer ce code promo ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline text-xs font-mono">SUPPRIMER</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-titanium">Aucun code promo.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $promotions->links() }}
    </div>

@endsection