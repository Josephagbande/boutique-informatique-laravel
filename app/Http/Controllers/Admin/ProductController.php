<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::with(['category', 'brand']);

        if ($search = $request->input('q')) {
            $query->where('name', 'like', "%{$search}%");
        }

        $products = $query->latest()->paginate(15)->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProduct($request);

        $product = Product::create([
            ...$validated,
            'slug' => Str::slug($validated['name']) . '-' . Str::random(5),
            'reference' => strtoupper(Str::random(8)),
        ]);

        $this->handleSpecs($request, $product);
        $this->handleImage($request, $product);

        return redirect()->route('admin.products.index')->with('success', 'Produit créé avec succès.');
    }

    public function edit(Product $product): View
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product->load('specs', 'images');

        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $this->validateProduct($request);

        $product->update($validated);

        $this->handleSpecs($request, $product, true);
        $this->handleImage($request, $product);

        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé.');
    }

    private function validateProduct(Request $request): array
    {
        return $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lt:price'],
            'condition' => ['required', 'in:new,used,refurbished'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:active,inactive'],
        ]);
    }

    /**
     * Enregistre les caractéristiques techniques envoyées sous forme de 2 tableaux parallèles
     * (spec_names[] et spec_values[]) depuis le formulaire.
     */
    private function handleSpecs(Request $request, Product $product, bool $replace = false): void
    {
        if (! $request->has('spec_names')) {
            return;
        }

        if ($replace) {
            $product->specs()->delete();
        }

        $names = $request->input('spec_names', []);
        $values = $request->input('spec_values', []);

        foreach ($names as $i => $name) {
            if (trim($name) === '' || ! isset($values[$i]) || trim($values[$i]) === '') {
                continue;
            }

            $product->specs()->create([
                'spec_name' => $name,
                'spec_value' => $values[$i],
            ]);
        }
    }

    /**
     * Enregistre l'image uploadée (si présente) comme image principale du produit.
     */
    private function handleImage(Request $request, Product $product): void
    {
        if (! $request->hasFile('image')) {
            return;
        }

        $request->validate([
            'image' => ['image', 'max:4096'],
        ]);

        $path = $request->file('image')->store('products', 'public');

        // Supprime les anciennes images (fichiers réels si stockés localement, et enregistrements en base)
        foreach ($product->images as $oldImage) {
            if (! str_starts_with($oldImage->image, 'http')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($oldImage->image);
            }
            $oldImage->delete();
        }

        $product->images()->create([
            'image' => $path,
            'is_primary' => true,
        ]);
    }
}