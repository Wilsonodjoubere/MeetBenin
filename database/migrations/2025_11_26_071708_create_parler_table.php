<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parler', function (Blueprint $table) {
            $table->foreignId('id_region')->constrained('regions')->onDelete('cascade');
            $table->foreignId('id_langue')->constrained('langues')->onDelete('cascade');
            $table->timestamps();
            
            // Clé primaire composite
            $table->primary(['id_region', 'id_langue']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('parler');
    }
};