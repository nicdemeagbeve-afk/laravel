<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gérer votre Profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Information Personnelle -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-3xl">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-900">📋 Informations Personnelles</h3>
                        <p class="text-gray-600 mt-1">Modifiez votre nom et votre email</p>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Modifier le Mot de Passe -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-3xl">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-900">🔐 Modifier le Mot de Passe</h3>
                        <p class="text-gray-600 mt-1">Mettez à jour votre mot de passe pour sécuriser votre compte</p>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Supprimer le Compte -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-l-4 border-red-500">
                <div class="max-w-3xl">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-red-600">Zone Dangereuse</h3>
                        <p class="text-gray-600 mt-1">Supprimer définitivement votre compte et toutes vos données</p>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
