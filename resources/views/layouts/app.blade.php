<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TechShop — Matériel informatique')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        obsidian: '#152238',
                        ivory: '#F8FAFC',
                        royal: '#2563EB',
                        electric: '#3B82F6',
                        champagne: '#B45309',
                        titanium: '#64748B',
                        terminal: '#059669',
                    },
                    fontFamily: {
                        display: ['"Space Grotesk"', 'sans-serif'],
                        body: ['"IBM Plex Sans"', 'sans-serif'],
                        mono: ['"IBM Plex Mono"', 'monospace'],
                    },
                    borderRadius: {
                        DEFAULT: '4px',
                    },
                }
            }
        }
    </script>

    <style>
        body { font-family: 'IBM Plex Sans', sans-serif; }
        .font-display { font-family: 'Space Grotesk', sans-serif; }
        .font-mono { font-family: 'IBM Plex Mono', monospace; }

        /* Signature : séparateur "connecteur royal" */
        .royal-divider {
            display: flex;
            align-items: center;
            gap: 0;
            height: 1px;
            background: #E5E3DE;
            position: relative;
            margin: 0.5rem 0 1.5rem 0;
        }
        .royal-divider::before {
            content: '';
            width: 6px;
            height: 6px;
            background: #2563EB;
            flex-shrink: 0;
        }
    </style>
</head>
<body class="bg-ivory text-obsidian font-body antialiased">

    {{-- Bandeau promo --}}
    <div class="bg-royal text-ivory text-center text-xs font-mono py-2 px-4">
        LIVRAISON DISPONIBLE PARTOUT AU BÉNIN — <span class="text-champagne">CODE BIENVENUE10</span> POUR -10% SUR VOTRE 1ÈRE COMMANDE
    </div>

    <header class="bg-obsidian text-ivory sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between gap-6">
            <a href="{{ url('/') }}" class="flex items-center gap-2 font-display font-bold text-lg tracking-tight flex-shrink-0">
                <span class="w-2.5 h-2.5 bg-royal inline-block"></span>
                TechShop
            </a>

            <form action="{{ route('products.index') }}" method="GET" class="hidden md:flex flex-grow max-w-md">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher un produit..."
                       class="w-full bg-white/10 border border-white/20 text-ivory placeholder-titanium px-3 py-1.5 text-sm focus:outline-none focus:border-royal">
            </form>

            {{-- Menu desktop --}}
            <nav class="hidden md:flex items-center gap-5 text-sm font-medium flex-shrink-0">
                <a href="{{ route('home') }}" class="hover:text-royal transition">Accueil</a>
                <a href="{{ route('products.index') }}" class="hover:text-royal transition">Produits</a>
                @auth
                    <a href="{{ route('favorites.index') }}" class="hover:text-royal transition" title="Favoris">&#9825;</a>
                @endauth
                <a href="{{ route('cart.index') }}" class="hover:text-royal transition" title="Panier">Panier</a>
                @auth
                    <a href="{{ route('orders.history') }}" class="hover:text-royal transition">Mes commandes</a>
                    <span class="text-titanium hidden lg:inline">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-royal transition">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-royal transition">Connexion</a>
                @endauth
            </nav>

            {{-- Bouton menu mobile (hamburger) --}}
            <button id="mobile-menu-button" class="md:hidden flex-shrink-0 text-ivory" aria-label="Menu">
                <svg id="icon-open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="icon-close" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Panneau menu mobile --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-white/10 px-4 py-4 space-y-4">

            <form action="{{ route('products.index') }}" method="GET">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher un produit..."
                       class="w-full bg-white/10 border border-white/20 text-ivory placeholder-titanium px-3 py-2 text-sm focus:outline-none focus:border-royal">
            </form>

            <nav class="flex flex-col gap-3 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-royal transition">Accueil</a>
                <a href="{{ route('products.index') }}" class="hover:text-royal transition">Produits</a>
                <a href="{{ route('cart.index') }}" class="hover:text-royal transition">Panier</a>
                @auth
                    <a href="{{ route('favorites.index') }}" class="hover:text-royal transition">Favoris</a>
                    <a href="{{ route('orders.history') }}" class="hover:text-royal transition">Mes commandes</a>
                    <span class="text-titanium text-xs">Connecté : {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="hover:text-royal transition">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-royal transition">Connexion</a>
                @endauth
            </nav>
        </div>
    </header>

    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');

        menuButton.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            iconOpen.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
        });
    </script>

    <main class="max-w-7xl mx-auto px-4 py-10">
        @yield('content')
    </main>

    <footer class="bg-obsidian text-ivory mt-20">
        <div class="max-w-7xl mx-auto px-4 py-14 grid grid-cols-2 md:grid-cols-4 gap-10">

            {{-- Marque --}}
            <div class="col-span-2 md:col-span-1">
                <a href="{{ route('home') }}" class="flex items-center gap-2 font-display font-bold text-lg tracking-tight mb-3">
                    <span class="w-2.5 h-2.5 bg-royal inline-block"></span>
                    TechShop
                </a>
                <p class="text-sm text-titanium leading-relaxed mb-4">
                    La technologie qui vous propulse. PC, composants et accessoires informatiques au Bénin.
                </p>

                @if (session('success') && str_contains(session('success'), 'newsletter'))
                    <p class="text-xs text-terminal font-mono mb-2">{{ session('success') }}</p>
                @endif

                <form action="{{ route('newsletter.store') }}" method="POST" class="flex">
                    @csrf
                    <input type="email" name="email" required placeholder="Ton email"
                           class="min-w-0 flex-grow bg-white/10 border border-white/20 text-ivory placeholder-titanium px-3 py-2 text-xs focus:outline-none focus:border-royal">
                    <button type="submit" class="bg-champagne text-obsidian text-xs font-semibold px-3 whitespace-nowrap hover:brightness-95 transition">
                        S'inscrire
                    </button>
                </form>
                @error('email')
                    <p class="text-xs text-red-400 font-mono mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Boutique --}}
            <div>
                <p class="font-mono text-xs uppercase tracking-widest text-royal mb-4">Boutique</p>
                <ul class="space-y-2 text-sm text-titanium">
                    <li><a href="{{ route('products.index') }}" class="hover:text-royal transition">Tous les produits</a></li>
                    <li><a href="{{ route('cart.index') }}" class="hover:text-royal transition">Mon panier</a></li>
                    @auth
                        <li><a href="{{ route('favorites.index') }}" class="hover:text-royal transition">Mes favoris</a></li>
                        <li><a href="{{ route('orders.history') }}" class="hover:text-royal transition">Mes commandes</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-royal transition">Connexion</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-royal transition">Créer un compte</a></li>
                    @endauth
                </ul>
            </div>

            {{-- Catégories --}}
            <div>
                <p class="font-mono text-xs uppercase tracking-widest text-royal mb-4">Catégories</p>
                <ul class="space-y-2 text-sm text-titanium">
                    <li><a href="{{ route('products.index', ['category' => 'ordinateurs']) }}" class="hover:text-royal transition">Ordinateurs</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'composants']) }}" class="hover:text-royal transition">Composants</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'peripheriques']) }}" class="hover:text-royal transition">Périphériques</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'stockage']) }}" class="hover:text-royal transition">Stockage</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <p class="font-mono text-xs uppercase tracking-widest text-royal mb-4">Contact</p>
                <ul class="space-y-2 text-sm text-titanium font-mono">
                    <li>Abomey-Calavi, Bénin</li>
                    <li>+229 XX XX XX XX</li>
                    <li>contact@techshop.bj</li>
                </ul>
            </div>

        </div>

        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs font-mono text-titanium">
                <span>&copy; {{ date('Y') }} TECHSHOP — TOUS DROITS RÉSERVÉS</span>
                <span>PAIEMENT SÉCURISÉ · MOBILE MONEY · CARTE BANCAIRE</span>
            </div>
        </div>
    </footer>

</body>
</html>