<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technicien extends Model
{
    protected $fillable = ['nom', 'prenom', 'specialite'];

    // Relation : un technicien peut réaliser plusieurs réparations
    public function reparations()
    {
        return $this->hasMany(Reparation::class);
    }
}