<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technicien extends Model
{
    protected $fillable = ['nom', 'prenom', 'specialite', 'photo'];

    public function reparations()
    {
        return $this->hasMany(Reparation::class);
    }
}

