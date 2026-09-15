<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Fusionne le panier "invité" (session) avec le panier du compte qui vient de se connecter.
     * Si le même produit existe dans les deux paniers, les quantités s'additionnent.
     */
    private function mergeGuestCartIntoUserCart(Request $request, User $user): void
    {
        $sessionId = $request->session()->get('cart_session_id');

        if (! $sessionId) {
            return;
        }

        $guestCart = Cart::where('session_id', $sessionId)->first();

        if (! $guestCart || $guestCart->items->isEmpty()) {
            return;
        }

        $userCart = Cart::firstOrCreate(['user_id' => $user->id]);

        foreach ($guestCart->items as $guestItem) {
            $existing = $userCart->items()->where('product_id', $guestItem->product_id)->first();

            if ($existing) {
                $existing->update(['quantity' => $existing->quantity + $guestItem->quantity]);
            } else {
                $userCart->items()->create([
                    'product_id' => $guestItem->product_id,
                    'quantity' => $guestItem->quantity,
                    'price' => $guestItem->price,
                ]);
            }
        }

        $guestCart->delete();
        $request->session()->forget('cart_session_id');
    }

    /**
     * Affiche le formulaire d'inscription.
     */
    public function showRegister(): View
    {
        return view('auth.register');
    }

    /**
     * Traite l'inscription d'un nouveau client.
     */
    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => Hash::make($validated['password']),
            'role' => 'customer',
        ]);

        Auth::login($user);
        $this->mergeGuestCartIntoUserCart($request, $user);

        return redirect()->route('products.index')->with('success', 'Bienvenue, ton compte a été créé !');
    }

    /**
     * Affiche le formulaire de connexion.
     */
    public function showLogin(): View
    {
        return view('auth.login');
    }

    /**
     * Traite la connexion.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $this->mergeGuestCartIntoUserCart($request, Auth::user());

            return redirect()->intended(route('products.index'))->with('success', 'Connexion réussie.');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ])->onlyInput('email');
    }

    /**
     * Déconnecte l'utilisateur.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('products.index')->with('success', 'Tu as été déconnecté.');
    }
}