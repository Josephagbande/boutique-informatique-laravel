@extends('layouts.app')

@section('title', 'Finaliser la commande — TechShop')

@section('content')

    <div class="mb-8">
        <p class="font-mono text-xs text-royal uppercase tracking-widest mb-1">Commande</p>
        <h1 class="font-display text-3xl font-bold">Finaliser la commande</h1>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 text-red-700 text-sm px-4 py-2 mb-4 font-mono">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- Formulaire adresse --}}
        <div class="md:col-span-2">

            <form action="{{ route('orders.store') }}" method="POST" class="bg-white border border-gray-200 p-6 space-y-4">
                @csrf

                <h2 class="font-display font-semibold text-lg mb-1">Adresse de livraison</h2>
                <div class="royal-divider"></div>

                @if ($addresses->isNotEmpty())
                    <div class="space-y-2">
                        @foreach ($addresses as $address)
                            <label class="flex items-start gap-3 border border-gray-200 p-3 cursor-pointer hover:border-royal transition">
                                <input type="radio" name="address_id" value="{{ $address->id }}"
                                       {{ $address->is_default ? 'checked' : '' }} class="mt-1">
                                <span class="text-sm">
                                    <strong>{{ $address->label ?? 'Adresse' }}</strong><br>
                                    {{ $address->address }}, {{ $address->city }}
                                    @if ($address->district) ({{ $address->district }}) @endif<br>
                                    <span class="font-mono text-xs text-titanium">{{ $address->phone }}</span>
                                </span>
                            </label>
                        @endforeach
                    </div>
                    <p class="text-sm text-titanium pt-2">Ou saisis une nouvelle adresse :</p>
                @endif

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Adresse</label>
                    <input type="text" name="new_address" value="{{ old('new_address') }}"
                           class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none" placeholder="Quartier, rue...">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Ville</label>
                        <input type="text" name="new_city" value="{{ old('new_city') }}"
                               class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Commune (optionnel)</label>
                        <input type="text" name="new_district" value="{{ old('new_district') }}"
                               class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Téléphone</label>
                    <input type="text" name="new_phone" value="{{ old('new_phone') }}"
                           class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
                </div>

                <h2 class="font-display font-semibold text-lg pt-4">Code promo</h2>
                <div class="royal-divider"></div>
                <div>
                    <input type="text" name="promo_code" value="{{ old('promo_code') }}" placeholder="Ex: BIENVENUE10"
                           class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none uppercase">
                </div>

                <h2 class="font-display font-semibold text-lg pt-4">Paiement</h2>
                <div class="royal-divider"></div>
                <p class="text-sm text-titanium bg-gray-50 p-3 font-mono">
                    Paiement simulé pour cette version du projet — validé automatiquement à la commande.
                </p>

                <button type="submit" class="w-full bg-obsidian text-ivory font-medium py-3 hover:bg-electric transition">
                    Valider la commande
                </button>

            </form>

        </div>

        {{-- Résumé --}}
        <div>
            <div class="bg-white border border-gray-200 p-5">
                <h2 class="font-display font-semibold mb-3">Résumé</h2>
                <div class="space-y-2 text-sm font-mono">
                    @foreach ($cart->items as $item)
                        <div class="flex justify-between">
                            <span class="text-titanium">{{ $item->product->name }} x{{ $item->quantity }}</span>
                            <span>{{ number_format($item->price * $item->quantity, 0, ',', ' ') }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-between text-sm font-mono border-t border-gray-200 mt-3 pt-3">
                    <span class="text-titanium">Livraison</span>
                    <span>2 000</span>
                </div>
                <div class="flex justify-between font-display font-bold text-lg border-t border-gray-200 mt-2 pt-2">
                    <span>Total</span>
                    <span class="font-mono">{{ number_format($cart->total + 2000, 0, ',', ' ') }} FCFA</span>
                </div>
            </div>
        </div>

    </div>

@endsection