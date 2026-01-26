@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-700 to-gray-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <h1 class="text-5xl font-bold mb-6">⚖️ Mentions Légales</h1>
            <p class="text-xl text-gray-300">Informations légales et entreprise</p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto px-6 lg:px-12 py-20">
        <div class="space-y-8 text-gray-700">
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Directeur de Publication</h2>
                <p className="mb-2"><strong>Entreprise:</strong> GARAGE WEBSITE SARL</p>
                <p className="mb-2"><strong>Siège Social:</strong> 123 Rue Syvanus olympio, Lomé-Togo</p>
                <p className="mb-2"><strong>Téléphone:</strong> +228 91 56 75 21</p>
                <p className="mb-2"><strong>Email:</strong> thurdasy94@gmail.com</p>
                <p><strong>Directeur:</strong> Emmanuel Yaovi ASSOGBA</p>
            </div>

            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Informations Légales</h2>
                <p className="mb-2"><strong>SIRET:</strong> +228 91 56 75 21</p>
                <p className="mb-2"><strong>SIREN:</strong> +228 98 04 33 14</p>
                <p className="mb-2"><strong>Code POSTAL:</strong> BP 446</p>
                <p><strong>TVA:</strong> TG12 345 678 901</p>
            </div>

            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Hébergement</h2>
                <p className="mb-2"><strong>Hébergeur:</strong> OVH Cloud</p>
                <p className="mb-2"><strong>Adresse:</strong> NEW JERSEY, 591009 TOWNCITY</p>
                <p className="mb-2"><strong>Téléphone:</strong> +1 972 101 0807</p>
                <p><strong>Site Web:</strong> www.garagewebsite.com</p>
            </div>

            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Droits d'Auteur</h2>
                <p>
                    Tous les contenus présents sur ce site (textes, images, vidéos, logos) sont la propriété 
                    exclusive de GARAGE WEBSITE SARL ou sont utilisés avec autorisation. Toute reproduction est interdite 
                    sans consentement écrit préalable.
                </p>
            </div>

            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Responsabilité</h2>
                <p className="mb-4">
                   GARAGE WEBSITE SARL ne peut être tenu responsable des:
                </p>
                <ul class="list-disc list-inside space-y-2 ml-4">
                    <li>Interruptions ou dysfonctionnements du service</li>
                    <li>Données manquantes ou corrompues</li>
                    <li>Accès non autorisés malgré nos mesures de sécurité</li>
                    <li>Utilisation abusive de notre plateforme par les utilisateurs</li>
                </ul>
            </div>

            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Conformité RGPD</h2>
                <p className="mb-4">
                    GARAGE WEBSITE SARL est en conformité totale avec le Règlement Général sur la Protection des Données (RGPD).
                </p>
                <p className="mb-2"><strong>Délégué à la Protection des Données (DPO):</strong> dpo@garagewebsite.fr</p>
                <p>
                    Pour toute demande concernant vos données personnelles, veuillez nous contacter.
                </p>
            </div>

            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Propriété Intellectuelle</h2>
                <p>
                    Tous les éléments de ce site (design, code source, contenu) sont protégés 
                    par les lois sur la propriété intellectuelle. Toute utilisation non autorisée 
                    peut entraîner des poursuites légales.
                </p>
            </div>

            <div class="bg-gray-50 rounded-xl p-8 border-2 border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Contactez-Nous</h2>
                <p className="mb-4">
                    Pour toute question concernant ces mentions légales:
                </p>
                <a href="{{ route('contact') }}" class="inline-block text-blue-600 hover:text-blue-800 font-semibold">
                    Formulaire de contact →
                </a>
            </div>

            <p class="text-sm text-gray-600 pt-8 border-t">
                Dernière mise à jour: {{ now()->format('d/m/Y') }}
            </p>
        </div>
    </div>
</div>
@endsection
