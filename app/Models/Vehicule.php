<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
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

    public function reparations()
    {
        return $this->hasMany(Reparation::class);
    }
}

