@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Modifier l'utilisateur</h1>
            <p class="text-gray-600 mt-1">{{ $user->name }} ({{ $user->email }})</p>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nom complet</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 @error('name') border-red-500 @enderror"
                        required>
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 @error('email') border-red-500 @enderror"
                        required>
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Nouveau mot de passe</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 @error('password') border-red-500 @enderror"
                        placeholder="Laisser vide pour ne pas changer">
                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600"
                        placeholder="Confirmez le mot de passe">
                </div>

                <!-- Role -->
                <div class="mb-8">
                    <label for="role" class="block text-gray-700 font-semibold mb-2">Rôle</label>
                    <select name="role" id="role"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 @error('role') border-red-500 @enderror"
                        required>
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Utilisateur</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrateur</option>
                    </select>
                    @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex gap-4">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                        ✓ Mettre à jour
                    </button>
                    <a href="{{ route('users.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400 transition font-semibold">
                        ✕ Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
