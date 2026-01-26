@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-purple-600 to-pink-600 text-white py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">📋 Conditions d'Utilisation</h1>
            <p class="text-lg md:text-xl text-purple-100">Les termes et conditions de nos services</p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-12 py-16 md:py-20">
        <!-- Section 1 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                1. Acceptation des Termes
            </h2>
            <p class="text-gray-700 leading-relaxed">
                En utilisant Garage Site et nos services, vous acceptez sans réserve ces conditions d'utilisation et nos autres politiques. Si vous n'acceptez pas ces termes, veuillez ne pas utiliser notre service. Nous nous réservons le droit de modifier ces conditions à tout moment.
            </p>
        </div>

        <!-- Section 2 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                🔐 2. Compte Utilisateur
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">Vous êtes responsable de:</p>
            <ul class="space-y-3 text-gray-700">
                <li class="flex items-start gap-3">
                    <span class="text-purple-600 font-bold text-xl flex-shrink-0">•</span>
                    <span><strong>Confidentialité:</strong> Maintenir la confidentialité de votre mot de passe</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-purple-600 font-bold text-xl flex-shrink-0">•</span>
                    <span><strong>Activités:</strong> Toutes les activités effectuées sur votre compte</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-purple-600 font-bold text-xl flex-shrink-0">•</span>
                    <span><strong>Notifications:</strong> Nous informer immédiatement de tout accès non autorisé</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-purple-600 font-bold text-xl flex-shrink-0">•</span>
                    <span><strong>Exactitude:</strong> Fournir des informations exactes lors de l'inscription</span>
                </li>
            </ul>
        </div>

        <!-- Section 3 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                ⛔ 3. Restrictions d'Utilisation
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">Vous vous engagez à ne pas:</p>
            <ul class="space-y-3 text-gray-700">
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold text-xl flex-shrink-0">✗</span>
                    <span>Utiliser le service à des fins illégales ou contraires à la loi française</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold text-xl flex-shrink-0">✗</span>
                    <span>Accéder sans autorisation aux données ou comptes d'autres utilisateurs</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold text-xl flex-shrink-0">✗</span>
                    <span>Transmettre des virus, vers, ou code malveillant</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold text-xl flex-shrink-0">✗</span>
                    <span>Violer les droits de propriété intellectuelle ou d'auteur</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold text-xl flex-shrink-0">✗</span>
                    <span>Harceler, menacer, ou intimider d'autres utilisateurs</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold text-xl flex-shrink-0">✗</span>
                    <span>Utiliser des outils d'automation pour contourner nos systèmes</span>
                </li>
            </ul>
        </div>

        <!-- Section 4 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                ⚖️ 4. Limitation de Responsabilité
            </h2>
            <div class="bg-purple-50 rounded-lg p-4 border border-purple-200 mb-4">
                <p class="text-purple-900 leading-relaxed">
                    Garage Site est fourni "tel quel" sans aucune garantie explicite ou implicite. Nous ne garantissons pas que le service sera:
                </p>
            </div>
            <ul class="space-y-2 text-gray-700 text-sm md:text-base">
                <li>• Ininterrupu ou sans erreurs</li>
                <li>• Compatible avec tous les appareils ou navigateurs</li>
                <li>• Exempt de virus ou de code malveillant</li>
                <li>• Répondra à tous vos besoins</li>
            </ul>
            <p class="text-gray-700 leading-relaxed mt-4">
                Nous ne sommes pas responsables des dommages directs, indirects, spéciaux, accidentels ou consécutifs résultant de votre utilisation du service.
            </p>
        </div>

        <!-- Section 5 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                🚪 5. Résiliation
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                <strong>Résiliation par l'utilisateur:</strong> Vous pouvez résilier votre compte à tout moment en nous contactant ou via les paramètres de votre compte.
            </p>
            <p class="text-gray-700 leading-relaxed">
                <strong>Résiliation par Garage Site:</strong> Nous pouvons résilier ou suspendre votre accès immédiatement et sans préavis en cas de:
            </p>
            <ul class="space-y-2 text-gray-700 text-sm md:text-base mt-3">
                <li>• Violation de ces conditions</li>
                <li>• Paiement non effectué</li>
                <li>• Conduite inappropriée ou offensante</li>
                <li>• Activités frauduleuses ou suspectes</li>
            </ul>
        </div>

        <!-- Section 6 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                📝 6. Modifications des Termes
            </h2>
            <p class="text-gray-700 leading-relaxed">
                Nous nous réservons le droit de modifier ces conditions d'utilisation à tout moment. Les modifications seront communiquées:
            </p>
            <ul class="space-y-2 text-gray-700 text-sm md:text-base mt-3">
                <li>• Par email à l'adresse associée à votre compte</li>
                <li>• Par notification sur le site</li>
                <li>• En publiant les modifications sur cette page</li>
            </ul>
            <p class="text-gray-700 leading-relaxed mt-4">
                Votre utilisation continue du service après les modifications constitue votre acceptation des nouvelles conditions.
            </p>
        </div>

        <!-- Section 7 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                ⚖️ 7. Loi Applicable et Juridiction
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Ces conditions d'utilisation sont régies par la loi française. Tout litige ou réclamation découlant de ou relatif à votre utilisation du service sera résolu selon les lois en vigueur en France.
            </p>
            <div class="bg-pink-50 rounded-lg p-4 border border-pink-200">
                <p class="text-pink-900 font-medium">Juridiction compétente:</p>
                <p class="text-pink-900 text-sm mt-2">Les tribunaux de Paris, France sont compétents pour connaître de tout litige.</p>
            </div>
        </div>

        <!-- Section 8 -->
        <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200 mb-6 hover:shadow-md transition">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                💳 8. Paiements et Facturation
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Les paiements sont traités de manière sécurisée. En acceptant un paiement, vous autorisez le prélèvement du montant indiqué. Les factures sont envoyées par email.
            </p>
            <ul class="space-y-2 text-gray-700 text-sm md:text-base">
                <li>• Les prix affichés incluent les taxes applicables</li>
                <li>• Les remboursements sont traités selon nos conditions de remboursement</li>
                <li>• Les litiges de paiement doivent être signalés sous 30 jours</li>
            </ul>
        </div>

        <!-- Section 9 -->
        <div class="bg-purple-50 rounded-xl p-6 md:p-8 border border-purple-200 mb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                ❓ 9. Questions?
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Pour toute question concernant ces conditions d'utilisation, veuillez nous contacter:
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-medium text-sm md:text-base">
                📧 Nous Contacter
            </a>
        </div>

        <!-- Last Updated -->
        <div class="mt-8 p-4 bg-gray-100 rounded-lg text-center text-gray-600 text-sm">
            <p>Dernière mise à jour: 15 janvier 2026</p>
        </div>

        <!-- Back Button -->
        <div class="mt-8 md:mt-12">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-medium text-sm md:text-base">
                ← Retour à l'accueil
            </a>
        </div>
    </div>
</div>
@endsection
