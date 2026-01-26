@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-2">
                Détails du Véhicule
            </h1>
            <p class="text-gray-600 mt-1">{{ $vehicule->immatriculation }}</p>
        </div>
        <a href="{{ route('vehicules.index') }}" class="px-4 py-2 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 transition font-medium">
            ← Retour
        </a>
    </div>

    <!-- Content Card -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 md:p-8">
            <!-- Left: Image -->
            <div class="md:col-span-1">
                @if($vehicule->photo)
                    <img src="/storage/{{ $vehicule->photo }}" alt="{{ $vehicule->immatriculation }}" class="w-full h-64 object-cover rounded-lg">
                @else
                    <div class="w-full h-64 bg-gray-100 rounded-lg flex items-center justify-center text-6xl">
                        🚗
                    </div>
                @endif
                <div class="mt-4 flex gap-2">
                    <a href="{{ route('vehicules.edit', $vehicule) }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-medium">
                        Modifier
                    </a>
                    <form action="{{ route('vehicules.destroy', $vehicule) }}" method="POST" class="flex-1" onsubmit="return confirm('Êtes-vous sûr ?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right: Details -->
            <div class="md:col-span-2">
                <div class="space-y-6">
                    <!-- Info Grid -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-600 font-medium">Immatriculation</p>
                            <p class="text-2xl font-bold text-blue-600 mt-1">{{ $vehicule->immatriculation }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-600 font-medium">Marque</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">{{ $vehicule->marque }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-600 font-medium">Modèle</p>
                            <p class="text-lg font-bold text-gray-900 mt-1">{{ $vehicule->modele }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-600 font-medium">Énergie</p>
                            <p class="text-lg font-bold text-gray-900 mt-1">{{ $vehicule->energie ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div class="space-y-4 border-t border-gray-200 pt-6">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 font-medium">Couleur:</span>
                            <span class="text-gray-900">{{ $vehicule->couleur ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 font-medium">Année:</span>
                            <span class="text-gray-900">{{ $vehicule->annee ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 font-medium">Kilométrage:</span>
                            <span class="text-gray-900">{{ $vehicule->kilometrage ?? '-' }} km</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 font-medium">Carrosserie:</span>
                            <span class="text-gray-900">{{ $vehicule->carrosserie ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 font-medium">Boîte de Vitesses:</span>
                            <span class="text-gray-900">{{ $vehicule->boite ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
