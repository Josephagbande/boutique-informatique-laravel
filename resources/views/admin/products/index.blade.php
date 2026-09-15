@extends('admin.layout')

@section('title', 'Produits')

@section('content')

    <div class="flex justify-between items-center mb-8">
        <h1 class="font-display text-2xl font-bold">Produits</h1>
        <a href="{{ route('admin.products.create') }}" class="bg-obsidian text-ivory font-medium px-4 py-2 text-sm hover:bg-electric transition">
            + Nouveau produit
        </a>
    </div>

    <form action="{{ route('admin.products.index') }}" method="GET" class="mb-6">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher un produit..."
               class="w-full max-w-sm border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
    </form>

    <div class="bg-white border border-gray-200">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 text-left text-xs font-mono uppercase text-titanium">
                    <th class="p-3">Produit</th>
                    <th class="p-3">Catégorie</th>
                    <th class="p-3">Prix</th>
                    <th class="p-3">Stock</th>
                    <th class="p-3">Statut</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-b border-gray-200">
                        <td class="p-3 font-medium">{{ $product->name }}</td>
                        <td class="p-3 text-titanium">{{ $product->category->name }}</td>
                        <td class="p-3 font-mono">{{ number_format($product->price, 0, ',', ' ') }} FCFA</td>
                        <td class="p-3 font-mono {{ $product->stock_quantity <= 5 ? 'text-red-500' : '' }}">{{ $product->stock_quantity }}</td>
                        <td class="p-3">
                            <span class="text-xs font-mono uppercase {{ $product->status === 'active' ? 'text-terminal' : 'text-titanium' }}">
                                {{ $product->status }}
                            </span>
                        </td>
                        <td class="p-3 text-right space-x-3">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-royal hover:underline text-xs font-mono">MODIFIER</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Supprimer ce produit ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline text-xs font-mono">SUPPRIMER</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-titanium">Aucun produit.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>

@endsection