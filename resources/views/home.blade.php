@extends('layouts.app')

@section('title', 'TechShop — La technologie qui vous propulse')

@section('content')

    {{-- Hero (carrousel) --}}
    <div id="hero-carousel" class="relative -mx-4 sm:-mx-6 lg:-mx-8 mb-16 h-[420px] sm:h-[480px] overflow-hidden">

        <img src="{{ asset('images/hero-laptop.jpg') }}" alt="Ordinateur portable"
             class="hero-slide absolute inset-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000">
        <img src="{{ asset('images/hero-laptop-2.jpg') }}" alt="Composants informatiques"
             class="hero-slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">
        <img src="{{ asset('images/hero-laptop-3.jpg') }}" alt="Accessoires informatiques"
             class="hero-slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">

        <div class="absolute inset-0 bg-gradient-to-r from-obsidian via-obsidian/80 to-obsidian/20"></div>

        <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-center text-ivory">
            <span class="inline-block w-fit bg-royal text-ivory font-mono text-xs font-semibold px-3 py-1 mb-4">
                TECHSHOP
            </span>
            <h1 class="font-display text-4xl sm:text-5xl font-bold leading-tight mb-4 max-w-lg">
                LA TECHNOLOGIE QUI VOUS <span class="text-electric">PROPULSE.</span>
            </h1>
            <p class="font-mono text-xs text-ivory/70 uppercase tracking-widest mb-8">
                PC · Composants · Accessoires
            </p>
            <div class="flex gap-3">
                <a href="{{ route('products.index') }}" class="bg-royal text-ivory font-medium px-6 py-3 hover:bg-electric transition w-fit">
                    Découvrir les produits →
                </a>
            </div>
        </div>

        {{-- Points de navigation --}}
        <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2 z-10">
            <button onclick="goToSlide(0)" class="hero-dot w-2.5 h-2.5 bg-ivory transition"></button>
            <button onclick="goToSlide(1)" class="hero-dot w-2.5 h-2.5 bg-ivory/40 transition"></button>
            <button onclick="goToSlide(2)" class="hero-dot w-2.5 h-2.5 bg-ivory/40 transition"></button>
        </div>
    </div>

    <script>
        (function () {
            const slides = document.querySelectorAll('#hero-carousel .hero-slide');
            const dots = document.querySelectorAll('#hero-carousel .hero-dot');
            let current = 0;
            let timer;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('opacity-100', i === index);
                    slide.classList.toggle('opacity-0', i !== index);
                });
                dots.forEach((dot, i) => {
                    dot.classList.toggle('bg-ivory', i === index);
                    dot.classList.toggle('bg-ivory/40', i !== index);
                });
                current = index;
            }

            window.goToSlide = function (index) {
                showSlide(index);
                resetTimer();
            };

            function resetTimer() {
                clearInterval(timer);
                timer = setInterval(() => {
                    showSlide((current + 1) % slides.length);
                }, 5000);
            }

            resetTimer();
        })();
    </script>


    {{-- Badges de confiance --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16 text-center">
        <div class="flex flex-col items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-royal mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="font-display font-semibold text-sm mb-1">Produits authentiques</p>
            <p class="text-xs text-titanium">Garantie constructeur</p>
        </div>
        <div class="flex flex-col items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-royal mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 16V6a1 1 0 011-1h6a1 1 0 011 1v10m-8 0h8m-8 0H4a1 1 0 01-1-1v-3a1 1 0 011-1h1M16 16h4a1 1 0 001-1v-3a1 1 0 00-.293-.707L18 8h-2m0 0V6m0 2v3m-8 5a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <p class="font-display font-semibold text-sm mb-1">Livraison rapide</p>
            <p class="text-xs text-titanium">Partout au Bénin</p>
        </div>
        <div class="flex flex-col items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-royal mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-1.414 1.414A9 9 0 105.05 18.364l1.414-1.414m11.9-11.314A9 9 0 015.05 18.364m11.9-11.314L18 5m-1.05 1.05L19 4m-1.05 1.05a9 9 0 010 12.728M12 12v.01" />
            </svg>
            <p class="font-display font-semibold text-sm mb-1">Support client</p>
            <p class="text-xs text-titanium">7j/7 — 24h/24</p>
        </div>
        <div class="flex flex-col items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-royal mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
            </svg>
            <p class="font-display font-semibold text-sm mb-1">Meilleurs prix</p>
            <p class="text-xs text-titanium">Qualité garantie</p>
        </div>
    </div>

    {{-- Catégories --}}
    <div class="mb-16">
        <p class="font-mono text-xs text-royal uppercase tracking-widest mb-1">Explorer</p>
        <h2 class="font-display text-2xl font-bold mb-6">Nos catégories</h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
            @foreach ($categories as $category)
                <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                   class="bg-white border border-gray-200 hover:border-royal transition p-4 text-center flex flex-col items-center gap-2">
                    <span class="w-10 h-10 bg-obsidian text-ivory flex items-center justify-center font-display font-bold text-sm">
                        {{ mb_substr($category->name, 0, 1) }}
                    </span>
                    <span class="text-xs font-medium">{{ $category->name }}</span>
                    <span class="text-xs text-titanium font-mono">{{ $category->products_count }}</span>
                </a>
            @endforeach
        </div>
    </div>

    {{-- Bannières promo --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-16">
        <a href="{{ route('products.index', ['category' => 'ordinateurs']) }}"
           class="bg-obsidian text-ivory p-8 flex flex-col justify-between hover:bg-obsidian/90 transition min-h-[160px]">
            <p class="font-mono text-xs text-royal uppercase tracking-widest mb-2">Nouveauté</p>
            <h3 class="font-display text-xl font-bold mb-4">Les derniers PC portables sont arrivés</h3>
            <span class="font-mono text-xs text-champagne">DÉCOUVRIR →</span>
        </a>
        <a href="{{ route('products.index') }}"
           class="bg-champagne text-obsidian p-8 flex flex-col justify-between hover:brightness-95 transition min-h-[160px]">
            <p class="font-mono text-xs uppercase tracking-widest mb-2 opacity-70">Offre spéciale</p>
            <h3 class="font-display text-xl font-bold mb-4">-10% avec le code BIENVENUE10</h3>
            <span class="font-mono text-xs">EN PROFITER →</span>
        </a>
    </div>

    {{-- Produits vedettes --}}
    <div>
        <div class="flex items-center justify-between mb-6">
            <div>
                <p class="font-mono text-xs text-royal uppercase tracking-widest mb-1">Sélection</p>
                <h2 class="font-display text-2xl font-bold">Produits vedettes</h2>
            </div>
            <a href="{{ route('products.index') }}" class="font-mono text-xs text-royal hover:underline">VOIR TOUT →</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($featuredProducts as $product)
                @include('products._card', ['product' => $product])
            @endforeach
        </div>
    </div>

    {{-- Témoignages clients --}}
    @if ($testimonials->isNotEmpty())
        <div class="mt-20">
            <p class="font-mono text-xs text-royal uppercase tracking-widest mb-1 text-center">Avis vérifiés</p>
            <h2 class="font-display text-2xl font-bold mb-8 text-center">Ce que disent nos clients</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach ($testimonials as $review)
                    <div class="bg-white border border-gray-200 p-5">
                        <span class="text-champagne text-sm">{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}</span>
                        @if ($review->comment)
                            <p class="text-sm text-obsidian mt-3 leading-relaxed">"{{ $review->comment }}"</p>
                        @endif
                        <p class="font-mono text-xs text-titanium mt-4">
                            {{ $review->user->name }} — {{ $review->product->name }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection