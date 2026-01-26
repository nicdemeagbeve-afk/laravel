<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Garage Management')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #1C1C1C;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: #FFFFFF;
            border-radius: 0;
            box-shadow: 0 10px 40px rgba(0,0,0,0.5);
            overflow: hidden;
        }

        /* Navigation */
        nav {
            background: #3A3A3A;
            padding: 0;
            border-bottom: 3px solid #C9A227;
            animation: slideDown 0.6s ease-out;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0;
            animation: fadeIn 0.8s ease-out backwards;
        }

        nav ul li:nth-child(1) { animation-delay: 0.1s; }
        nav ul li:nth-child(2) { animation-delay: 0.2s; }
        nav ul li:nth-child(3) { animation-delay: 0.3s; }
        nav ul li:nth-child(4) { animation-delay: 0.4s; }

        nav ul li a {
            display: block;
            padding: 20px 40px;
            color: #FFFFFF;
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
            position: relative;
            overflow: hidden;
        }

        nav ul li a::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(201, 162, 39, 0.3), transparent);
            transition: left 0.5s;
        }

        nav ul li a:hover::before {
            left: 100%;
        }

        nav ul li a:hover {
            background: #1C1C1C;
            color: #C9A227;
        }

        nav ul li a.active {
            background: #1C1C1C;
            color: #C9A227;
            border-bottom: 3px solid #C9A227;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #1C1C1C 0%, #3A3A3A 100%);
            color: #FFFFFF;
            padding: 40px 30px;
            text-align: center;
            border-bottom: 4px solid #C9A227;
            animation: slideDown 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: "⚙️";
            position: absolute;
            font-size: 300px;
            opacity: 0.03;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: rotateGearSlow 40s linear infinite;
        }

        .header h1 {
            font-size: 2.8em;
            margin-bottom: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: fadeInUp 1s ease-out;
            position: relative;
            z-index: 1;
        }

        .header p {
            color: #B0B0B0;
            font-size: 1.1em;
            animation: fadeInUp 1.2s ease-out 0.2s backwards;
            position: relative;
            z-index: 1;
        }

        /* Content */
        .content {
            padding: 40px;
            background: #FFFFFF;
            animation: fadeIn 0.8s ease-out;
        }

        /* Messages */
        .alert {
            padding: 18px 25px;
            margin-bottom: 25px;
            border-radius: 0;
            font-weight: 500;
            border-left: 5px solid;
        }

        .alert-success {
            background: #f0f8f0;
            color: #155724;
            border-left-color: #28a745;
            animation: successPulse 0.6s ease-in-out, fadeInUp 0.5s ease-out;
        }

        .alert-error {
            background: #f8e8e8;
            color: #721c24;
            border-left-color: #dc3545;
            animation: shake 0.5s ease-in-out, fadeInUp 0.5s ease-out;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 14px 28px;
            border: none;
            border-radius: 0;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:active::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: #3A3A3A;
            color: #FFFFFF;
            border: 2px solid #3A3A3A;
        }

        .btn-primary::after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::after {
            left: 100%;
        }

        .btn-primary:hover {
            background: #1C1C1C;
            border-color: #1C1C1C;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(28, 28, 28, 0.4);
        }

        .btn-success {
            background: #C9A227;
            color: #1C1C1C;
            border: 2px solid #C9A227;
        }

        .btn-success::after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.5s;
        }

        .btn-success:hover::after {
            left: 100%;
        }

        .btn-success:hover {
            background: #a88820;
            border-color: #a88820;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(201, 162, 39, 0.5);
        }

        .btn-danger {
            background: #dc3545;
            color: #FFFFFF;
            border: 2px solid #dc3545;
        }

        .btn-danger:hover {
            background: #c82333;
            border-color: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.5);
        }

        .btn-warning {
            background: #FFFFFF;
            color: #3A3A3A;
            border: 2px solid #3A3A3A;
        }

        .btn-warning:hover {
            background: #3A3A3A;
            color: #FFFFFF;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #B0B0B0;
            color: #1C1C1C;
            border: 2px solid #B0B0B0;
        }

        .btn-secondary:hover {
            background: #909090;
            border-color: #909090;
            transform: translateY(-2px);
        }

        /* Search Bar */
        .search-container {
            margin-bottom: 30px;
            display: flex;
            gap: 15px;
            background: #f5f5f5;
            padding: 20px;
            border-left: 4px solid #3A3A3A;
            animation: fadeInUp 0.6s ease-out;
            position: relative;
        }

        .search-container::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #C9A227, #3A3A3A);
            animation: searchPulse 2s infinite;
        }

        .search-container input {
            flex: 1;
            padding: 14px 20px;
            border: 2px solid #B0B0B0;
            border-radius: 0;
            font-size: 16px;
            background: #FFFFFF;
            transition: all 0.3s;
        }

        .search-container input:focus {
            outline: none;
            border-color: #3A3A3A;
            animation: inputGlow 2s infinite;
        }

        .search-container input:not(:placeholder-shown) {
            border-left: 4px solid #C9A227;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #B0B0B0;
        }

        table th,
        table td {
            padding: 18px;
            text-align: left;
            border-bottom: 1px solid #B0B0B0;
        }

        table th {
            background: #3A3A3A;
            font-weight: 700;
            color: #FFFFFF;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 13px;
        }

        table tbody tr {
            background: #FFFFFF;
            transition: all 0.3s;
            position: relative;
            animation: slideInLeft 0.4s ease-out backwards;
        }

        table tbody tr:nth-child(1) { animation-delay: 0.05s; }
        table tbody tr:nth-child(2) { animation-delay: 0.1s; }
        table tbody tr:nth-child(3) { animation-delay: 0.15s; }
        table tbody tr:nth-child(4) { animation-delay: 0.2s; }
        table tbody tr:nth-child(5) { animation-delay: 0.25s; }
        table tbody tr:nth-child(6) { animation-delay: 0.3s; }
        table tbody tr:nth-child(7) { animation-delay: 0.35s; }
        table tbody tr:nth-child(8) { animation-delay: 0.4s; }
        table tbody tr:nth-child(9) { animation-delay: 0.45s; }
        table tbody tr:nth-child(10) { animation-delay: 0.5s; }

        table tbody tr::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, rgba(201, 162, 39, 0.2) 0%, transparent 100%);
            transition: width 0.3s ease;
            z-index: -1;
        }

        table tbody tr:hover::before {
            width: 100%;
        }

        table tbody tr:nth-child(even) {
            background: #f9f9f9;
        }

        table tbody tr:hover {
            background: #f0f0f0;
            border-left: 4px solid #C9A227;
            transform: translateX(3px);
        }

        /* Form */
        .form-group {
            margin-bottom: 25px;
            animation: fadeInUp 0.5s ease-out backwards;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.15s; }
        .form-group:nth-child(3) { animation-delay: 0.2s; }
        .form-group:nth-child(4) { animation-delay: 0.25s; }
        .form-group:nth-child(5) { animation-delay: 0.3s; }
        .form-group:nth-child(6) { animation-delay: 0.35s; }
        .form-group:nth-child(7) { animation-delay: 0.4s; }
        .form-group:nth-child(8) { animation-delay: 0.45s; }
        .form-group:nth-child(9) { animation-delay: 0.5s; }
        .form-group:nth-child(10) { animation-delay: 0.55s; }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #1C1C1C;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #B0B0B0;
            border-radius: 0;
            font-size: 16px;
            font-family: inherit;
            background: #FFFFFF;
            transition: all 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #3A3A3A;
            background: #f9f9f9;
            animation: inputGlow 2s infinite;
            transform: translateY(-2px);
        }

        .form-group input:focus ~ label,
        .form-group select:focus ~ label,
        .form-group textarea:focus ~ label {
            color: #C9A227;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 140px;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #B0B0B0;
            animation: fadeInUp 0.6s ease-out 0.6s backwards;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .pagination a,
        .pagination span {
            padding: 12px 18px;
            border: 2px solid #B0B0B0;
            border-radius: 0;
            text-decoration: none;
            color: #3A3A3A;
            font-weight: 600;
            transition: all 0.3s;
        }

        .pagination a:hover {
            background: #3A3A3A;
            color: #FFFFFF;
            border-color: #3A3A3A;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(58, 58, 58, 0.3);
        }

        .pagination .active span {
            background: #3A3A3A;
            color: #FFFFFF;
            border-color: #3A3A3A;
        }

        .pagination .disabled span {
            color: #B0B0B0;
            border-color: #e0e0e0;
        }

        /* Actions */
        .action-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .action-buttons form {
            margin: 0;
        }

        .action-buttons .btn {
            animation: popIn 0.3s ease-out backwards;
        }

        .action-buttons .btn:nth-child(1) { animation-delay: 0.1s; }
        .action-buttons .btn:nth-child(2) { animation-delay: 0.2s; }
        .action-buttons form:nth-child(3) .btn { animation-delay: 0.3s; }

        /* Card */
        .card {
            background: #FFFFFF;
            border-radius: 0;
            padding: 25px;
            margin-bottom: 25px;
            border: 2px solid #B0B0B0;
            border-left: 5px solid #3A3A3A;
            animation: fadeInUp 0.6s ease-out;
        }

        .card h2 {
            margin-bottom: 20px;
            color: #1C1C1C;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* No results */
        .no-results {
            text-align: center;
            padding: 60px 20px;
            color: #B0B0B0;
            font-size: 18px;
            background: #f5f5f5;
            border: 2px dashed #B0B0B0;
            margin-top: 20px;
            animation: fadeInUp 0.8s ease-out;
        }

        /* Page Title */
        .page-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #3A3A3A;
            animation: fadeInUp 0.6s ease-out;
        }

        .page-title h2 {
            color: #1C1C1C;
            font-size: 2em;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ========================================
           ANIMATIONS GLOBALES
           ======================================== */

        /* Animation d'apparition progressive */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Animation de glissement vers le bas */
        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Animation de glissement depuis la gauche */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Animation d'apparition popup */
        @keyframes popIn {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Animation de tremblement */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        /* Animation de pulsation pour succès */
        @keyframes successPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        /* Animation de lueur pour les inputs */
        @keyframes inputGlow {
            0%, 100% {
                box-shadow: 0 0 5px rgba(201, 162, 39, 0.3);
            }
            50% {
                box-shadow: 0 0 20px rgba(201, 162, 39, 0.6);
            }
        }

        /* Animation de pulsation de la barre de recherche */
        @keyframes searchPulse {
            0%, 100% { width: 4px; }
            50% { width: 8px; }
        }

        /* Animation de rotation lente pour engrenage */
        @keyframes rotateGearSlow {
            from { transform: translate(-50%, -50%) rotate(0deg); }
            to { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Animation des badges */
        .info-badge {
            position: relative;
            overflow: hidden;
        }

        .info-badge::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: badgeShine 3s infinite;
        }

        @keyframes badgeShine {
            0% { left: -100%; }
            50%, 100% { left: 100%; }
        }

        @media (max-width: 768px) {
            .page-title {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            nav ul {
                flex-direction: column;
            }

            .search-container {
                flex-direction: column;
            }

            table {
                font-size: 14px;
            }

            table th,
            table td {
                padding: 12px 8px;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="container">
        <div class="header">
            <h1> GARAGE AUTO</h1>
            <p>Système de gestion automobile</p>
        </div>

        <nav>
            <ul>
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}"> Accueil</a></li>
                <li><a href="{{ route('vehicules.index') }}" class="{{ request()->routeIs('vehicules.*') ? 'active' : '' }}"> Véhicules</a></li>
                <li><a href="{{ route('techniciens.index') }}" class="{{ request()->routeIs('techniciens.*') ? 'active' : '' }}"> Techniciens</a></li>
                <li><a href="{{ route('reparations.index') }}" class="{{ request()->routeIs('reparations.*') ? 'active' : '' }}"> Réparations</a></li>
            </ul>
        </nav>

        <div class="content">
            @if(session('success'))
                <div class="alert alert-success">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    ✗ {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>Erreurs détectées :</strong>
                    <ul style="list-style: none; padding-left: 0; margin-top: 10px;">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    @yield('scripts')
</body>
</html>