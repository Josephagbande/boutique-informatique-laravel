<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Enregistre l'avis d'un client sur un produit qu'il a acheté.
     */
    public function store(Request $request, Product $product): RedirectResponse
    {
        abort_unless($product->wasPurchasedByCurrentUser(), 403, 'Tu dois avoir acheté ce produit pour laisser un avis.');
        abort_if($product->hasBeenReviewedByCurrentUser(), 403, 'Tu as déjà laissé un avis sur ce produit.');

        $validated = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['nullable', 'string', 'max:1000'],
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Merci ! Ton avis a été envoyé et sera visible après validation.');
    }
}