<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Garage') }} | Management System</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Animation du fond d'écran */
        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animated-bg {
            background: linear-gradient(-45deg, #0f172a, #1e3a8a, #312e81, #1e1b4b);
            background-size: 400% 400%;
            animation: gradientFlow 15s ease infinite;
        }

        /* Effet de verre (Glassmorphism) */
        .glass-nav {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Effet de brillance sur les liens */
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0%;
            height: 2px;
            background: linear-gradient(90deg, #38bdf8, #818cf8);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link:hover {
            color: #38bdf8;
            text-shadow: 0 0 10px rgba(56, 189, 248, 0.5);
        }

        /* Animation d'entrée */
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="animated-bg min-h-screen text-slate-200">

    <nav class="glass-nav sticky top-0 z-50 py-4 mb-10">
        <div class="container mx-auto px-6 flex justify-between items-center">
            
            <a href="{{ url('/') }}" class="flex items-center space-x-2 group">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-lg flex items-center justify-center shadow-lg shadow-blue-500/20 group-hover:scale-110 transition-transform">
                    <span class="text-white font-black text-xl">G</span>
                </div>
                <h1 class="text-2xl font-extrabold tracking-tighter">
                    GARAGE <span class="text-blue-400 italic">NUMERIQUE</span>
                </h1>
            </a>

            <ul class="hidden md:flex space-x-10 text-sm font-semibold uppercase tracking-widest">
                <li>
                    <a href="{{ route('vehicules.index') }}" class="nav-link {{ request()->routeIs('vehicules.*') ? 'text-blue-400' : '' }}">Véhicules</a>
                </li>
                <li>
                    <a href="{{ route('techniciens.index') }}" class="nav-link {{ request()->routeIs('techniciens.*') ? 'text-blue-400' : '' }}">Techniciens</a>
                </li>
                <li>
                    <a href="{{ route('reparations.index') }}" class="nav-link {{ request()->routeIs('reparations.*') ? 'text-blue-400' : '' }}">Réparations</a>
                </li>
            </ul>

            <div class="hidden md:block">
                <a href="{{ url('/') }}" class="inline-block bg-blue-600 hover:bg-blue-500 text-white px-6 py-2.5 rounded-full text-xs font-bold transition-all hover:scale-105 active:scale-95 shadow-lg shadow-blue-600/30 uppercase tracking-wider">
                    System Dashboard
                </a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6">
        
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/50 text-emerald-400 flex items-center shadow-[0_0_15px_rgba(16,185,129,0.1)] animate-fadeIn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="font-bold text-sm">{{ session('success') }}</span>
            </div>
        @endif

        <div class="animate-fadeIn">
            @yield('content')
        </div>
    </main>

    <footer class="mt-20 py-10 text-center text-slate-500 text-sm border-t border-white/5">
        <p class="font-medium">
            &copy; {{ date('Y') }} <span class="text-slate-400">Garage Management System</span> • Opérations Digitalisées
        </p>
    </footer>

</body>
</html>