<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    // Indique les colonnes que Laravel a le droit de modifier via un formulaire
    protected $fillable = [
        'immatriculation',
        'marque',
        'modele',
        'couleur',
        'annee',
        'kilometrage',
        'carrosserie',
        'energie',
        'boite',
    ];

    // Si ta table ne respecte pas le pluriel anglais (vehicles), 
    // il est plus sûr d'ajouter cette ligne :
    // protected $table = 'vehicules';
}