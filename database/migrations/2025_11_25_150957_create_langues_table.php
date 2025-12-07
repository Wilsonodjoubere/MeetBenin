<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Langue(id_langue, nom_langue, code_langue, description)
        Schema::create('langues', function (Blueprint $table) {
            // C'est la ligne CRUCIALE pour le MLD et les FKs
            $table->id('id_langue'); 

            $table->string('nom_langue', 100);
            $table->string('code_langue', 10)->unique();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('langues');
    }
};