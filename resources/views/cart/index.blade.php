@extends('layouts.app')

@section('title', 'Mon panier — TechShop')

@section('content')

    <div class="mb-8">
        <p class="font-mono text-xs text-royal uppercase tracking-widest mb-1">Panier</p>
        <h1 class="font-display text-3xl font-bold">Mon panier</h1>
    </div>

    @if (session('success'))
        <div class="bg-terminal/10 text-terminal text-sm px-4 py-2 mb-4 font-mono">
            {{ session('success') }}
        </div>
    @endif

    @if ($cart->items->isEmpty())

        <p class="text-titanium">Ton panier est vide pour le moment.</p>
        <a href="{{ route('products.index') }}" class="inline-block mt-4 font-mono text-xs text-royal hover:underline">
            &larr; VOIR LES PRODUITS
        </a>

    @else

        <div class="bg-white border border-gray-200 divide-y divide-gray-200">
            @foreach ($cart->items as $item)
                <div class="flex items-center gap-4 p-4">

                    <div class="w-16 h-16 bg-gray-100 flex-shrink-0 overflow-hidden">
                        @if ($item->product->display_image)
                            <img src="{{ $item->product->display_image->full_url }}"
                                 alt="{{ $item->product->name }}"
                                 class="object-cover w-full h-full">
                        @endif
                    </div>

                    <div class="flex-grow">
                        <p class="font-medium text-sm">{{ $item->product->name }}</p>
                        <p class="text-xs text-titanium font-mono">{{ number_format($item->price, 0, ',', ' ') }} FCFA / unité</p>
                    </div>

                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center gap-2">
                        @csrf
                        @method('PUT')
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                               class="w-16 border border-gray-300 px-2 py-1 text-sm font-mono">
                        <button type="submit" class="text-xs text-royal hover:underline font-mono">MAJ</button>
                    </form>

                    <p class="font-mono font-semibold text-sm w-28 text-right">
                        {{ number_format($item->subtotal, 0, ',', ' ') }} FCFA
                    </p>

                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-mono">
                            SUPPR.
                        </button>
                    </form>

                </div>
            @endforeach
        </div>

        <div class="mt-6 flex justify-end">
            <div class="bg-white border border-gray-200 p-5 w-full sm:w-80">
                <div class="flex justify-between text-sm mb-2 font-mono">
                    <span class="text-titanium">Articles</span>
                    <span>{{ $cart->itemsCount }}</span>
                </div>
                <div class="flex justify-between font-display font-bold text-lg border-t border-gray-200 pt-3">
                    <span>Total</span>
                    <span class="font-mono">{{ number_format($cart->total, 0, ',', ' ') }} FCFA</span>
                </div>

                @auth
                    <a href="{{ route('orders.checkout') }}" class="mt-4 block text-center w-full bg-obsidian text-ivory font-medium py-2.5 hover:bg-electric transition">
                        Passer la commande
                    </a>
                @else
                    <a href="{{ route('login') }}" class="mt-4 block text-center w-full bg-obsidian text-ivory font-medium py-2.5 hover:bg-electric transition">
                        Se connecter pour commander
                    </a>
                @endauth
            </div>
        </div>

    @endif

@endsection