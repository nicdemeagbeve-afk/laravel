@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-teal-600 text-white py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Politique de Confidentialité</h1>
            <p class="text-lg md:text-xl text-green-100">Vos données sont importantes pour nous</p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-12 py-16 md:py-20">
        <!-- Section 1 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                📋 1. Introduction
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Garage webSite ("nous", "notre" ou "nos") exploite le site web www.garage-website.com (le "Site"). Cette page vous informe de nos politiques concernant la collecte, l'utilisation et la divulgation des données personnelles lorsque vous utilisez notre Service et les choix que vous avez associés à ces données.
            </p>
            <p class="text-gray-700 leading-relaxed">
                Nous utilisons vos données pour fournir et améliorer le Service. En utilisant le Service, vous consentez à la collecte et à l'utilisation d'informations conformément à cette politique.
            </p>
        </div>

        <!-- Section 2 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                📊 2. Collecte et Utilisation des Données
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Nous collectons plusieurs types de données à différentes fins pour vous fournir un meilleur service:
            </p>
            <ul class="space-y-3 text-gray-700">
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl flex-shrink-0">✓</span>
                    <span><strong>Données d'identification:</strong> Nom, prénom, adresse email, numéro de téléphone, adresse physique</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl flex-shrink-0">✓</span>
                    <span><strong>Données véhicules:</strong> Marque, modèle, immatriculation, année de fabrication</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl flex-shrink-0">✓</span>
                    <span><strong>Données de paiement:</strong> Informations de carte (traitées de manière sécurisée par Stripe)</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl flex-shrink-0">✓</span>
                    <span><strong>Cookies et Logs:</strong> Adresse IP, type de navigateur, pages visitées, durée des sessions</span>
                </li>
            </ul>
        </div>

        <!-- Section 3 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                🔐 3. Sécurité des Données
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                La sécurité de vos données est importante pour nous mais rappelez-vous qu'aucune méthode de transmission par Internet ou de stockage électronique n'est 100% sûre. Bien que nous nous efforcions d'utiliser des moyens commercialement acceptables pour protéger vos données personnelles, nous ne pouvons pas garantir sa sécurité absolue.
            </p>
            <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                <p class="text-green-900 font-medium">🛡️ Mesures de sécurité:</p>
                <ul class="list-disc list-inside text-green-900 text-sm mt-2 space-y-1">
                    <li>Chiffrement SSL/TLS de toutes les connexions</li>
                    <li>Stockage sécurisé des données en base de données</li>
                    <li>Authentification à deux facteurs disponible</li>
                    <li>Sauvegardes quotidiennes des données</li>
                </ul>
            </div>
        </div>

        <!-- Section 4 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                📲 4. Cookies
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Nous utilisons des cookies pour améliorer votre expérience sur notre site. Les cookies sont de petits fichiers texte stockés sur votre appareil.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                    <p class="font-bold text-blue-900 mb-2">Cookies Essentiels</p>
                    <p class="text-blue-900 text-sm">Nécessaires pour le fonctionnement du site (authentification, sécurité)</p>
                </div>
                <div class="bg-purple-50 rounded-lg p-4 border border-purple-200">
                    <p class="font-bold text-purple-900 mb-2">Cookies Analytiques</p>
                    <p class="text-purple-900 text-sm">Pour analyser comment vous utilisez le site</p>
                </div>
            </div>
        </div>

        <!-- Section 5 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                ⚖️ 5. Vos Droits RGPD
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Selon le Règlement Général sur la Protection des Données (RGPD), vous disposez des droits suivants:
            </p>
            <ul class="space-y-2 text-gray-700 text-sm md:text-base">
                <li class="flex items-center gap-2"><span class="text-green-600">✓</span> <strong>Droit d'accès:</strong> Accéder à vos données personnelles</li>
                <li class="flex items-center gap-2"><span class="text-green-600">✓</span> <strong>Droit de rectification:</strong> Corriger vos données inexactes</li>
                <li class="flex items-center gap-2"><span class="text-green-600">✓</span> <strong>Droit à l'effacement:</strong> Demander la suppression de vos données</li>
                <li class="flex items-center gap-2"><span class="text-green-600">✓</span> <strong>Droit à la portabilité:</strong> Recevoir vos données dans un format courant</li>
                <li class="flex items-center gap-2"><span class="text-green-600">✓</span> <strong>Droit d'opposition:</strong> Vous opposer au traitement de vos données</li>
            </ul>
        </div>

        <!-- Section 6 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                📧 6. Modifications de la Politique
            </h2>
            <p class="text-gray-700 leading-relaxed">
                Nous pouvons mettre à jour cette Politique de Confidentialité à tout moment. Les modifications seront publiées sur cette page avec la date de la dernière mise à jour. Votre utilisation continue du Service après les modifications constitue votre acceptation de la nouvelle politique.
            </p>
        </div>

        <!-- Section 7 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                ✉️ 7. Nous Contacter
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Si vous avez des questions concernant cette Politique de Confidentialité, veuillez nous contacter:
            </p>
            <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                <p class="text-green-900 font-medium">Garage webSite</p>
                <p class="text-green-900 text-sm">Email: thurdasy94@gmail.com</p>
                <p class="text-green-900 text-sm">Téléphone: +228 90 41 39 39</p>
                <p class="text-green-900 text-sm">Adresse: 123 Rue SYLVANUS OLYMPIO, BP 446 Lomé, Togo</p>
            </div>
        </div>

        <!-- Last Updated -->
        <div class="mt-8 p-4 bg-gray-100 rounded-lg text-center text-gray-600 text-sm">
            <p>Dernière mise à jour: 15 janvier 2026</p>
        </div>

        <!-- Back Button -->
        <div class="mt-8 md:mt-12">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium text-sm md:text-base">
                ← Retour à l'accueil
            </a>
        </div>
    </div>
</div>
@endsection
