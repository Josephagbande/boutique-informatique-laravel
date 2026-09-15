<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FavoriteController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [PageController::class, 'about']);

Route::get('/services', [PageController::class, 'services']);

Route::get('/portfolio', [PageController::class, 'portfolio']);

Route::get('/blog', [PageController::class, 'blog']);

Route::get('/pricing', [PageController::class, 'pricing']);

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'ajouter'])->name('contact.ajouter');

use App\Http\Controllers\ProductController;

Route::get('/produits', [ProductController::class, 'index'])->name('products.index');

Route::get('/produits/{product}', [ProductController::class, 'show'])->name('products.show');

use App\Http\Controllers\CartController;

Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::post('/panier/{product}', [CartController::class, 'store'])->name('cart.store');
Route::put('/panier/item/{itemId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/panier/item/{itemId}', [CartController::class, 'destroy'])->name('cart.destroy');

use App\Http\Controllers\NewsletterController;

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

use App\Http\Controllers\AuthController;

Route::get('/inscription', [AuthController::class, 'showRegister'])->name('register');
Route::post('/inscription', [AuthController::class, 'register']);

Route::get('/connexion', [AuthController::class, 'showLogin'])->name('login');
Route::post('/connexion', [AuthController::class, 'login']);

Route::post('/deconnexion', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;

Route::middleware('auth')->group(function () {
    Route::get('/commande', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('/commande', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/commande/{order}/confirmation', [OrderController::class, 'confirmation'])->name('orders.confirmation');
    Route::get('/mes-commandes', [OrderController::class, 'history'])->name('orders.history');
    Route::post('/produits/{product}/avis', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/favoris/{product}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/mes-favoris', [FavoriteController::class, 'index'])->name('favorites.index');
});

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\NewsletterController as AdminNewsletterController;
use App\Http\Middleware\AdminMiddleware;

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/produits', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/produits/nouveau', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/produits', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/produits/{product}/modifier', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/produits/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/produits/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/commandes', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/commandes/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::put('/commandes/{order}/statut', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');

    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

    Route::get('/avis', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::put('/avis/{review}/approuver', [AdminReviewController::class, 'approve'])->name('reviews.approve');
    Route::put('/avis/{review}/rejeter', [AdminReviewController::class, 'reject'])->name('reviews.reject');

    Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions.index');
    Route::get('/promotions/nouveau', [PromotionController::class, 'create'])->name('promotions.create');
    Route::post('/promotions', [PromotionController::class, 'store'])->name('promotions.store');
    Route::get('/promotions/{promotion}/modifier', [PromotionController::class, 'edit'])->name('promotions.edit');
    Route::put('/promotions/{promotion}', [PromotionController::class, 'update'])->name('promotions.update');
    Route::delete('/promotions/{promotion}', [PromotionController::class, 'destroy'])->name('promotions.destroy');

    Route::get('/newsletter', [AdminNewsletterController::class, 'index'])->name('newsletter.index');
});