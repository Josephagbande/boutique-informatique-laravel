<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $categories = Category::withCount('products')->get();

        $featuredProducts = Product::with(['category', 'brand', 'images'])
            ->where('status', 'active')
            ->orderByRaw('sale_price IS NOT NULL DESC')
            ->latest()
            ->take(4)
            ->get();

        $testimonials = Review::with(['user', 'product'])
            ->where('status', 'approved')
            ->where('rating', '>=', 4)
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('categories', 'featuredProducts', 'testimonials'));
    }
}