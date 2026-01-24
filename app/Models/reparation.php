<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;

    // Cette liste doit correspondre EXACTEMENT aux colonnes de votre migration
    protected $fillable = [
        'vehicule_id',
        'technicien_id',
        'date',
        'duree_main_oeuvre',
        'objet_reparation',
        'cout'
    ];

    // Relations (Utile pour afficher le nom du technicien plus tard)
    public function vehicule()
    {
        return $this->belongsTo(vehicule::class);
    }

    public function technicien()
    {
        return $this->belongsTo(Technicien::class);
    }
}