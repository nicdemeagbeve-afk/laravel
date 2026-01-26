@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-2 mb-2">
            Modifier le véhicule
        </h1>
        <p class="text-gray-600">Mettez à jour les informations du véhicule</p>
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
        <form action="{{ route('vehicules.update', $vehicule) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Row 1: Immatriculation & Marque -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="immatriculation" class="block text-sm font-semibold text-gray-900 mb-2">
                            Immatriculation
                        </label>
                        <input 
                            type="text" 
                            id="immatriculation"
                            name="immatriculation" 
                            value="{{ old('immatriculation', $vehicule->immatriculation) }}"
                            placeholder="Ex: AB-123-CD"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            required
                        >
                        @error('immatriculation')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="marque" class="block text-sm font-semibold text-gray-900 mb-2">
                            Marque
                        </label>
                        <input 
                            type="text" 
                            id="marque"
                            name="marque" 
                            value="{{ old('marque', $vehicule->marque) }}"
                            placeholder="Ex: Peugeot"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            required
                        >
                        @error('marque')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Row 2: Modèle & Année -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="modele" class="block text-sm font-semibold text-gray-900 mb-2">
                            Modèle
                        </label>
                        <input 
                            type="text" 
                            id="modele"
                            name="modele" 
                            value="{{ old('modele', $vehicule->modele) }}"
                            placeholder="Ex: 308"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            required
                        >
                        @error('modele')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="annee" class="block text-sm font-semibold text-gray-900 mb-2">
                            Année
                        </label>
                        <input 
                            type="number" 
                            id="annee"
                            name="annee" 
                            value="{{ old('annee', $vehicule->annee) }}"
                            placeholder="Ex: 2023"
                            min="1900"
                            max="{{ date('Y') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        >
                        @error('annee')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Row 3: Couleur & Carrosserie -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="couleur" class="block text-sm font-semibold text-gray-900 mb-2">
                            Couleur
                        </label>
                        <input 
                            type="text" 
                            id="couleur"
                            name="couleur" 
                            value="{{ old('couleur', $vehicule->couleur) }}"
                            placeholder="Ex: Noir"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        >
                        @error('couleur')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="carrosserie" class="block text-sm font-semibold text-gray-900 mb-2">
                            Carrosserie
                        </label>
                        <select 
                            id="carrosserie"
                            name="carrosserie"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        >
                            <option value="">-- Sélectionner --</option>
                            <option value="Berline" {{ old('carrosserie', $vehicule->carrosserie) === 'Berline' ? 'selected' : '' }}>Berline</option>
                            <option value="SUV" {{ old('carrosserie', $vehicule->carrosserie) === 'SUV' ? 'selected' : '' }}>SUV</option>
                            <option value="Monospace" {{ old('carrosserie', $vehicule->carrosserie) === 'Monospace' ? 'selected' : '' }}>Monospace</option>
                            <option value="Coupé" {{ old('carrosserie', $vehicule->carrosserie) === 'Coupé' ? 'selected' : '' }}>Coupé</option>
                            <option value="Cabriolet" {{ old('carrosserie', $vehicule->carrosserie) === 'Cabriolet' ? 'selected' : '' }}>Cabriolet</option>
                            <option value="Camping-car" {{ old('carrosserie', $vehicule->carrosserie) === 'Camping-car' ? 'selected' : '' }}>Camping-car</option>
                        </select>
                        @error('carrosserie')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Row 4: Kilométrage & Boîte de Vitesses -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="kilometrage" class="block text-sm font-semibold text-gray-900 mb-2">
                            Kilométrage
                        </label>
                        <input 
                            type="number" 
                            id="kilometrage"
                            name="kilometrage" 
                            value="{{ old('kilometrage', $vehicule->kilometrage) }}"
                            placeholder="Ex: 15000"
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        >
                        @error('kilometrage')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="boite" class="block text-sm font-semibold text-gray-900 mb-2">
                            Boîte de Vitesses
                        </label>
                        <select 
                            id="boite"
                            name="boite"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        >
                            <option value="">-- Sélectionner --</option>
                            <option value="Manuelle" {{ old('boite', $vehicule->boite) === 'Manuelle' ? 'selected' : '' }}>Manuelle</option>
                            <option value="Automatique" {{ old('boite', $vehicule->boite) === 'Automatique' ? 'selected' : '' }}>Automatique</option>
                            <option value="CVT" {{ old('boite', $vehicule->boite) === 'CVT' ? 'selected' : '' }}>CVT</option>
                        </select>
                        @error('boite')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Row 5: Énergie -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="energie" class="block text-sm font-semibold text-gray-900 mb-2">
                            Énergie
                        </label>
                        <select 
                            id="energie"
                            name="energie"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        >
                            <option value="">-- Sélectionner --</option>
                            <option value="Essence" {{ old('energie', $vehicule->energie) === 'Essence' ? 'selected' : '' }}>Essence</option>
                            <option value="Diesel" {{ old('energie', $vehicule->energie) === 'Diesel' ? 'selected' : '' }}>Diesel</option>
                            <option value="Électrique" {{ old('energie', $vehicule->energie) === 'Électrique' ? 'selected' : '' }}>Électrique</option>
                            <option value="Hybride" {{ old('energie', $vehicule->energie) === 'Hybride' ? 'selected' : '' }}>Hybride</option>
                        </select>
                    </div>
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
                        href="{{ route('vehicules.index') }}" 
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
