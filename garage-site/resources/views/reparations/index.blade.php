@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-2">
                Réparations
            </h1>
            <p class="text-gray-600 mt-1">Suivez toutes les réparations en cours et terminées</p>
        </div>
        <a href="{{ route('reparations.create') }}" class="mt-4 sm:mt-0 inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-medium shadow-sm">
            <span class="text-xl mr-2">+</span> Ajouter une réparation
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg flex items-start gap-3">
        <div>
            <p class="font-medium text-green-800">Succès</p>
            <p class="text-green-700">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    <!-- Table Responsive -->
    <div class="overflow-x-auto">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Immatriculation</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Véhicule</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 hidden sm:table-cell">Technicien</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 hidden md:table-cell">Description</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 hidden lg:table-cell">Prix</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($reparations as $r)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4">
                            <p class="font-semibold text-gray-900">{{ $r->vehicule->immatriculation ?? '-' }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <div>
                                <p class="text-sm text-gray-600">{{ $r->vehicule->marque ?? '' }} {{ $r->vehicule->modele ?? '' }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 hidden sm:table-cell text-gray-700">{{ $r->technicien->prenom ?? '-' }} {{ $r->technicien->nom ?? '' }}</td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            <p class="text-gray-700 truncate text-sm">{{ $r->description }}</p>
                        </td>
                        <td class="px-6 py-4 hidden lg:table-cell text-gray-700">{{ $r->prix ? $r->prix . ' F CFA' : '-' }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('reparations.show', $r) }}" class="inline-flex items-center px-3 py-2 text-blue-600 hover:bg-blue-50 rounded-lg transition duration-200 font-medium text-sm" title="Voir">
                                    Voir
                                </a>
                                <a href="{{ route('reparations.edit', $r) }}" class="inline-flex items-center px-3 py-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition duration-200 font-medium text-sm" title="Modifier">
                                    Modifier
                                </a>
                                <form action="{{ route('reparations.destroy', $r) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réparation ?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg transition duration-200 font-medium text-sm" title="Supprimer">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center gap-2">
                                <p class="text-gray-600 font-medium">Aucune réparation enregistrée</p>
                                <p class="text-gray-500 text-sm">Commencez par ajouter une nouvelle réparation</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($reparations->hasPages())
    <div class="mt-6">
        {{ $reparations->links() }}
    </div>
    @endif
</div>
@endsection
