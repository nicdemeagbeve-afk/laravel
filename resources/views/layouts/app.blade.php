<!DOCTYPE html>
<html>
<head>
    <title>Garage Ma Vie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Footer fixé en bas */
        footer {
            position: fixed;
            bottom: 0;
            width: 85%;
            background: linear-gradient(90deg, #000, #444, #000);
            color: white;
            text-align: center;
            padding: 10px;
            font-weight: white;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.5);
        }

        /* Effet bling bling sur les liens */
        .nav-link {
            color: white !important;
            font-weight: bold;
            transition: 0.3s;
        }
        .nav-link:hover {
            color: gold !important;
            text-shadow: 0 0 10px gold;
        }

        /* Lien actif */
        .nav-link.active {
            background-color: gold !important;
            color: black !important;
            border-radius: 5px;
            text-shadow: none;
        }

        /* Titre bling bling */
        .navbar-brand {
            color: white !important;
            font-weight: white;
            text-shadow: 0 0 10px gold;
        }

        /* Arrière-plan animé avec ca.webp */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/images/ca.webp');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 50%;
            opacity: 0.9; /* transparence */
            z-index: -1;
            animation: zoomLoop 6s ease-in-out infinite;
        }

        @keyframes zoomLoop {
            0%   { transform: scale(1); }
            50%  { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* Animation des icônes qui tombent */
        .falling-icon {
            position: fixed;
            top: -50px;
            font-size: 2rem;
            animation: fall linear forwards;
            z-index: 9999;
            pointer-events: none;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh);
                opacity: 0;
            }
        }
    </style>
</head>
<body class="container mt-4">

    {{-- Barre de navigation --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"> Garage Ma Vie </a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('vehicules.*') ? 'active' : '' }}" 
                           href="{{ route('vehicules.index') }}">
                             Véhicules
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('techniciens.*') ? 'active' : '' }}" 
                           href="{{ route('techniciens.index') }}">
                             Techniciens
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('reparations.*') ? 'active' : '' }}" 
                           href="{{ route('reparations.index') }}">
                             Réparations
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Messages flash et erreurs --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Contenu spécifique à chaque page --}}
    @yield('content')

    {{-- Footer bling bling --}}
    <footer>
         &copy; {{ date('Y') }} Garage Ma Vie - Powered by Passion & Style 
    </footer>

    {{-- Script Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Script pour les icônes qui tombent --}}
    <script>
        function createFallingIcon() {
            const icons = ["🔧", "⚙️"]; // clé anglaise et engrenage
            const icon = document.createElement("div");
            icon.className = "falling-icon";
            icon.textContent = icons[Math.floor(Math.random() * icons.length)];
            icon.style.left = Math.random() * window.innerWidth + "px";
            icon.style.animationDuration = (3 + Math.random() * 3) + "s";
            document.body.appendChild(icon);

            // Supprimer après animation
            icon.addEventListener("animationend", () => {
                icon.remove();
            });
        }

        // Générer régulièrement des icônes
        setInterval(createFallingIcon, 1000);
    </script>
</body>
</html>