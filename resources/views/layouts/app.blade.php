<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AutoGo - Garage</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
