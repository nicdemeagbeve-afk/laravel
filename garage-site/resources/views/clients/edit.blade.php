@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-2 mb-2">
            👥 Modifier le client
        </h1>
        <p class="text-gray-600">Mettez à jour les informations du client</p>
    </div>

    <!-- Error Messages -->
    @if($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
        <p class="font-medium text-red-800 mb-3">Erreurs détectées:</p>
        <ul class="space-y-2">
            @foreach($errors->all() as $error)
                <li class="flex items-start gap-2 text-red-700">
                    <span class="text-lg mt-0.5">!</span>
                    <span>{{ $error }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 md:p-8">
        <form action="{{ route('clients.update', $client) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Row 1: Nom & Prénom -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nom" class="block text-sm font-semibold text-gray-900 mb-2">
                            Nom
                        </label>
                        <input 
                            type="text" 
                            id="nom"
                            name="nom" 
                            value="{{ old('nom', $client->nom) }}"
                            placeholder="Dupont"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            required
                        >
                        @error('nom')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="prenom" class="block text-sm font-semibold text-gray-900 mb-2">
                            Prénom
                        </label>
                        <input 
                            type="text" 
                            id="prenom"
                            name="prenom" 
                            value="{{ old('prenom', $client->prenom) }}"
                            placeholder="Jean"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            required
                        >
                        @error('prenom')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Row 2: Email & Téléphone -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">
                            Email
                        </label>
                        <input 
                            type="email" 
                            id="email"
                            name="email" 
                            value="{{ old('email', $client->email) }}"
                            placeholder="emmanuel@example.com"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            required
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="telephone" class="block text-sm font-semibold text-gray-900 mb-2">
                            Téléphone
                        </label>
                        <input 
                            type="tel" 
                            id="telephone"
                            name="telephone" 
                            value="{{ old('telephone', $client->telephone) }}"
                            placeholder="+228 90 41 39 39"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        >
                    </div>
                </div>

                <!-- Address -->
                <div>
                    <label for="adresse" class="block text-sm font-semibold text-gray-900 mb-2">
                        Adresse
                    </label>
                    <textarea 
                        id="adresse"
                        name="adresse" 
                        rows="3"
                        placeholder="123 Rue SYVANUS OLYMPIO, BP 446 Lomé"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                    >{{ old('adresse', $client->adresse) }}</textarea>
                </div>

                <!-- Submit Buttons -->
                <div class="flex gap-4 pt-6">
                    <button 
                        type="submit" 
                        class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-semibold shadow-sm"
                    >
                        Mettre à jour
                    </button>
                    <a 
                        href="{{ route('clients.index') }}" 
                        class="flex-1 px-6 py-3 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 transition duration-200 font-semibold text-center"
                    >
                        Annuler
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
