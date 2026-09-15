<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Affiche la liste des produits (catalogue).
     */
    public function index(Request $request): View
    {
        $query = Product::with(['category', 'brand', 'images'])
            ->where('status', 'active');

        if ($search = $request->input('q')) {
            $query->where('name', 'like', "%{$search}%");
        }

        if ($categorySlug = $request->input('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $categorySlug));
        }

        $products = $query->latest()->paginate(12)->withQueryString();

        $categories = \App\Models\Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Affiche la fiche détaillée d'un produit.
     */
    public function show(Product $product): View
    {
        $product->load(['category', 'brand', 'images', 'specs', 'approvedReviews.user']);

        return view('products.show', compact('product'));
    }
}