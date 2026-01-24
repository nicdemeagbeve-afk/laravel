<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\vehicule;   // Vérifiez la casse (Vehicule ou vehicule)
use App\Models\Technicien;
use App\Models\Reparation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Création de l'utilisateur de test
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. Insertion des 20 Véhicules
        DB::table('vehicules')->insert([
            ['immatriculation' => 'TG-1245-AB', 'marque' => 'Toyota', 'modele' => 'Corolla', 'couleur' => 'Blanc', 'annee' => 2018, 'kilometrage' => 45000, 'carrosserie' => 'Berline', 'energie' => 'Essence', 'boite' => 'Manuelle'],
            ['immatriculation' => 'TG-8892-BC', 'marque' => 'Nissan', 'modele' => 'Patrol', 'couleur' => 'Noir', 'annee' => 2020, 'kilometrage' => 32000, 'carrosserie' => 'SUV', 'energie' => 'Diesel', 'boite' => 'Automatique'],
            ['immatriculation' => 'TG-4431-DF', 'marque' => 'Peugeot', 'modele' => '3008', 'couleur' => 'Gris', 'annee' => 2021, 'kilometrage' => 15500, 'carrosserie' => 'SUV', 'energie' => 'Hybride', 'boite' => 'Automatique'],
            ['immatriculation' => 'TG-9002-GH', 'marque' => 'Mercedes', 'modele' => 'C200', 'couleur' => 'Bleu', 'annee' => 2015, 'kilometrage' => 120000, 'carrosserie' => 'Berline', 'energie' => 'Essence', 'boite' => 'Automatique'],
            ['immatriculation' => 'TG-3310-JK', 'marque' => 'Hyundai', 'modele' => 'Tucson', 'couleur' => 'Rouge', 'annee' => 2019, 'kilometrage' => 58000, 'carrosserie' => 'SUV', 'energie' => 'Essence', 'boite' => 'Manuelle'],
            ['immatriculation' => 'TG-6674-LM', 'marque' => 'Ford', 'modele' => 'Ranger', 'couleur' => 'Blanc', 'annee' => 2017, 'kilometrage' => 89000, 'carrosserie' => 'Pick-up', 'energie' => 'Diesel', 'boite' => 'Manuelle'],
            ['immatriculation' => 'TG-1122-NP', 'marque' => 'Volkswagen', 'modele' => 'Golf 7', 'couleur' => 'Noir', 'annee' => 2016, 'kilometrage' => 105000, 'carrosserie' => 'Compacte', 'energie' => 'Essence', 'boite' => 'Automatique'],
            ['immatriculation' => 'TG-5566-QR', 'marque' => 'Mitsubishi', 'modele' => 'L200', 'couleur' => 'Gris', 'annee' => 2022, 'kilometrage' => 8500, 'carrosserie' => 'Pick-up', 'energie' => 'Diesel', 'boite' => 'Manuelle'],
            ['immatriculation' => 'TG-7788-ST', 'marque' => 'Kia', 'modele' => 'Sportage', 'couleur' => 'Marron', 'annee' => 2020, 'kilometrage' => 25000, 'carrosserie' => 'SUV', 'energie' => 'Essence', 'boite' => 'Automatique'],
            ['immatriculation' => 'TG-9900-UV', 'marque' => 'Renault', 'modele' => 'Clio 4', 'couleur' => 'Jaune', 'annee' => 2014, 'kilometrage' => 145000, 'carrosserie' => 'Citadine', 'energie' => 'Diesel', 'boite' => 'Manuelle'],
        ]);

        // 3. Insertion des 10 Techniciens
        DB::table('techniciens')->insert([
            ['nom' => 'KOFFI', 'prenom' => 'Jean', 'specialite' => 'Mécanique Générale'],
            ['nom' => 'ADAMOU', 'prenom' => 'Moussa', 'specialite' => 'Électricité Automobile'],
            ['nom' => 'TRAORÉ', 'prenom' => 'Amadou', 'specialite' => 'Diagnostic Électronique'],
            ['nom' => 'MENSAH', 'prenom' => 'Komi', 'specialite' => 'Tôlerie et Peinture'],
            ['nom' => 'DIOP', 'prenom' => 'Ibrahima', 'specialite' => 'Système de Freinage'],
            ['nom' => 'SYLLA', 'prenom' => 'Fatou', 'specialite' => 'Climatisation Auto'],
            ['nom' => 'GADEAU', 'prenom' => 'Marc', 'specialite' => 'Boîtes Automatiques'],
            ['nom' => 'OUÉDRAOGO', 'prenom' => 'Issa', 'specialite' => 'Pneumatique et Train roulant'],
            ['nom' => 'TCHAKONDO', 'prenom' => 'Fadel', 'specialite' => 'Injection Diesel'],
            ['nom' => 'LAWSON', 'prenom' => 'Pierre', 'specialite' => 'Spécialiste Moteurs Hybrides'],
        ]);

        // 4. Insertion des 10 Réparations (liant les IDs précédents)
        DB::table('reparations')->insert([
            ['vehicule_id' => 1, 'technicien_id' => 1, 'date' => '2024-05-10', 'duree_main_oeuvre' => 120, 'objet_reparation' => 'Vidange complète et changement filtre à huile'],
            ['vehicule_id' => 2, 'technicien_id' => 3, 'date' => '2024-05-11', 'duree_main_oeuvre' => 90, 'objet_reparation' => 'Diagnostic valise suite à voyant moteur allumé'],
            ['vehicule_id' => 3, 'technicien_id' => 5, 'date' => '2024-05-12', 'duree_main_oeuvre' => 180, 'objet_reparation' => 'Remplacement des plaquettes et disques avant'],
            ['vehicule_id' => 4, 'technicien_id' => 2, 'date' => '2024-05-12', 'duree_main_oeuvre' => 60, 'objet_reparation' => 'Remplacement batterie et test alternateur'],
            ['vehicule_id' => 5, 'technicien_id' => 9, 'date' => '2024-05-13', 'duree_main_oeuvre' => 240, 'objet_reparation' => 'Nettoyage injecteurs et réglage pompe diesel'],
        ]);
    }
}