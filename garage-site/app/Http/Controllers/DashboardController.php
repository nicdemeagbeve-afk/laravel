<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Technicien;
use App\Models\Reparation;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVehicules = Vehicule::count();
        $totalTechniciens = Technicien::count();
        $totalReparations = Reparation::count();
        $reparationsEnCours = Reparation::whereNull('date_fin')->count();

        $debutMois = Carbon::now()->startOfMonth();
        $finMois = Carbon::now()->endOfMonth();

        $reparationsTermineesMois = Reparation::whereBetween('date_fin', [$debutMois, $finMois])->count();
        $revenusTotauxMois = Reparation::whereBetween('date_fin', [$debutMois, $finMois])->sum('prix');

        $statsMensuelles = Reparation::select(
            DB::raw('MONTH(date_debut) as mois'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('mois')
        ->orderBy('mois')
        ->get();

        $mois = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'];
        $data = [];
        foreach ($mois as $index => $m) {
            $val = $statsMensuelles->firstWhere('mois', $index + 1);
            $data[] = $val ? $val->total : 0;
        }

        return view('dashboard.index', compact(
            'totalVehicules',
            'totalTechniciens',
            'totalReparations',
            'reparationsEnCours',
            'reparationsTermineesMois',
            'revenusTotauxMois',
            'mois',
            'data'
        ));
    }
}
