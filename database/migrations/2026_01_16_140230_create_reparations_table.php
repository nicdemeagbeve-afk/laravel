<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('reparations', function (Blueprint $table) {
            $table->id();

            // Véhicule (obligatoire)
            $table->foreignId('vehicule_id')
                  ->constrained('vehicules')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            // Technicien (optionnel)
            $table->foreignId('technicien_id')
                  ->nullable()
                  ->constrained('techniciens')
                  ->onUpdate('cascade')
                  ->onDelete('set null');

            // Infos réparation
            $table->date('date');
            $table->integer('duree_main_oeuvre')->nullable();
            $table->text('objet_reparation');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reparations');
    }
};
