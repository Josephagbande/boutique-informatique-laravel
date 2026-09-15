@extends('layouts.app')

@section('title', 'Mes favoris — TechShop')

@section('content')

    <div class="mb-8">
        <p class="font-mono text-xs text-royal uppercase tracking-widest mb-1">Compte</p>
        <h1 class="font-display text-3xl font-bold">Mes favoris</h1>
    </div>

    @if (session('success'))
        <div class="bg-terminal/10 text-terminal text-sm px-4 py-2 mb-6 font-mono">
            {{ session('success') }}
        </div>
    @endif

    @if ($products->isEmpty())
        <p class="text-titanium">Tu n'as pas encore de favoris.</p>
        <a href="{{ route('products.index') }}" class="inline-block mt-4 font-mono text-xs text-royal hover:underline">
            &larr; VOIR LES PRODUITS
        </a>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            @foreach ($products as $product)
                @include('products._card', ['product' => $product])
            @endforeach
        </div>
    @endif

@endsection