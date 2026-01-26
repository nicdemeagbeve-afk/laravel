@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <h1 class="text-5xl font-bold mb-6">Nos Fonctionnalités</h1>
            <p class="text-xl text-blue-100">Découvrez toutes les possibilités offertes par Garage Pro</p>
        </div>
    </div>

    <!-- Features Grid -->
    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-2xl transition">
                <div class="text-5xl mb-4">🚗</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Gestion Complète des Véhicules</h3>
                <p class="text-gray-700">Enregistrez tous les véhicules avec informations détaillées, historique de réparation et documents associés.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-2xl transition">
                <div class="text-5xl mb-4">👨‍🔧</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Gestion des Techniciens</h3>
                <p class="text-gray-700">Organisez votre équipe, assignez les réparations et suivez la productivité de chaque technicien.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-2xl transition">
                <div class="text-5xl mb-4">🔧</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Suivi des Réparations</h3>
                <p class="text-gray-700">Suivez chaque réparation en temps réel avec devis, pièces utilisées et temps de travail.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-2xl transition">
                <div class="text-5xl mb-4">👥</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Base Clients Avancée</h3>
                <p class="text-gray-700">Gardez une trace complète des clients, leurs véhicules et l'historique de leurs réparations.</p>
            </div>

            <!-- Feature 5 -->
            <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-2xl transition">
                <div class="text-5xl mb-4">📊</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Tableau de Bord Intuitif</h3>
                <p class="text-gray-700">Vue d'ensemble complète avec statistiques en temps réel et indicateurs clés de performance.</p>
            </div>

            <!-- Feature 6 -->
            <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-2xl transition">
                <div class="text-5xl mb-4">🔐</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Gestion des Accès</h3>
                <p class="text-gray-700">Contrôlez les permissions avec rôles d'administrateur et utilisateur pour une sécurité maximale.</p>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="bg-blue-600 text-white py-12">
        <div class="max-w-4xl mx-auto px-6 lg:px-12 text-center">
            <h2 class="text-3xl font-bold mb-4">Prêt à découvrir plus?</h2>
            <a href="{{ route('register') }}" class="inline-block px-10 py-4 bg-white text-blue-600 rounded-lg hover:bg-gray-100 transition font-bold">
                Essayer Gratuitement
            </a>
        </div>
    </div>
</div>
@endsection
