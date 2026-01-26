<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicule;
use App\Models\Technicien;

class Reparation extends Model
{
    protected $fillable = [
        'vehicule_id',
        'technicien_id',
        'date',
        'duree_main_oeuvre',
        'objet_reparation'
    ];

    /**
     * Une réparation appartient à un véhicule
     */
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    /**
     * Une réparation appartient à un technicien
     */
    public function technicien()
    {
        return $this->belongsTo(Technicien::class);
    }
}
