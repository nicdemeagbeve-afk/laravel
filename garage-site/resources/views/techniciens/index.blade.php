@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-2">
                Techniciens
            </h1>
            <p class="text-gray-600 mt-1">Gérez votre équipe de techniciens</p>
        </div>
        <a href="{{ route('techniciens.create') }}" class="mt-4 sm:mt-0 inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-medium shadow-sm">
            <span class="text-xl mr-2">+</span> Ajouter un technicien
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
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Photo</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Nom</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 hidden sm:table-cell">Prénom</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 hidden md:table-cell">Spécialité</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($techniciens as $t)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4">
                            @if($t->photo)
                                <img src="/storage/{{ $t->photo }}" alt="{{ $t->prenom }} {{ $t->nom }}" class="w-10 h-10 rounded-full object-cover">
                            @else
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-lg">👤</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $t->nom }}</td>
                        <td class="px-6 py-4 hidden sm:table-cell text-gray-700">{{ $t->prenom }}</td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            <span class="inline-block px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">
                                {{ $t->specialite ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('techniciens.show', $t) }}" class="inline-flex items-center px-3 py-2 text-blue-600 hover:bg-blue-50 rounded-lg transition duration-200 font-medium text-sm" title="Voir">
                                    Voir
                                </a>
                                <a href="{{ route('techniciens.edit', $t) }}" class="inline-flex items-center px-3 py-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition duration-200 font-medium text-sm" title="Modifier">
                                    Modifier
                                </a>
                                <form action="{{ route('techniciens.destroy', $t) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce technicien ?');">
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
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center gap-2">

                                <p class="text-gray-600 font-medium">Aucun technicien enregistré</p>
                                <p class="text-gray-500 text-sm">Commencez par ajouter un nouveau technicien</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
