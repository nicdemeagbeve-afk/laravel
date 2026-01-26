@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <h1 class="text-5xl font-bold mb-6">🛡️ Sécurité</h1>
            <p class="text-xl text-green-100">La protection de vos données est notre priorité</p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto px-6 lg:px-12 py-20">
        <div class="space-y-12">
            <!-- Section 1 -->
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Chiffrement de Bout en Bout</h2>
                <p class="text-gray-700 leading-relaxed">
                    Toutes vos données sont chiffrées en transit et au repos avec le standard de chiffrement AES-256, 
                    le même utilisé par les institutions financières et gouvernementales.
                </p>
            </div>

            <!-- Section 2 -->
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Conformité RGPD</h2>
                <p class="text-gray-700 leading-relaxed">
                    garage-website est entièrement conforme au Règlement Général sur la Protection des Données (RGPD). 
                    Vous conservez le contrôle total de vos données et pouvez les exporter ou les supprimer à tout moment.
                </p>
            </div>

            <!-- Section 3 -->
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Authentification Sécurisée</h2>
                <p class="text-gray-700 leading-relaxed">
                    Nous utilisons l'authentification par mot de passe hachée avec bcrypt et supportons 
                    l'authentification multi-facteurs (2FA) pour une sécurité renforcée.
                </p>
            </div>

            <!-- Section 4 -->
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Sauvegardes Automatiques</h2>
                <p class="text-gray-700 leading-relaxed">
                    Vos données sont sauvegardées automatiquement toutes les heures sur des serveurs sécurisés. 
                    En cas de problème, nous pouvons restaurer vos données à tout moment.
                </p>
            </div>

            <!-- Section 5 -->
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Audits de Sécurité Réguliers</h2>
                <p class="text-gray-700 leading-relaxed">
                    Nous effectuons des audits de sécurité réguliers et des tests de pénétration pour identifier 
                    et corriger les vulnérabilités potentielles.
                </p>
            </div>

            <!-- Section 6 -->
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Infrastructure Sécurisée</h2>
                <p class="text-gray-700 leading-relaxed">
                    Nos serveurs sont hébergés dans des centres de données certifiés ISO 27001 avec surveillance 24/7, 
                    pare-feu avancés et protection DDoS.
                </p>
            </div>
        </div>

        <!-- Certifications -->
        <div class="mt-20 bg-gradient-to-r from-green-50 to-blue-50 rounded-xl p-8 border-2 border-green-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Certifications & Conformité</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div>
                    <p class="text-3xl mb-2">🔒</p>
                    <p class="font-semibold">RGPD</p>
                </div>
                <div>
                    <p class="text-3xl mb-2">✅</p>
                    <p class="font-semibold">ISO 27001</p>
                </div>
                <div>
                    <p class="text-3xl mb-2">🛡️</p>
                    <p class="font-semibold">SSL/TLS</p>
                </div>
                <div>
                    <p class="text-3xl mb-2">⚡</p>
                    <p class="font-semibold">DDoS Protection</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
