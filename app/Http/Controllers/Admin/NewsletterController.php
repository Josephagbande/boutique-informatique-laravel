<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\View\View;

class NewsletterController extends Controller
{
    public function index(): View
    {
        $subscribers = NewsletterSubscriber::latest()->paginate(20);

        return view('admin.newsletter.index', compact('subscribers'));
    }
}