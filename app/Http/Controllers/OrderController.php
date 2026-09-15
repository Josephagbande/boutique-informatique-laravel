<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Promotion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Récupère le panier de l'utilisateur connecté.
     */
    private function getCart(): ?Cart
    {
        return Cart::where('user_id', auth()->id())->with('items.product')->first();
    }

    /**
     * Affiche la page de commande (choix/saisie de l'adresse).
     */
    public function checkout(): View|RedirectResponse
    {
        $cart = $this->getCart();

        if (! $cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Ton panier est vide.');
        }

        $addresses = Address::where('user_id', auth()->id())->get();

        return view('orders.checkout', compact('cart', 'addresses'));
    }

    /**
     * Traite la validation de la commande.
     */
    public function store(Request $request): RedirectResponse
    {
        $cart = $this->getCart();

        if (! $cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Ton panier est vide.');
        }

        $validated = $request->validate([
            'address_id' => ['nullable', 'exists:addresses,id'],
            'new_address' => ['required_without:address_id', 'nullable', 'string'],
            'new_city' => ['required_without:address_id', 'nullable', 'string'],
            'new_district' => ['nullable', 'string'],
            'new_phone' => ['required_without:address_id', 'nullable', 'string'],
            'shipping_cost' => ['nullable', 'numeric', 'min:0'],
            'promo_code' => ['nullable', 'string'],
        ]);

        // Récupère ou crée l'adresse
        if (! empty($validated['address_id'])) {
            $address = Address::where('user_id', auth()->id())->findOrFail($validated['address_id']);
        } else {
            $address = Address::create([
                'user_id' => auth()->id(),
                'address' => $validated['new_address'],
                'city' => $validated['new_city'],
                'district' => $validated['new_district'] ?? null,
                'phone' => $validated['new_phone'],
                'is_default' => Address::where('user_id', auth()->id())->doesntExist(),
            ]);
        }

        // Vérifie le stock avant de valider quoi que ce soit
        foreach ($cart->items as $item) {
            if ($item->quantity > $item->product->stock_quantity) {
                return back()->withErrors([
                    'stock' => "Stock insuffisant pour \"{$item->product->name}\" (disponible : {$item->product->stock_quantity}).",
                ]);
            }
        }

        // Vérifie et calcule le code promo, s'il y en a un
        $promotion = null;
        $discountAmount = 0;

        if (! empty($validated['promo_code'])) {
            $promotion = Promotion::where('code', strtoupper(trim($validated['promo_code'])))->first();

            if (! $promotion || ! $promotion->isValid()) {
                return back()->withErrors(['promo_code' => 'Ce code promo n\'est pas valide ou a expiré.'])->withInput();
            }
        }

        $order = DB::transaction(function () use ($cart, $address, $validated, $promotion, &$discountAmount) {
            $subtotal = $cart->items->sum(fn ($item) => $item->price * $item->quantity);
            $shippingCost = $validated['shipping_cost'] ?? 2000;

            if ($promotion) {
                $discountAmount = $promotion->calculateDiscount($subtotal);
                $promotion->increment('used_count');
            }

            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => 'CMD-' . strtoupper(uniqid()),
                'status' => 'confirmed',
                'subtotal' => $subtotal,
                'shipping_cost' => $shippingCost,
                'promo_code' => $promotion?->code,
                'discount_amount' => $discountAmount ?: null,
                'total' => $subtotal + $shippingCost - $discountAmount,
                'shipping_address' => "{$address->address}, {$address->city}" . ($address->district ? ", {$address->district}" : ''),
            ]);

            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'subtotal' => $item->price * $item->quantity,
                ]);

                // Décrémente le stock de façon sécurisée (verrou pour éviter les conflits)
                $product = $item->product()->lockForUpdate()->first();
                $product->decrement('stock_quantity', $item->quantity);
            }

            // Paiement simulé (en attendant l'intégration d'un vrai prestataire)
            Payment::create([
                'order_id' => $order->id,
                'method' => 'simulated',
                'transaction_id' => 'SIM-' . strtoupper(uniqid()),
                'amount' => $order->total,
                'status' => 'paid',
                'paid_at' => now(),
            ]);

            Delivery::create([
                'order_id' => $order->id,
                'address' => $address->address,
                'city' => $address->city,
                'district' => $address->district,
                'phone' => $address->phone,
                'status' => 'pending',
            ]);

            // Vide le panier
            $cart->items()->delete();

            return $order;
        });

        return redirect()->route('orders.confirmation', $order)->with('success', 'Commande validée !');
    }

    /**
     * Affiche la confirmation d'une commande.
     */
    public function confirmation(Order $order): View
    {
        abort_if($order->user_id !== auth()->id(), 403);

        $order->load('items.product', 'payment', 'delivery');

        return view('orders.confirmation', compact('order'));
    }

    /**
     * Affiche l'historique des commandes du client.
     */
    public function history(): View
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();

        return view('orders.history', compact('orders'));
    }
}