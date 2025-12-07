<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('traductions', function (Blueprint $table) {
            $table->id('id_traduction');
            
            // Référence au contenu original
            $table->unsignedBigInteger('id_contenu');
            $table->foreign('id_contenu')->references('id_contenu')->on('contenus');
            
            // Langues
            $table->unsignedBigInteger('id_langue_source');
            $table->foreign('id_langue_source')->references('id_langue')->on('langues');
            
            $table->unsignedBigInteger('id_langue_cible');
            $table->foreign('id_langue_cible')->references('id_langue')->on('langues');
            
            // Traducteur
            $table->unsignedBigInteger('id_traducteur');
            $table->foreign('id_traducteur')->references('id_utilisateur')->on('users');
            
            // Contenu de la traduction
            $table->text('texte_traduit')->nullable();
            
            // Statut
            $table->enum('statut', ['en_attente', 'en_cours', 'validé', 'rejeté'])->default('en_attente');
            
            // Dates
            $table->dateTime('date_debut')->nullable();
            $table->dateTime('date_fin')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('traductions');
    }
};