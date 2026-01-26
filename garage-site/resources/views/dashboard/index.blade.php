@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-8">Tableau de bord du garage</h1>

<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-6 mb-10">
    <div class="bg-blue-600 text-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">Véhicules</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalVehicules }}</p>
    </div>

    <div class="bg-green-600 text-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">Techniciens</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalTechniciens }}</p>
    </div>

    <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">Réparations totales</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalReparations }}</p>
    </div>

    <div class="bg-red-600 text-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">En cours</h2>
        <p class="text-3xl font-bold mt-2">{{ $reparationsEnCours }}</p>
    </div>

    <div class="bg-purple-600 text-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">Terminées (mois)</h2>
        <p class="text-3xl font-bold mt-2">{{ $reparationsTermineesMois }}</p>
    </div>

    <div class="bg-emerald-600 text-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">Revenus (mois)</h2>
        <p class="text-3xl font-bold mt-2">
            {{ number_format($revenusTotauxMois, 2, ',', ' ') }} F CFA
        </p>
    </div>
</div>

<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4">Réparations par mois</h2>
    <canvas id="chartReparations" height="100"></canvas>
</div>

@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('chartReparations');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($mois),
            datasets: [{
                label: 'Nombre de réparations',
                data: @json($data),
                backgroundColor: 'rgba(37, 99, 235, 0.7)',
                borderRadius: 8
            }]
        },
        options: {
            scales: { y: { beginAtZero: true } },
            plugins: { legend: { display: false } }
        }
    });
</script>
@endpush
