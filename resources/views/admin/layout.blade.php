<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration') — TechShop</title>

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
                }
            }
        }
    </script>

    <style>
        body { font-family: 'IBM Plex Sans', sans-serif; }
        .font-display { font-family: 'Space Grotesk', sans-serif; }
        .font-mono { font-family: 'IBM Plex Mono', monospace; }
    </style>
</head>
<body class="bg-ivory text-obsidian font-body antialiased">

    <div class="flex flex-col md:flex-row min-h-screen">

        {{-- Menu (barre horizontale scrollable sur mobile, latérale fixe sur desktop) --}}
        <aside class="w-full md:w-56 bg-obsidian text-ivory flex-shrink-0">
            <div class="p-5 font-display font-bold text-lg flex items-center gap-2">
                <span class="w-2.5 h-2.5 bg-royal inline-block"></span>
                Admin
            </div>
            <nav class="flex md:block overflow-x-auto text-sm border-t border-white/10 md:border-t-0 md:mt-4">
                <a href="{{ route('admin.dashboard') }}"
                   class="block px-5 py-3 whitespace-nowrap hover:bg-white/5 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-royal' : '' }}">
                    Tableau de bord
                </a>
                <a href="{{ route('admin.products.index') }}"
                   class="block px-5 py-3 whitespace-nowrap hover:bg-white/5 {{ request()->routeIs('admin.products.*') ? 'bg-white/10 text-royal' : '' }}">
                    Produits
                </a>
                <a href="{{ route('admin.orders.index') }}"
                   class="block px-5 py-3 whitespace-nowrap hover:bg-white/5 {{ request()->routeIs('admin.orders.*') ? 'bg-white/10 text-royal' : '' }}">
                    Commandes
                </a>
                <a href="{{ route('admin.reviews.index') }}"
                   class="block px-5 py-3 whitespace-nowrap hover:bg-white/5 {{ request()->routeIs('admin.reviews.*') ? 'bg-white/10 text-royal' : '' }}">
                    Avis
                </a>
                <a href="{{ route('admin.clients.index') }}"
                   class="block px-5 py-3 whitespace-nowrap hover:bg-white/5 {{ request()->routeIs('admin.clients.*') ? 'bg-white/10 text-royal' : '' }}">
                    Clients
                </a>
                <a href="{{ route('admin.promotions.index') }}"
                   class="block px-5 py-3 whitespace-nowrap hover:bg-white/5 {{ request()->routeIs('admin.promotions.*') ? 'bg-white/10 text-royal' : '' }}">
                    Promotions
                </a>
                <a href="{{ route('admin.newsletter.index') }}"
                   class="block px-5 py-3 whitespace-nowrap hover:bg-white/5 {{ request()->routeIs('admin.newsletter.*') ? 'bg-white/10 text-royal' : '' }}">
                    Newsletter
                </a>
            </nav>
            <div class="p-5 md:mt-auto border-t border-white/10 text-xs flex md:block gap-4">
                <a href="{{ route('home') }}" class="text-titanium hover:text-royal">&larr; Retour à la boutique</a>
                <form action="{{ route('logout') }}" method="POST" class="md:mt-2">
                    @csrf
                    <button type="submit" class="text-titanium hover:text-royal">Déconnexion</button>
                </form>
            </div>
        </aside>

        {{-- Contenu --}}
        <main class="flex-grow p-4 md:p-8">

            @if (session('success'))
                <div class="bg-terminal/10 text-terminal text-sm px-4 py-2 mb-6 font-mono">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>

    </div>

</body>
</html>