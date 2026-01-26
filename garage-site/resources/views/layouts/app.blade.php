<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage App</title>
    <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect fill='%232563eb' width='100' height='100' rx='10'/><text x='50' y='65' font-size='60' font-weight='bold' fill='white' text-anchor='middle' dominant-baseline='middle'>G</text></svg>">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
</head>
<body class="bg-gray-50 font-sans antialiased">

    <!-- Navigation Bar -->
    <nav class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg flex items-center justify-center text-white font-bold text-lg">
                        G
                    </div>
                    <span class="font-bold text-lg text-gray-900 hidden sm:inline">GARAGE</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('vehicules.index') }}" class="text-gray-700 hover:text-blue-600 font-medium transition duration-200 flex items-center gap-1">
                        Véhicules
                    </a>
                    <a href="{{ route('techniciens.index') }}" class="text-gray-700 hover:text-blue-600 font-medium transition duration-200 flex items-center gap-1">
                        Techniciens
                    </a>
                    <a href="{{ route('reparations.index') }}" class="text-gray-700 hover:text-blue-600 font-medium transition duration-200 flex items-center gap-1">
                        Réparations
                    </a>
                </div>

                <!-- User Area -->
                <div class="flex items-center gap-4">
                    @if(auth()->check())
                        <div class="flex items-center gap-3">
                            <div class="hidden sm:flex flex-col items-end">
                                <span class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</span>
                                <span class="text-xs text-gray-500">{{ auth()->user()->email }}</span>
                            </div>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition duration-200 font-medium text-sm">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium">Se connecter</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">S'inscrire</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (optional) -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-gray-200">
        <div class="px-4 pt-2 pb-3 space-y-1">
            <a href="{{ route('vehicules.index') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-lg">Véhicules</a>
            <a href="{{ route('techniciens.index') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-lg">Techniciens</a>
            <a href="{{ route('reparations.index') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-lg">Réparations</a>
        </div>
    </div>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-white font-bold mb-4 flex items-center gap-2">
                        <span class="text-xl">GARAGE</span>
                    </h3>
                    <p class="text-sm">La meilleure solution pour gérer votre garage en ligne.</p>
                </div>
                <div>
                    <h3 class="text-white font-bold mb-4">Navigation</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('vehicules.index') }}" class="hover:text-white transition">Véhicules</a></li>
                        <li><a href="{{ route('techniciens.index') }}" class="hover:text-white transition">Techniciens</a></li>
                        <li><a href="{{ route('reparations.index') }}" class="hover:text-white transition">Réparations</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-bold mb-4">Support</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('documentation') }}" class="hover:text-white transition">Documentation</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a></li>
                        <li><a href="{{ route('faq') }}" class="hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-bold mb-4">Légal</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('privacy') }}" class="hover:text-white transition">Confidentialité</a></li>
                        <li><a href="{{ route('terms') }}" class="hover:text-white transition">Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-sm">
                <p>&copy; {{ date('Y') }} GARAGE-WEBSITE. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

</body>
</html>
