@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Gestion des Utilisateurs</h1>
                <p class="text-gray-600 mt-1">Gérez les utilisateurs et les rôles</p>
            </div>
            <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition shadow-lg font-semibold">
                + Ajouter un utilisateur
            </a>
        </div>

        <!-- Messages -->
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
        @endif

        <!-- Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nom</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Rôle</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Créé le</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="border-t border-gray-200 hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $user->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-center space-x-2">
                            <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:text-blue-800 font-semibold inline-block">
                                Modifier
                            </a>
                            @if(auth()->id() !== $user->id)
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" class="text-red-600 hover:text-red-800 font-semibold">
                                    🗑️ Supprimer
                                </button>
                            </form>
                            @else
                            <span class="text-gray-400 text-xs">(Vous)</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            Aucun utilisateur trouvé.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Total Utilisateurs</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $users->count() }}</p>
                    </div>
                    <div class="text-4xl">👥</div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Administrateurs</p>
                        <p class="text-3xl font-bold text-red-600">{{ $users->where('role', 'admin')->count() }}</p>
                    </div>
                    <div class="text-4xl">⚙️</div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Utilisateurs</p>
                        <p class="text-3xl font-bold text-green-600">{{ $users->where('role', 'user')->count() }}</p>
                    </div>
                    <div class="text-4xl">👤</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
