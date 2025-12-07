<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Région(id_region, nom_region, description, population, superficie, localisation) 
        Schema::create('regions', function (Blueprint $table) {
            // Clé Primaire : id_region
            $table->id('id_region'); 
            
            // Attributs simples
            $table->string('nom_region', 100)->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('population')->nullable();
            $table->unsignedBigInteger('superficie')->nullable(); // en km² par exemple
            $table->string('localisation')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};