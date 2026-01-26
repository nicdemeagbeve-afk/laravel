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
    $table->foreignId('vehicule_id')->constrained('vehicules')->cascadeOnUpdate()->cascadeOnDelete();
    $table->foreignId('technicien_id')->nullable()->constrained('techniciens')->nullOnDelete()->cascadeOnUpdate();
    $table->text('description');
    $table->date('date_debut');
    $table->date('date_fin')->nullable();
    $table->decimal('prix', 10, 2)->nullable();
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
