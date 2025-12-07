<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Table types_media (Correction du nom de la PK pour MLD)
        if (!Schema::hasTable('types_media')) {
            Schema::create('types_media', function (Blueprint $table) {
                // MLD: id_type_media
                $table->id('id_type_media'); // Utilise la PK du MLD
                $table->string('nom_media');
                $table->timestamps();
            });
        }

        // 2. Table media - CORRIGÉE
        if (!Schema::hasTable('media')) {
            Schema::create('media', function (Blueprint $table) {
                // MLD: id_media
                $table->id('id_media');
                $table->string('chemin');
                $table->text('description')->nullable();
                $table->timestamps();
                
                // CORRECTION 1 : Clé étrangère vers 'contenus'
                // Nous utilisons le nom de colonne 'id_contenu' pour être cohérent avec votre MLD (#id_contenu)
                $table->foreignId('id_contenu') 
                      ->constrained('contenus', 'id_contenu') // Assure que les types correspondent
                      ->onDelete('cascade');
                      
                // CORRECTION 2 : Clé étrangère vers 'types_media'
                // Nous utilisons le nom de colonne 'id_type_media' (MLD)
                $table->foreignId('id_type_media') 
                      ->constrained('types_media', 'id_type_media'); // Référence la nouvelle PK 'id_type_media'
            });
        }

        // 3. Table commentaires - CORRIGÉE
        if (!Schema::hasTable('commentaires')) {
            Schema::create('commentaires', function (Blueprint $table) {
                $table->id();
                $table->text('texte');
                $table->integer('note')->nullable();
                $table->timestamp('date')->useCurrent();
                $table->timestamps();
                $table->softDeletes();
                
                // CORRECTION 3 : Clé étrangère vers 'users'
                // Nous supposons que la PK de 'users' est 'id_utilisateur' (comme dans User.php)
                // Si la table users a gardé la PK par défaut 'id', utilisez references('id') à la place.
                $table->foreignId('id_utilisateur')
                      ->constrained('users', 'id_utilisateur');
                      
                // CORRECTION 4 : Clé étrangère vers 'contenus'
                $table->foreignId('id_contenu')
                      ->constrained('contenus', 'id_contenu');
            });
        }

        // 4. Table parler - VÉRIFIÉE ET OPTIMISÉE
        if (!Schema::hasTable('parler')) {
            Schema::create('parler', function (Blueprint $table) {
                // foreignId garantit le type unsignedBigInteger
                $table->foreignId('id_region')->constrained('regions', 'id_region');
                $table->foreignId('id_langue')->constrained('langues', 'id_langue');
                
                $table->primary(['id_region', 'id_langue']);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // L'ordre de suppression est crucial : les enfants avant les parents.
        Schema::dropIfExists('parler');
        Schema::dropIfExists('commentaires');
        Schema::dropIfExists('media');
        Schema::dropIfExists('types_media');
    }
};