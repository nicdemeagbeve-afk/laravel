@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-2">
                🔧 Détails de la Réparation
            </h1>
            <p class="text-gray-600 mt-1">ID: #{{ $reparation->id }}</p>
        </div>
        <a href="{{ route('reparations.index') }}" class="px-4 py-2 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 transition font-medium">
            ← Retour
        </a>
    </div>

    <!-- Content Card -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6 md:p-8">
            <!-- Grid Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Véhicule -->
                <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                    <p class="text-sm text-gray-600 font-medium mb-2">Véhicule</p>
                    <p class="text-lg font-bold text-blue-900">{{ $reparation->vehicule->immatriculation ?? '-' }}</p>
                    <p class="text-sm text-blue-700 mt-1">{{ $reparation->vehicule->marque ?? '' }} {{ $reparation->vehicule->modele ?? '' }}</p>
                </div>

                <!-- Technicien -->
                <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                    <p class="text-sm text-gray-600 font-medium mb-2">Technicien Assigné</p>
                    <p class="text-lg font-bold text-green-900">{{ $reparation->technicien->nom ?? '-' }} {{ $reparation->technicien->prenom ?? '' }}</p>
                    <p class="text-sm text-green-700 mt-1">{{ $reparation->technicien->specialite ?? 'Généraliste' }}</p>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
                <p class="text-sm text-gray-600 font-medium mb-2">Description du Travail</p>
                <p class="text-gray-900 leading-relaxed">{{ $reparation->description }}</p>
            </div>

            <!-- Details Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <p class="text-sm text-gray-600 font-medium">Prix</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ number_format($reparation->prix ?? 0, 2) }}</p>
                    <p class="text-xs text-gray-500 mt-1">F CFA</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <p class="text-sm text-gray-600 font-medium">Date de Début</p>
                    <p class="text-lg font-bold text-gray-900 mt-1">{{ $reparation->date_debut ?? '-' }}</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <p class="text-sm text-gray-600 font-medium">Date de Fin</p>
                    @if($reparation->date_fin)
                        <p class="text-lg font-bold text-green-600 mt-1">{{ $reparation->date_fin }}</p>
                        <span class="inline-block px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium mt-2">✓ Terminée</span>
                    @else
                        <p class="text-lg font-bold text-yellow-600 mt-1">-</p>
                        <span class="inline-block px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs font-medium mt-2">En Cours</span>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-2">
                <a href="{{ route('reparations.edit', $reparation) }}" class="flex-1 inline-flex items-center justify-center px-4 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-medium">
                     Modifier
                </a>
                <form action="{{ route('reparations.destroy', $reparation) }}" method="POST" class="flex-1" onsubmit="return confirm('Êtes-vous sûr ?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full px-4 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">
                         Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
