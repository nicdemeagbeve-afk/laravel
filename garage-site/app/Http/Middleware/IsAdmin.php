<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Si l'utilisateur est connecté ET est admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Sinon on bloque
        abort(403, 'Accès réservé aux administrateurs.');
    }
}
