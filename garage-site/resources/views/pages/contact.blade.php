@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-orange-600 to-red-600 text-white py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">📧 Nous Contacter</h1>
            <p class="text-lg md:text-xl text-orange-100">Nous sommes là pour vous aider quelque soit le problème</p>
        </div>
    </div>

    <!-- Contact Form & Info -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-12 py-16 md:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Envoyez-nous un Message</h2>
                <form class="space-y-6" action="#" method="POST">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">Nom Complet</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition" placeholder="Votre nom">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">Email</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition" placeholder="votre@email.com">
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-900 mb-2">Sujet</label>
                        <input type="text" id="subject" name="subject" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition" placeholder="Objet de votre message">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-900 mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition" placeholder="Votre message..."></textarea>
                    </div>
                    <button type="submit" class="w-full bg-orange-600 text-white py-3 rounded-lg hover:bg-orange-700 transition font-semibold">
                        Envoyer le Message
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="space-y-6 md:space-y-8">
                <!-- Email -->
                <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200">
                    <div class="flex items-start gap-4">
                        <div class="text-3xl md:text-4xl">📧</div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Email</h3>
                            <p class="text-gray-700 font-medium">Thurdasy94@gmail.com</p>
                            <p class="text-sm text-gray-600 mt-2">Réponse garantie en 24h</p>
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200">
                    <div class="flex items-start gap-4">
                        <div class="text-3xl md:text-4xl">📱</div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Téléphone</h3>
                            <p class="text-gray-700 font-medium">+228 90 41 39 39</p>
                            <p class="text-sm text-gray-600 mt-2">Lundi-Vendredi 8h00-17h00</p>
                        </div>
                    </div>
                </div>

                <!-- Location -->
                <div class="bg-white rounded-xl p-6 md:p-8 shadow-sm border border-gray-200">
                    <div class="flex items-start gap-4">
                        <div class="text-3xl md:text-4xl">📍</div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Adresse</h3>
                            <p class="text-gray-700 font-medium">123 Rue SYLVANUS OLYMPIO</p>
                            <p class="text-gray-700">BP 446 Lomé, Togo</p>
                        </div>
                    </div>
                </div>

                <!-- Hours -->
                <div class="bg-blue-50 rounded-xl p-6 md:p-8 border border-blue-200">
                    <h3 class="text-lg font-bold text-blue-900 mb-3">⏰ Horaires</h3>
                    <div class="space-y-2 text-blue-800 text-sm">
                        <p>Lundi - Vendredi: 8h00 - 17h00</p>
                        <p>Samedi: 10h00 - 16h00</p>
                        <p>Dimanche: Fermé</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-12">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-medium">
                ← Retour à l'accueil
            </a>
        </div>
    </div>
</div>
@endsection
