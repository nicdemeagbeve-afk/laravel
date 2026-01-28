<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Importation nécessaire pour gérer les URLs

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Force le schéma HTTPS pour toutes les URLs générées par l'application
         * uniquement lorsque l'on est sur le serveur de production.
         */
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}