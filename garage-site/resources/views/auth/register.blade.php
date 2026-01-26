@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-2xl">
        <!-- Main Container -->
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
                <!-- Left Side - Info -->
                <div class="hidden md:flex flex-col justify-center items-center bg-gradient-to-br from-green-600 to-green-800 text-white p-12 text-center">
                    <div class="text-6xl mb-6">📝</div>
                    <h3 class="text-3xl font-bold mb-4">Rejoignez-nous</h3>
                    <p class="text-green-100 text-lg mb-8">
                        Créez votre compte et commencez à gérer votre garage dès aujourd'hui
                    </p>
                    <div class="space-y-4 text-sm text-green-100">
                        <div>✓ Inscription gratuite</div>
                        <div>✓ Accès complet immédiat</div>
                        <div>✓ Pas de carte bancaire</div>
                    </div>
                </div>

                <!-- Right Side - Form -->
                <div class="p-12">
                    <h2 class="text-4xl font-bold text-gray-900 mb-2 text-center">S'inscrire</h2>
                    <p class="text-gray-600 text-center mb-8">Créez votre compte en quelques minutes</p>

                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-6 py-4 rounded-lg mb-8">
                            <h3 class="font-semibold mb-2">Erreur lors de l'inscription</h3>
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-gray-700 font-semibold mb-3">
                                👤 Nom complet
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-green-600 transition text-lg" 
                                placeholder="Emmanuel Yaovi ASSOGBA"
                                required autofocus>
                            @error('name')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-gray-700 font-semibold mb-3">
                                📧 Adresse Email
                            </label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" 
                                class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-green-600 transition text-lg" 
                                placeholder="vous@example.com"
                                required>
                            @error('email')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-gray-700 font-semibold mb-3">
                                🔑 Mot de passe
                            </label>
                            <input type="password" name="password" id="password" 
                                class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-green-600 transition text-lg" 
                                placeholder="Minimum 6 caractères"
                                required>
                            @error('password')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Confirmation -->
                        <div>
                            <label for="password_confirmation" class="block text-gray-700 font-semibold mb-3">
                                ✓ Confirmer le mot de passe
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-green-600 transition text-lg" 
                                placeholder="Confirmez votre mot de passe"
                                required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition font-bold text-lg shadow-lg hover:shadow-xl mt-8">
                            Créer mon compte
                        </button>

                        <!-- Divider -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Déjà inscrit ?</span>
                            </div>
                        </div>

                        <!-- Login Link -->
                        <a href="{{ route('login') }}" class="w-full block text-center bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-bold text-lg">
                            Se connecter
                        </a>
                    </form>

                    <!-- Back Link -->
                    <div class="text-center mt-8">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 font-medium inline-flex items-center gap-2">
                            ← Retour à l'accueil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
