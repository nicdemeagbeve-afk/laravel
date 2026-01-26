@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-2">
                👨‍🔧 Détails du Technicien
            </h1>
            <p class="text-gray-600 mt-1">{{ $technicien->nom }} {{ $technicien->prenom }}</p>
        </div>
        <a href="{{ route('techniciens.index') }}" class="px-4 py-2 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 transition font-medium">
            ← Retour
        </a>
    </div>

    <!-- Content Card -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 md:p-8">
            <!-- Left: Image -->
            <div class="md:col-span-1">
                @if($technicien->photo)
                    <img src="/storage/{{ $technicien->photo }}" alt="{{ $technicien->nom }}" class="w-full h-64 object-cover rounded-lg">
                @else
                    <div class="w-full h-64 bg-gray-100 rounded-lg flex items-center justify-center text-6xl">
                        👨‍🔧
                    </div>
                @endif
                <div class="mt-4 flex gap-2">
                    <a href="{{ route('techniciens.edit', $technicien) }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-medium">
                        ✏️ Modifier
                    </a>
                    <form action="{{ route('techniciens.destroy', $technicien) }}" method="POST" class="flex-1" onsubmit="return confirm('Êtes-vous sûr ?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">
                            🗑️ Supprimer
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
                            <p class="text-sm text-gray-600 font-medium">Nom</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">{{ $technicien->nom }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-600 font-medium">Prénom</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">{{ $technicien->prenom }}</p>
                        </div>
                    </div>

                    <!-- Spécialité -->
                    <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                        <p class="text-sm text-gray-600 font-medium mb-2">Spécialité</p>
                        <p class="text-lg font-bold text-green-700">{{ $technicien->specialite ?? 'Non spécifiée' }}</p>
                    </div>

                    <!-- Stats -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="font-semibold text-gray-900 mb-4">Statistiques</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center p-3 bg-blue-50 rounded-lg">
                                <p class="text-gray-600 text-sm">Réparations Totales</p>
                                <p class="text-2xl font-bold text-blue-600 mt-1">{{ $technicien->reparations_count ?? 0 }}</p>
                            </div>
                            <div class="text-center p-3 bg-purple-50 rounded-lg">
                                <p class="text-gray-600 text-sm">En Cours</p>
                                <p class="text-2xl font-bold text-purple-600 mt-1">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
