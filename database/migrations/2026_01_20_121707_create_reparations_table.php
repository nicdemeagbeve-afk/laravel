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
        Schema::create('reparations', function (Blueprint $table) {
            $table->id();
            
            // Clés étrangères liées aux tables vehicules et techniciens
            $table->foreignId('vehicule_id')->constrained('vehicules')->onDelete('cascade');
            $table->foreignId('technicien_id')->constrained('techniciens')->onDelete('cascade');
            
            // Champs harmonisés avec votre Seeder et vos formulaires
            $table->date('date'); // Remplacé date_debut par date
            $table->integer('duree_main_oeuvre')->nullable();
            $table->text('objet_reparation'); // Remplacé description par objet_reparation
            
            // Facultatif : vous pouvez garder le coût si vous voulez l'utiliser plus tard
            $table->decimal('cout', 10, 2)->nullable(); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparations');
    }
};