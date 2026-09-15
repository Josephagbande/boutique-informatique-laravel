<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Récupère le panier actuel (visiteur ou connecté), en le créant si besoin.
     */
    private function getOrCreateCart(Request $request): Cart
    {
        if (auth()->check()) {
            return Cart::firstOrCreate(['user_id' => auth()->id()]);
        }

        $sessionId = $request->session()->get('cart_session_id');

        if (! $sessionId) {
            $sessionId = (string) str()->uuid();
            $request->session()->put('cart_session_id', $sessionId);
        }

        return Cart::firstOrCreate(['session_id' => $sessionId, 'user_id' => null]);
    }

    /**
     * Affiche le contenu du panier.
     */
    public function index(Request $request): View
    {
        $cart = $this->getOrCreateCart($request);
        $cart->load('items.product.images');

        return view('cart.index', compact('cart'));
    }

    /**
     * Ajoute un produit au panier (ou incrémente la quantité s'il y est déjà).
     */
    public function store(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'quantity' => ['nullable', 'integer', 'min:1'],
        ]);

        $quantity = $request->input('quantity', 1);
        $cart = $this->getOrCreateCart($request);

        $item = $cart->items()->where('product_id', $product->id)->first();

        if ($item) {
            $item->update(['quantity' => $item->quantity + $quantity]);
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->current_price,
            ]);
        }

        return redirect()
            ->route($request->boolean('buy_now') ? 'orders.checkout' : 'cart.index')
            ->with('success', 'Produit ajouté au panier.');
    }

    /**
     * Met à jour la quantité d'un article du panier.
     */
    public function update(Request $request, $itemId): RedirectResponse
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $cart = $this->getOrCreateCart($request);
        $item = $cart->items()->findOrFail($itemId);
        $item->update(['quantity' => $request->input('quantity')]);

        return redirect()->route('cart.index');
    }

    /**
     * Supprime un article du panier.
     */
    public function destroy(Request $request, $itemId): RedirectResponse
    {
        $cart = $this->getOrCreateCart($request);
        $cart->items()->findOrFail($itemId)->delete();

        return redirect()->route('cart.index')->with('success', 'Produit retiré du panier.');
    }
}