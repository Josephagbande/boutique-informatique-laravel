@extends('layouts.app')

@section('title', 'Connexion — TechShop')

@section('content')

    <div class="max-w-md mx-auto bg-white border border-gray-200 p-8">

        <p class="font-mono text-xs text-royal uppercase tracking-widest mb-1">Compte</p>
        <h1 class="font-display text-2xl font-bold mb-6">Connexion</h1>

        @if ($errors->any())
            <div class="bg-red-50 text-red-700 text-sm px-4 py-2 mb-4 font-mono">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wide text-titanium mb-1">Mot de passe</label>
                <input type="password" name="password" required
                       class="w-full border border-gray-300 px-3 py-2 text-sm focus:border-royal focus:outline-none">
            </div>

            <label class="flex items-center gap-2 text-sm text-titanium">
                <input type="checkbox" name="remember">
                Se souvenir de moi
            </label>

            <button type="submit" class="w-full bg-obsidian text-ivory font-medium py-2.5 hover:bg-electric transition">
                Se connecter
            </button>

        </form>

        <p class="text-sm text-titanium mt-5 text-center">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="text-royal hover:underline">Créer un compte</a>
        </p>

    </div>

@endsection