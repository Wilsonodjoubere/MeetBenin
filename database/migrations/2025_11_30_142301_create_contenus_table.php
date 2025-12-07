<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contenus', function (Blueprint $table) {
            // Clé Primaire
            $table->id('id_contenu'); 
            
            // Attributs simples
            $table->string('titre', 255);
            $table->text('texte')->nullable(); 
            $table->dateTime('date_creation')->useCurrent();
            $table->string('statut', 50)->default('brouillon'); 
            $table->dateTime('date_validation')->nullable();
            
            // Clé Étrangère parent_id (pour l'auto-référencement)
            $table->unsignedBigInteger('parent_id')->nullable();
            
            // Clés Étrangères (MLD)
            
            // FK vers Région (assumant PK régions est id_region)
            $table->foreignId('id_region')->constrained('regions', 'id_region')->onDelete('restrict');
            
            // FK vers Langue (assumant PK langues est id_langue)
            $table->foreignId('id_langue')->constrained('langues', 'id_langue')->onDelete('restrict');
            
            // FK vers TypeContenu (assumant PK type_contenus est id_type_contenu)
            $table->foreignId('id_type_contenu')->constrained('type_contenus', 'id_type_contenu')->onDelete('restrict');
            
            // FK vers Utilisateur (Auteur) (PK users est id_utilisateur)
            $table->foreignId('id_auteur')->constrained('users', 'id_utilisateur')->onDelete('restrict');
            
            // FK vers Utilisateur (Modérateur) (PK users est id_utilisateur)
            $table->foreignId('id_moderateur')->nullable()->constrained('users', 'id_utilisateur')->onDelete('set null');
            
            $table->timestamps();
            
            // Contrainte auto-référencée
            $table->foreign('parent_id')->references('id_contenu')->on('contenus')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contenus');
    }
};