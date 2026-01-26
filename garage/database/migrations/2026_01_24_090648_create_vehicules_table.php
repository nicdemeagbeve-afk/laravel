<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation')->unique();
            $table->string('marque');
            $table->string('modele');
            $table->string('couleur')->nullable();
            $table->smallInteger('annee')->nullable();
            $table->integer('kilometrage')->nullable();
            $table->string('carrosserie')->nullable();
            $table->string('energie')->nullable(); // essence, diesel, hybride, électrique
            $table->string('boite')->nullable(); // manuelle, automatique
            $table->string('image')->nullable(); // Chemin de l'image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};