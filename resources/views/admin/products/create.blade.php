@extends('admin.layout')

@section('title', 'Nouveau produit')

@section('content')

    <h1 class="font-display text-2xl font-bold mb-8">Nouveau produit</h1>

    @if ($errors->any())
        <div class="bg-red-50 text-red-700 text-sm px-4 py-2 mb-4 font-mono">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white border border-gray-200 p-6 max-w-2xl space-y-4">
        @csrf

        <div>
            <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Nom du produit</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Catégorie</label>
                <select name="category_id" required class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
                    <option value="">-- Choisir --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Marque</label>
                <select name="brand_id" required class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
                    <option value="">-- Choisir --</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Description</label>
            <textarea name="description" rows="3" class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Prix (FCFA)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" required
                       class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Prix promo (optionnel)</label>
                <input type="number" step="0.01" name="sale_price" value="{{ old('sale_price') }}"
                       class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">État</label>
                <select name="condition" required class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
                    <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>Neuf</option>
                    <option value="used" {{ old('condition') == 'used' ? 'selected' : '' }}>Occasion</option>
                    <option value="refurbished" {{ old('condition') == 'refurbished' ? 'selected' : '' }}>Reconditionné</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Stock</label>
                <input type="number" name="stock_quantity" value="{{ old('stock_quantity', 0) }}" required
                       class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Statut</label>
                <select name="status" required class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
                    <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Actif</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactif</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Image du produit</label>
            <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 px-3 py-2 text-sm">
        </div>

        {{-- Caractéristiques techniques dynamiques --}}
        <div>
            <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-2">Caractéristiques techniques</label>
            <div id="specs-container" class="space-y-2">
                <div class="flex gap-2">
                    <input type="text" name="spec_names[]" placeholder="Ex: RAM" class="w-1/3 border border-gray-300 px-3 py-2 text-sm">
                    <input type="text" name="spec_values[]" placeholder="Ex: 16 Go" class="flex-grow border border-gray-300 px-3 py-2 text-sm">
                </div>
            </div>
            <button type="button" onclick="addSpecRow()" class="mt-2 text-xs font-mono text-royal hover:underline">+ AJOUTER UNE CARACTÉRISTIQUE</button>
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit" class="bg-obsidian text-ivory font-medium px-6 py-2.5 hover:bg-electric transition">
                Créer le produit
            </button>
            <a href="{{ route('admin.products.index') }}" class="text-titanium hover:text-royal text-sm self-center">Annuler</a>
        </div>

    </form>

    <script>
        function addSpecRow() {
            const container = document.getElementById('specs-container');
            const row = document.createElement('div');
            row.className = 'flex gap-2';
            row.innerHTML = `
                <input type="text" name="spec_names[]" placeholder="Ex: Processeur" class="w-1/3 border border-gray-300 px-3 py-2 text-sm">
                <input type="text" name="spec_values[]" placeholder="Ex: Intel i5" class="flex-grow border border-gray-300 px-3 py-2 text-sm">
            `;
            container.appendChild(row);
        }
    </script>

@endsection