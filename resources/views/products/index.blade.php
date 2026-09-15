@extends('layouts.app')

@section('title', 'Nos produits — TechShop')

@section('content')

    <div class="mb-8">
        <p class="font-mono text-xs text-royal uppercase tracking-widest mb-1">Catalogue</p>
        <h1 class="font-display text-3xl font-bold">Nos produits</h1>
        @if (request('q'))
            <p class="text-sm text-titanium mt-1">Résultats pour « {{ request('q') }} »</p>
        @endif
    </div>

    {{-- Filtres catégories --}}
    <div class="flex flex-wrap gap-2 mb-8">
        <a href="{{ route('products.index') }}"
           class="px-3 py-1.5 text-xs font-mono uppercase tracking-wide border {{ ! request('category') ? 'bg-obsidian text-ivory border-obsidian' : 'border-gray-300 text-titanium hover:border-royal' }} transition">
            Tous
        </a>
        @foreach ($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->slug] + request()->except('category')) }}"
               class="px-3 py-1.5 text-xs font-mono uppercase tracking-wide border {{ request('category') === $category->slug ? 'bg-obsidian text-ivory border-obsidian' : 'border-gray-300 text-titanium hover:border-royal' }} transition">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
        @forelse ($products as $product)
            @include('products._card', ['product' => $product])
        @empty
            <p class="col-span-full text-center text-titanium py-12">Aucun produit ne correspond à ta recherche.</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $products->links() }}
    </div>

@endsection