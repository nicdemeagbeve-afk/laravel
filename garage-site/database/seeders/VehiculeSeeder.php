<?php

namespace Database\Seeders;

use App\Models\Vehicule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicules = [
            [
                'immatriculation' => 'TG-123-ABC',
                'marque' => 'Toyota',
                'modele' => 'Corolla',
                'couleur' => 'Blanc',
                'annee' => 2022,
                'kilometrage' => 15000,
                'carrosserie' => 'Berline',
                'energie' => 'Essence',
                'boite' => 'Automatique',
                'photo' => 'vehicles/toyota-corolla.svg'
            ],
            [
                'immatriculation' => 'TG-456-DEF',
                'marque' => 'Honda',
                'modele' => 'Civic',
                'couleur' => 'Noir',
                'annee' => 2021,
                'kilometrage' => 28000,
                'carrosserie' => 'Berline',
                'energie' => 'Essence',
                'boite' => 'Manuelle',
                'photo' => 'vehicles/honda-civic.svg'
            ],
            [
                'immatriculation' => 'TG-789-GHI',
                'marque' => 'Volkswagen',
                'modele' => 'Golf',
                'couleur' => 'Gris',
                'annee' => 2020,
                'kilometrage' => 45000,
                'carrosserie' => 'Hatchback',
                'energie' => 'Diesel',
                'boite' => 'Manuelle',
                'photo' => 'vehicles/vw-golf.svg'
            ],
            [
                'immatriculation' => 'TG-234-JKL',
                'marque' => 'Peugeot',
                'modele' => '208',
                'couleur' => 'Rouge',
                'annee' => 2023,
                'kilometrage' => 8000,
                'carrosserie' => 'Hatchback',
                'energie' => 'Essence',
                'boite' => 'Automatique',
                'photo' => 'vehicles/peugeot-208.svg'
            ],
            [
                'immatriculation' => 'TG-567-MNO',
                'marque' => 'Renault',
                'modele' => 'Scenic',
                'couleur' => 'Bleu',
                'annee' => 2019,
                'kilometrage' => 62000,
                'carrosserie' => 'Monospace',
                'energie' => 'Essence',
                'boite' => 'Manuelle',
                'photo' => 'vehicles/renault-scenic.svg'
            ],
            [
                'immatriculation' => 'TG-890-PQR',
                'marque' => 'Hyundai',
                'modele' => 'i20',
                'couleur' => 'Argent',
                'annee' => 2021,
                'kilometrage' => 35000,
                'carrosserie' => 'Hatchback',
                'energie' => 'Essence',
                'boite' => 'Automatique',
                'photo' => 'vehicles/hyundai-i20.svg'
            ]
        ];

        foreach ($vehicules as $vehicule) {
            Vehicule::create($vehicule);
        }
    }
}
