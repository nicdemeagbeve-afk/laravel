<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// Page d’accueil
Route::get('/', [HomeController::class, 'index'])->name('home');
// Pages publiques statiques
Route::view('/features', 'pages.features')->name('features');
Route::view('/pricing', 'pages.pricing')->name('pricing');
Route::view('/security', 'pages.security')->name('security');
Route::view('/documentation', 'pages.documentation')->name('documentation');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/legal', 'pages.legal')->name('legal');
// ✅ Routes d’authentification
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors(['email' => 'Les identifiants sont incorrects.'])->onlyInput('email');
})->middleware('guest');

Route::get('/register', function () {
    return view('auth.register');
})->name('register')->middleware('guest');

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user', // 👈 par défaut utilisateur normal
    ]);

    Auth::login($user);
    return redirect('/dashboard')->with('success', 'Inscription réussie !');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/')->with('success', 'Déconnexion réussie !');
})->middleware('auth')->name('logout');

// ✅ Dashboard accessible à tous les utilisateurs connectés
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Modules standards
    Route::resource('vehicules', VehiculeController::class);
    Route::resource('techniciens', TechnicienController::class);
    Route::resource('reparations', ReparationController::class);
    Route::resource('clients', ClientController::class);
});

// ✅ Routes uniquement pour les administrateurs
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('users', UserController::class);
});
