@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">📚 Documentation</h1>
            <p class="text-lg md:text-xl text-indigo-100">Guides complets et tutoriels pas à pas pour maîtriser la plateforme</p>
        </div>
    </div>

    <!-- Documentation Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-12 py-16 md:py-20">
        <div class="space-y-8">
            <!-- Getting Started -->
            <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 hover:shadow-md transition">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                    🚀 Démarrage Rapide
                </h2>
                <ol class="list-decimal list-inside space-y-3 text-gray-700">
                    <li class="text-base md:text-lg">Créez votre compte en cliquant sur "S'inscrire"</li>
                    <li class="text-base md:text-lg">Validez votre email</li>
                    <li class="text-base md:text-lg">Complétez votre profil et vos informations de garage</li>
                    <li class="text-base md:text-lg">Commencez à ajouter vos véhicules et clients</li>
                </ol>
            </div>

            <!-- Users Management -->
            <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 hover:shadow-md transition">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                    👥 Gestion des Utilisateurs
                </h2>
                <p class="text-gray-700 mb-4">
                    En tant qu'administrateur, vous pouvez:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Créer de nouveaux utilisateurs et techniciens</li>
                    <li>Assigner des rôles (Admin ou Utilisateur)</li>
                    <li>Modifier les permissions et les accès</li>
                    <li>Supprimer des utilisateurs si nécessaire</li>
                </ul>
            </div>

            <!-- Vehicles Management -->
            <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 hover:shadow-md transition">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                    🚗 Gestion des Véhicules
                </h2>
                <p class="text-gray-700 mb-4">
                    Enregistrez tous les détails de vos véhicules:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Marque, modèle, année et numéro d'immatriculation</li>
                    <li>Numéro de châssis et numéro de moteur</li>
                    <li>Historique complet des réparations</li>
                    <li>Photos et documents importants</li>
                </ul>
            </div>

            <!-- Repairs Management -->
            <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 hover:shadow-md transition">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                    🔧 Suivi des Réparations
                </h2>
                <p class="text-gray-700 mb-4">
                    Suivez chaque réparation en détail:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Créez une réparation et assignez un technicien</li>
                    <li>Ajoutez une description détaillée du travail</li>
                    <li>Suivez l'état de progression en temps réel</li>
                    <li>Consultez l'historique complet des réparations</li>
                </ul>
            </div>

            <!-- Tips -->
            <div class="bg-blue-50 rounded-xl p-6 md:p-8 border-l-4 border-blue-600">
                <h3 class="text-xl font-bold text-blue-900 mb-3">💡 Conseils Utiles</h3>
                <ul class="space-y-2 text-blue-800">
                    <li>✓ Sauvegardez régulièrement vos données</li>
                    <li>✓ Utilisez des descriptions claires pour les réparations</li>
                    <li>✓ Consultez régulièrement les statistiques et rapports</li>
                    <li>✓ Mettez à jour les informations des techniciens</li>
                </ul>
            </div>

            <!-- Support -->
            <div class="bg-gradient-to-r from-indigo-50 to-blue-50 rounded-xl p-6 md:p-8 border-2 border-indigo-200">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">💬 Besoin d'Aide?</h2>
                <p class="text-gray-700 mb-4">
                    Si vous ne trouvez pas les réponses à vos questions, n'hésitez pas à:
                </p>
                <div class="space-y-2">
                    <a href="{{ route('contact') }}" class="block text-blue-600 hover:text-blue-800 font-semibold">
                        ✉️ Nous contacter par email
                    </a>
                    <a href="{{ route('faq') }}" class="block text-blue-600 hover:text-blue-800 font-semibold">
                        ❓ Consulter notre FAQ
                    </a>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-12">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-medium">
                ← Retour à l'accueil
            </a>
        </div>
    </div>
</div>
@endsection
