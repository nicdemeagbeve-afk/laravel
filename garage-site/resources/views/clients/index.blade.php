@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-2">
                👥 Clients
            </h1>
            <p class="text-gray-600 mt-1">Gérez tous vos clients et leurs informations</p>
        </div>
        <a href="{{ route('clients.create') }}" class="mt-4 sm:mt-0 inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-medium shadow-sm">
            <span class="text-xl mr-2">+</span> Ajouter un client
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
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Nom</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 hidden sm:table-cell">Prénom</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 hidden md:table-cell">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 hidden lg:table-cell">Téléphone</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($clients as $c)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4">
                            <div>
                                <p class="font-semibold text-gray-900">{{ $c->nom }}</p>
                                <p class="text-sm text-gray-600 sm:hidden">{{ $c->prenom }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 hidden sm:table-cell text-gray-700">{{ $c->prenom }}</td>
                        <td class="px-6 py-4 hidden md:table-cell text-gray-700">{{ $c->email }}</td>
                        <td class="px-6 py-4 hidden lg:table-cell">
                            <span class="text-gray-700">{{ $c->telephone ?? '-' }}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('clients.edit', $c) }}" class="inline-flex items-center px-3 py-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition duration-200 font-medium text-sm" title="Modifier">
                                    Modifier
                                </a>
                                <form action="{{ route('clients.destroy', $c) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">
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
                                <p class="text-3xl">👥</p>
                                <p class="text-gray-600 font-medium">Aucun client enregistré</p>
                                <p class="text-gray-500 text-sm">Commencez par ajouter un nouveau client</p>
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
