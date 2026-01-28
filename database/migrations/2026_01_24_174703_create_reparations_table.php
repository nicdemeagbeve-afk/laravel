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

            // Clé étrangère vers vehicules
            $table->foreignId('vehicule_id')
                  ->constrained('vehicules')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreignId('technicien_id')
                  ->nullable()
                  ->constrained('techniciens')
                  ->onUpdate('cascade')
                  ->onDelete('set null');

            $table->date('date'); // date de la réparation
            $table->integer('duree_main_oeuvre')->nullable(); // durée en minutes
            $table->text('objet_reparation'); // description de la réparation

            $table->timestamps(); // created_at et updated_at
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