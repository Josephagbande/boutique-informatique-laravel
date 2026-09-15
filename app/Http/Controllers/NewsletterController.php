<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'unique:newsletter_subscribers,email'],
        ], [
            'email.unique' => 'Cet email est déjà inscrit à la newsletter.',
        ]);

        NewsletterSubscriber::create($validated);

        return back()->with('success', 'Merci ! Tu es maintenant inscrit à la newsletter.');
    }
}