@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 min-h-screen flex items-center">
    <!-- Animated Background -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10 w-full">
        <!-- Navigation Bar -->
        <nav class="absolute top-0 left-0 right-0 px-6 lg:px-12 py-6 flex justify-between items-center">
            <div class="text-2xl font-bold text-white">
                🔧 GARAGE-WEBSITE
            </div>
            <div class="hidden md:flex gap-4">
                @if(auth()->check())
                    <span class="text-blue-300 font-medium">Bienvenue {{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2 text-white hover:text-blue-300 transition font-medium">Se connecter</a>
                    <a href="{{ route('register') }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">S'inscrire</a>
                @endif
            </div>
        </nav>

        <!-- Hero Content -->
        <div class="max-w-7xl mx-auto px-6 lg:px-12 py-32 text-center">
            <!-- Main Title -->
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-white mb-6 leading-tight">
                Gestion de Garage
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Simplifiée</span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-lg md:text-xl lg:text-2xl text-gray-300 mb-12 max-w-3xl mx-auto leading-relaxed">
                Gérez vos véhicules, techniciens et réparations avec une plateforme puissante et intuitive. 
                Optimisez votre flux de travail et augmentez votre productivité.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                @if(auth()->check())
                    <a href="{{ route('dashboard') }}" class="px-10 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition font-bold text-lg shadow-lg">
                        📊 Aller au Tableau de Bord
                    </a>
                @else
                    <a href="{{ route('register') }}" class="px-10 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition font-bold text-lg shadow-lg">
                        🚀 Commencer Maintenant
                    </a>
                    <a href="{{ route('login') }}" class="px-10 py-4 bg-transparent border-2 border-white text-white rounded-lg hover:bg-white hover:text-blue-900 transition font-bold text-lg">
                        🔑 Se Connecter
                    </a>
                @endif
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 md:gap-8 max-w-3xl mx-auto">
                <div class="bg-white/10 backdrop-blur-lg rounded-lg p-6 border border-white/20 hover:bg-white/20 transition duration-300">
                    <div class="text-3xl font-bold text-blue-400">100%</div>
                    <div class="text-gray-300 text-sm mt-2">Sécurisé</div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg rounded-lg p-6 border border-white/20 hover:bg-white/20 transition duration-300">
                    <div class="text-3xl font-bold text-purple-400">24/7</div>
                    <div class="text-gray-300 text-sm mt-2">Disponible</div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg rounded-lg p-6 border border-white/20 hover:bg-white/20 transition duration-300">
                    <div class="text-3xl font-bold text-pink-400">∞</div>
                    <div class="text-gray-300 text-sm mt-2">Utilisateurs</div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white/50 animate-bounce">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</div>

<!-- Features Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-12 md:mb-16">
            Fonctionnalités Principales
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            <!-- Feature 1 -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 md:p-8 border border-blue-200 hover:shadow-lg transition duration-300">
                <div class="text-5xl mb-4">🚗</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Gestion Véhicules</h3>
                <p class="text-gray-700">Enregistrez et suivez tous vos véhicules avec informations détaillées.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 md:p-8 border border-green-200 hover:shadow-lg transition duration-300">
                <div class="text-5xl mb-4">👨‍🔧</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Gestion Techniciens</h3>
                <p class="text-gray-700">Organisez votre équipe et assignez les réparations aux qualifiés.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 md:p-8 border border-purple-200 hover:shadow-lg transition duration-300">
                <div class="text-5xl mb-4">🔧</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Suivi Réparations</h3>
                <p class="text-gray-700">Suivez chaque réparation en temps réel du début à la fin.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-6 md:p-8 border border-orange-200 hover:shadow-lg transition duration-300">
                <div class="text-5xl mb-4">👥</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Gestion Clients</h3>
                <p class="text-gray-700">Gardez une trace complète de vos clients et historiques.</p>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-16 md:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-12 md:mb-16">
            Avantages de Notre Solution
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-600 text-white text-xl">
                        ⚡
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Rapide et Efficace</h3>
                    <p class="text-gray-700">Terminez les tâches plus rapidement avec une interface intuitive.</p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-600 text-white text-xl">
                        🛡️
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Sécurisé</h3>
                    <p class="text-gray-700">Vos données sont protégées avec les meilleures pratiques.</p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-600 text-white text-xl">
                        📈
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Croissance</h3>
                    <p class="text-gray-700">Évoluez facilement à mesure que votre entreprise se développe.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 md:py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="max-w-4xl mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Prêt à Transformer Votre Garage?
        </h2>
        <p class="text-lg md:text-xl mb-10 text-blue-100">
            Rejoignez des centaines de garages qui font déjà confiance à notre plateforme.
        </p>
        @if(!auth()->check())
            <a href="{{ route('register') }}" class="inline-block px-10 py-4 bg-white text-blue-600 rounded-lg hover:bg-gray-100 transition font-bold text-lg">
                Commencer Gratuitement
            </a>
        @endif
    </div>
</section>

<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>
@endsection
