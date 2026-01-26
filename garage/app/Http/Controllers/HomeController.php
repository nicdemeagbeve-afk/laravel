<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Technicien;
use App\Models\Reparation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'total_vehicules' => Vehicule::count(),
            'total_techniciens' => Technicien::count(),
            'total_reparations' => Reparation::count(),
            'reparations_ce_mois' => Reparation::whereMonth('date', date('m'))
                                              ->whereYear('date', date('Y'))
                                              ->count(),
        ];

        $dernieres_reparations = Reparation::with(['vehicule', 'technicien'])
                                          ->latest('date')
                                          ->limit(5)
                                          ->get();

        $derniers_vehicules = Vehicule::latest()
                                     ->limit(6)
                                     ->get();

        return view('home', compact('stats', 'dernieres_reparations', 'derniers_vehicules'));
    }
}