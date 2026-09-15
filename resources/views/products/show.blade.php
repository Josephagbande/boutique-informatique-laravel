@extends('layouts.app')

@section('title', $product->name . ' — TechShop')

@section('content')

    <a href="{{ route('products.index') }}" class="font-mono text-xs text-royal hover:underline">&larr; RETOUR AUX PRODUITS</a>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-12">

        {{-- Image --}}
        <div class="aspect-square bg-gray-100 border border-gray-200 flex items-center justify-center overflow-hidden">
            @if ($product->display_image)
                <img src="{{ $product->display_image->full_url }}"
                     alt="{{ $product->name }}"
                     class="object-cover w-full h-full">
            @else
                <span class="text-gray-400 text-sm font-mono">NO IMAGE</span>
            @endif
        </div>

        {{-- Infos --}}
        <div>
            <p class="font-mono text-xs text-royal uppercase tracking-widest mb-2">
                {{ $product->category->name }} · {{ $product->brand->name }}
            </p>

            <h1 class="font-display text-2xl font-bold mb-2 leading-tight">{{ $product->name }}</h1>

            @if ($product->average_rating)
                <div class="flex items-center gap-1.5 mb-4 text-sm">
                    <span class="text-champagne">{{ str_repeat('★', round($product->average_rating)) }}{{ str_repeat('☆', 5 - round($product->average_rating)) }}</span>
                    <span class="text-titanium font-mono text-xs">{{ $product->average_rating }}/5 ({{ $product->approvedReviews()->count() }} avis)</span>
                </div>
            @endif

            <div class="flex items-baseline gap-3 mb-1 font-mono">
                @if ($product->sale_price)
                    <span class="text-3xl font-semibold text-royal">{{ number_format($product->sale_price, 0, ',', ' ') }}</span>
                    <span class="text-base text-titanium line-through">{{ number_format($product->price, 0, ',', ' ') }}</span>
                @else
                    <span class="text-3xl font-semibold">{{ number_format($product->price, 0, ',', ' ') }}</span>
                @endif
                <span class="text-sm text-titanium">FCFA</span>
            </div>

            <div class="flex items-center gap-1.5 mb-6 font-mono text-xs">
                @if ($product->inStock())
                    <span class="w-1.5 h-1.5 bg-terminal inline-block"></span>
                    <span class="text-terminal">EN STOCK — {{ $product->stock_quantity }} DISPONIBLES</span>
                @else
                    <span class="w-1.5 h-1.5 bg-red-500 inline-block"></span>
                    <span class="text-red-500">RUPTURE DE STOCK</span>
                @endif
            </div>

            <p class="text-titanium leading-relaxed mb-6">{{ $product->description }}</p>

            @if ($product->inStock())
                {{-- Sélecteur de quantité --}}
                <div class="mb-4">
                    <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-2">Quantité</label>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center border border-gray-300">
                            <button type="button" onclick="decrementQty()" class="w-10 h-10 flex items-center justify-center text-lg hover:bg-gray-50">−</button>
                            <input type="number" id="quantity-input" value="1" min="1" max="{{ $product->stock_quantity }}"
                                   class="w-14 h-10 text-center border-x border-gray-300 font-mono" readonly>
                            <button type="button" onclick="incrementQty()" class="w-10 h-10 flex items-center justify-center text-lg hover:bg-gray-50">+</button>
                        </div>
                        <span class="text-xs text-titanium font-mono">Maximum : {{ $product->stock_quantity }}</span>
                    </div>
                </div>

                {{-- Ajouter au panier + favoris + partager --}}
                <div class="flex gap-3 mb-3">
                    <form action="{{ route('cart.store', $product) }}" method="POST" class="flex-grow" id="add-to-cart-form">
                        @csrf
                        <input type="hidden" name="quantity" id="quantity-cart-input" value="1">
                        <button type="submit" class="w-full bg-obsidian text-ivory font-medium px-8 py-3 hover:bg-electric transition flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Ajouter au panier
                        </button>
                    </form>

                    @auth
                        <form action="{{ route('favorites.toggle', $product) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-12 h-12 border border-gray-300 flex items-center justify-center hover:border-royal transition"
                                    title="{{ $product->isFavoritedByCurrentUser() ? 'Retirer des favoris' : 'Ajouter aux favoris' }}">
                                @if ($product->isFavoritedByCurrentUser())
                                    <span class="text-royal text-lg">&#9829;</span>
                                @else
                                    <span class="text-titanium text-lg">&#9825;</span>
                                @endif
                            </button>
                        </form>
                    @endauth

                    <button type="button" onclick="shareProduct()" class="w-12 h-12 border border-gray-300 flex items-center justify-center hover:border-royal transition" title="Partager">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-titanium" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342a3 3 0 100-2.684m0 2.684a3 3 0 000-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                    </button>
                </div>

                {{-- Acheter maintenant --}}
                <form action="{{ route('cart.store', $product) }}" method="POST">
                    @csrf
                    <input type="hidden" name="quantity" id="quantity-buynow-input" value="1">
                    <input type="hidden" name="buy_now" value="1">
                    <button type="submit" class="w-full bg-champagne text-obsidian font-semibold px-8 py-3 hover:brightness-95 transition">
                        Acheter maintenant
                    </button>
                </form>

                <script>
                    function updateQtyInputs(value) {
                        document.getElementById('quantity-cart-input').value = value;
                        document.getElementById('quantity-buynow-input').value = value;
                    }
                    function incrementQty() {
                        const input = document.getElementById('quantity-input');
                        const max = parseInt(input.max);
                        if (parseInt(input.value) < max) {
                            input.value = parseInt(input.value) + 1;
                            updateQtyInputs(input.value);
                        }
                    }
                    function decrementQty() {
                        const input = document.getElementById('quantity-input');
                        if (parseInt(input.value) > 1) {
                            input.value = parseInt(input.value) - 1;
                            updateQtyInputs(input.value);
                        }
                    }
                    function shareProduct() {
                        const url = window.location.href;
                        if (navigator.share) {
                            navigator.share({ title: document.title, url: url });
                        } else {
                            navigator.clipboard.writeText(url);
                            alert('Lien copié dans le presse-papier !');
                        }
                    }
                </script>
            @else
                <button disabled class="w-full bg-gray-200 text-titanium font-medium px-8 py-3 cursor-not-allowed">
                    Rupture de stock
                </button>
            @endif

            {{-- Caractéristiques techniques --}}
            @if ($product->specs->isNotEmpty())
                <div class="mt-10">
                    <div class="royal-divider"></div>
                    <h2 class="font-display font-semibold text-base mb-4">Fiche technique</h2>
                    <table class="w-full text-sm font-mono">
                        @foreach ($product->specs as $spec)
                            <tr class="border-b border-gray-200 odd:bg-gray-50">
                                <td class="py-2.5 px-3 text-titanium uppercase text-xs tracking-wide w-1/3">{{ $spec->spec_name }}</td>
                                <td class="py-2.5 px-3 font-medium">{{ $spec->spec_value }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif

        </div>

    </div>

    {{-- Avis clients --}}
    <div class="mt-16 max-w-2xl">
        <div class="royal-divider"></div>
        <h2 class="font-display font-semibold text-lg mb-6">Avis clients</h2>

        @if (session('success'))
            <div class="bg-terminal/10 text-terminal text-sm px-4 py-2 mb-6 font-mono">
                {{ session('success') }}
            </div>
        @endif

        @if ($product->approvedReviews->isEmpty())
            <p class="text-titanium text-sm mb-8">Aucun avis pour le moment.</p>
        @else
            <div class="space-y-5 mb-10">
                @foreach ($product->approvedReviews as $review)
                    <div class="border-b border-gray-200 pb-5">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-champagne text-sm">{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}</span>
                            <span class="font-medium text-sm">{{ $review->user->name }}</span>
                            <span class="text-xs text-titanium font-mono">{{ $review->created_at->format('d/m/Y') }}</span>
                        </div>
                        @if ($review->comment)
                            <p class="text-sm text-titanium">{{ $review->comment }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        @auth
            @if ($product->wasPurchasedByCurrentUser() && ! $product->hasBeenReviewedByCurrentUser())
                <div class="bg-white border border-gray-200 p-5">
                    <h3 class="font-display font-semibold text-sm mb-3">Laisser un avis</h3>
                    <form action="{{ route('reviews.store', $product) }}" method="POST" class="space-y-3">
                        @csrf
                        <div>
                            <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Note</label>
                            <select name="rating" required class="border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
                                <option value="">-- Choisir --</option>
                                @for ($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}">{{ $i }} étoile{{ $i > 1 ? 's' : '' }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Commentaire (optionnel)</label>
                            <textarea name="comment" rows="3" class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none"></textarea>
                        </div>
                        <button type="submit" class="bg-obsidian text-ivory font-medium px-5 py-2 text-sm hover:bg-electric transition">
                            Envoyer mon avis
                        </button>
                    </form>
                </div>
            @elseif ($product->hasBeenReviewedByCurrentUser())
                <p class="text-sm text-titanium font-mono">Tu as déjà laissé un avis sur ce produit.</p>
            @endif
        @endauth

    </div>

@endsection