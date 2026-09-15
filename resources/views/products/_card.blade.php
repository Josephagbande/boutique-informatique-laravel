<div class="bg-white border border-gray-200 hover:border-royal transition group flex flex-col relative">

    {{-- Bouton favori --}}
    @auth
        <form action="{{ route('favorites.toggle', $product) }}" method="POST" class="absolute top-2 right-2 z-10">
            @csrf
            <button type="submit" class="w-8 h-8 bg-white/90 flex items-center justify-center hover:bg-white transition"
                    title="{{ $product->isFavoritedByCurrentUser() ? 'Retirer des favoris' : 'Ajouter aux favoris' }}">
                @if ($product->isFavoritedByCurrentUser())
                    <span class="text-royal text-lg leading-none">&#9829;</span>
                @else
                    <span class="text-titanium text-lg leading-none">&#9825;</span>
                @endif
            </button>
        </form>
    @endauth

    <a href="{{ route('products.show', $product) }}" class="block relative">
        <div class="aspect-square bg-gray-100 overflow-hidden">
            @if ($product->display_image)
                <img src="{{ $product->display_image->full_url }}"
                     alt="{{ $product->name }}"
                     class="object-cover w-full h-full group-hover:scale-105 transition duration-300">
            @else
                <span class="flex items-center justify-center h-full text-gray-400 text-sm font-mono">NO IMAGE</span>
            @endif
        </div>

        {{-- Badges --}}
        <div class="absolute top-2 left-2 flex flex-col gap-1">
            @if ($product->is_bestseller)
                <span class="bg-obsidian text-champagne text-xs font-mono font-semibold px-2 py-0.5 w-fit">BEST-SELLER</span>
            @endif
            @if ($product->is_new)
                <span class="bg-royal text-ivory text-xs font-mono font-semibold px-2 py-0.5 w-fit">NOUVEAU</span>
            @endif
            @if ($product->discount_percent)
                <span class="bg-champagne text-obsidian text-xs font-mono font-semibold px-2 py-0.5 w-fit">-{{ $product->discount_percent }}%</span>
            @endif
        </div>
    </a>

    <div class="p-4 flex flex-col flex-grow">
        <p class="font-mono text-xs text-titanium uppercase tracking-wide mb-1">
            {{ $product->category->name }} · {{ $product->brand->name }}
        </p>

        <h2 class="font-display font-semibold text-sm mb-1 flex-grow leading-snug">
            <a href="{{ route('products.show', $product) }}" class="hover:text-royal transition">
                {{ $product->name }}
            </a>
        </h2>

        @if ($product->average_rating)
            <div class="flex items-center gap-1 mb-2 text-xs">
                <span class="text-champagne">{{ str_repeat('★', round($product->average_rating)) }}{{ str_repeat('☆', 5 - round($product->average_rating)) }}</span>
                <span class="text-titanium font-mono">({{ $product->approvedReviews()->count() }})</span>
            </div>
        @else
            <div class="mb-2"></div>
        @endif

        <div class="flex items-baseline gap-2 mb-2 font-mono">
            @if ($product->sale_price)
                <span class="text-lg font-semibold text-royal">{{ number_format($product->sale_price, 0, ',', ' ') }}</span>
                <span class="text-xs text-titanium line-through">{{ number_format($product->price, 0, ',', ' ') }}</span>
            @else
                <span class="text-lg font-semibold">{{ number_format($product->price, 0, ',', ' ') }}</span>
            @endif
            <span class="text-xs text-titanium">FCFA</span>
        </div>

        <div class="flex items-center gap-1.5 mb-3 font-mono text-xs">
            @if ($product->inStock())
                <span class="w-1.5 h-1.5 bg-terminal inline-block"></span>
                <span class="text-terminal">EN STOCK ({{ $product->stock_quantity }})</span>
            @else
                <span class="w-1.5 h-1.5 bg-red-500 inline-block"></span>
                <span class="text-red-500">RUPTURE</span>
            @endif
        </div>

        <form action="{{ route('cart.store', $product) }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="w-full bg-obsidian text-ivory text-sm font-medium py-2.5 hover:bg-electric transition">
                Ajouter au panier
            </button>
        </form>
    </div>

</div>