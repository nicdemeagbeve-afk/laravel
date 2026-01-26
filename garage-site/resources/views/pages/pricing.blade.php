@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <h1 class="text-5xl font-bold mb-6">Nos Tarifs</h1>
            <p class="text-xl text-blue-100">Des plans adaptés à chaque type de garage</p>
        </div>
    </div>

    <!-- Pricing Cards -->
    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Starter Plan -->
            <div class="bg-white rounded-xl p-8 shadow-lg border-2 border-gray-200 hover:border-blue-500 transition">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Starter</h3>
                <p class="text-gray-600 mb-6">Pour les petits garages</p>
                <div class="text-4xl font-bold text-blue-600 mb-6">
                    18 000 F <span class="text-lg text-gray-600">/mois</span>
                </div>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-3">
                        <span class="text-green-500">✓</span>
                        <span>Jusqu'à 5 véhicules</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-green-500">✓</span>
                        <span>2 utilisateurs</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-green-500">✓</span>
                        <span>Support email</span>
                    </li>
                </ul>
                <a href="{{ route('register') }}" class="w-full block text-center bg-gray-200 text-gray-900 py-3 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Commencer
                </a>
            </div>

            <!-- Professional Plan -->
            <div class="bg-white rounded-xl p-8 shadow-lg border-2 border-blue-500 hover:shadow-2xl transition transform -translate-y-4">
                <div class="bg-blue-600 text-white px-4 py-2 rounded-full inline-block mb-4 font-semibold">
                    Populaire
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Professional</h3>
                <p class="text-gray-600 mb-6">Pour les garages en croissance</p>
                <div class="text-4xl font-bold text-blue-600 mb-6">
                    45 000 F <span class="text-lg text-gray-600">/mois</span>
                </div>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-3">
                        <span class="text-green-500">✓</span>
                        <span>Véhicules illimités</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-green-500">✓</span>
                        <span>10 utilisateurs</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-green-500">✓</span>
                        <span>Support prioritaire</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-green-500">✓</span>
                        <span>Rapports avancés</span>
                    </li>
                </ul>
                <a href="{{ route('register') }}" class="w-full block text-center bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                    Commencer
                </a>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-white rounded-xl p-8 shadow-lg border-2 border-gray-200 hover:border-purple-500 transition">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Enterprise</h3>
                <p class="text-gray-600 mb-6">Pour les grands garages</p>
                <div class="text-4xl font-bold text-purple-600 mb-6">
                    Sur devis
                </div>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-3">
                        <span class="text-green-500">✓</span>
                        <span>Tout illimité</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-green-500">✓</span>
                        <span>Support 24/7</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-green-500">✓</span>
                        <span>Formation personnalisée</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-green-500">✓</span>
                        <span>API personnalisée</span>
                    </li>
                </ul>
                <a href="{{ route('contact') }}" class="w-full block text-center bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition font-semibold">
                    Nous Contacter
                </a>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="max-w-4xl mx-auto px-6 lg:px-12 py-20">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Questions Fréquentes</h2>
        <div class="space-y-4">
            <details class="bg-white rounded-lg p-6 cursor-pointer hover:shadow-lg transition">
                <summary class="font-semibold text-gray-900 text-lg">Puis-je changer de plan?</summary>
                <p class="text-gray-700 mt-4">Oui, vous pouvez upgrader ou downgrader à tout moment. Les changements prennent effet immédiatement.</p>
            </details>
            <details class="bg-white rounded-lg p-6 cursor-pointer hover:shadow-lg transition">
                <summary class="font-semibold text-gray-900 text-lg">Y a-t-il une période d'essai gratuit?</summary>
                <p class="text-gray-700 mt-4">Oui! Les 30 premiers jours sont gratuits pour tous les nouveaux utilisateurs.</p>
            </details>
            <details class="bg-white rounded-lg p-6 cursor-pointer hover:shadow-lg transition">
                <summary class="font-semibold text-gray-900 text-lg">Comment fonctionne la facturation?</summary>
                <p class="text-gray-700 mt-4">La facturation est mensuelle, automatique et peut être annulée à tout moment sans frais.</p>
            </details>
        </div>
    </div>
</div>
@endsection
