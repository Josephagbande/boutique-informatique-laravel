@extends('admin.layout')

@section('title', 'Nouveau code promo')

@section('content')

    <h1 class="font-display text-2xl font-bold mb-8">Nouveau code promo</h1>

    @if ($errors->any())
        <div class="bg-red-50 text-red-700 text-sm px-4 py-2 mb-4 font-mono">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.promotions.store') }}" method="POST" class="bg-white border border-gray-200 p-6 max-w-xl space-y-4">
        @csrf

        <div>
            <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Code</label>
            <input type="text" name="code" value="{{ old('code') }}" required placeholder="Ex: BIENVENUE10"
                   class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none uppercase">
        </div>

        <div>
            <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Description (optionnel)</label>
            <input type="text" name="description" value="{{ old('description') }}"
                   class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Type de remise</label>
                <select name="discount_type" required class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
                    <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Pourcentage (%)</option>
                    <option value="fixed" {{ old('discount_type') == 'fixed' ? 'selected' : '' }}>Montant fixe (FCFA)</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Valeur</label>
                <input type="number" step="0.01" name="discount_value" value="{{ old('discount_value') }}" required
                       class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Début (optionnel)</label>
                <input type="date" name="starts_at" value="{{ old('starts_at') }}"
                       class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Expiration (optionnel)</label>
                <input type="date" name="expires_at" value="{{ old('expires_at') }}"
                       class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Limite d'utilisation (optionnel)</label>
                <input type="number" name="usage_limit" value="{{ old('usage_limit') }}" placeholder="Illimité si vide"
                       class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Statut</label>
                <select name="status" required class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
                    <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Actif</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactif</option>
                </select>
            </div>
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit" class="bg-obsidian text-ivory font-medium px-6 py-2.5 hover:bg-electric transition">
                Créer le code
            </button>
            <a href="{{ route('admin.promotions.index') }}" class="text-titanium hover:text-royal text-sm self-center">Annuler</a>
        </div>

    </form>

@endsection