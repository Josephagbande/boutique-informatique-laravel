<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    /**
     * Ajoute ou retire un produit des favoris de l'utilisateur connecté.
     */
    public function toggle(Product $product): RedirectResponse
    {
        $favorite = Favorite::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $message = 'Retiré des favoris.';
        } else {
            Favorite::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
            ]);
            $message = 'Ajouté aux favoris.';
        }

        return back()->with('success', $message);
    }

    /**
     * Affiche la liste des produits favoris de l'utilisateur connecté.
     */
    public function index(): View
    {
        $products = Product::whereHas('favorites', function ($query) {
            $query->where('user_id', auth()->id());
        })->with(['category', 'brand', 'images'])->get();

        return view('favorites.index', compact('products'));
    }
}