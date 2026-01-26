<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicule_id',
        'technicien_id',
        'description',
        'prix',
        'date_debut',
        'date_fin',
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function technicien()
    {
        return $this->belongsTo(Technicien::class);
    }
}
