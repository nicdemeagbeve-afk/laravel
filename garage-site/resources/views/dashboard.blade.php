<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de Bord') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg shadow-lg p-6 md:p-8 mb-8 text-white">
                <h1 class="text-3xl md:text-4xl font-bold mb-2">
                    Bienvenue, {{ Auth::user()->name }}! 👋
                </h1>
                <p class="text-blue-100 text-lg">
                    Vous êtes connecté à votre tableau de bord de gestion automobile
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Vehicules Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Véhicules</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Vehicule::count() }}</p>
                        </div>
                        <div class="text-4xl">🚗</div>
                    </div>
                    <a href="{{ route('vehicules.index') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-700 font-medium text-sm">
                        Voir tous →
                    </a>
                </div>

                <!-- Réparations Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Réparations</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Reparation::count() }}</p>
                        </div>
                        <div class="text-4xl">🔧</div>
                    </div>
                    <a href="{{ route('reparations.index') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-700 font-medium text-sm">
                        Voir tous →
                    </a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Quick Add -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions Rapides</h3>
                    <div class="space-y-3">
                        <a href="{{ route('vehicules.create') }}" class="flex items-center gap-3 p-3 hover:bg-blue-50 rounded-lg transition duration-200">
                            <span class="text-2xl">🚗</span>
                            <span class="text-gray-700 font-medium">Ajouter un véhicule</span>
                        </a>
                        <a href="{{ route('reparations.create') }}" class="flex items-center gap-3 p-3 hover:bg-blue-50 rounded-lg transition duration-200">
                            <span class="text-2xl">🔧</span>
                            <span class="text-gray-700 font-medium">Ajouter une réparation</span>
                        </a>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">À Propos de Votre Compte</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Email:</span>
                            <span class="text-gray-900 font-medium">{{ Auth::user()->email }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Inscrit depuis:</span>
                            <span class="text-gray-900 font-medium">{{ Auth::user()->created_at->format('d M Y') }}</span>
                        </div>
                        <a href="#" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium text-sm">
                            Modifier le profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
