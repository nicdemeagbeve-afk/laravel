<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoGo - Garage</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f8fafc;
            --card: #ffffff;
            --text: #1e293b;
            --muted: #64748b;
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --dark: #0f172a;
        }
        
        [data-theme="dark"] {
            --bg: #0f172a;
            --card: #1e293b;
            --text: #f1f5f9;
            --muted: #cbd5e1;
            --primary: #3b82f6;
            --primary-dark: #1e40af;
            --dark: #ffffff;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="header">
    <div class="container header-content">
        <div class="brand">
            <img src="{{ asset('images/logo2.png') }}" alt="AutoGo Logo" class="logo">
        </div>

        <nav class="nav">
            <a href="/">Accueil</a>
            <a href="/vehicules">Véhicules</a>
            <a href="/techniciens">Techniciens</a>
            <a href="/reparations">Réparations</a>
        </nav>
    </div>
</header>

<main class="main">

@if(session('success'))
    <div style="background:#d4edda; padding:10px; margin-bottom:15px;">
        {{ session('success') }}
    </div>
@endif

    @yield('content')
</main>

<footer class="footer">
    © 2026 AutoGo
</footer>

</body>
</html>
