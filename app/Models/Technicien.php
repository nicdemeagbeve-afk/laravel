<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reparation;


class Technicien extends Model
{

protected $fillable = [
        'nom',
        'prenom',
        'specialite',
    ];

    public function reparations()
    {
        return $this->hasMany(Reparation::class);
    }
        
}
