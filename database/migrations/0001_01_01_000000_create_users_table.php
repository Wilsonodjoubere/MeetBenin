<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // PK MLD : id_utilisateur
            $table->id('id_utilisateur'); 

            // Attributs Utilisateur
            $table->string('nom', 255);
            $table->string('prenom', 255);
            $table->string('email', 255)->unique();
            $table->string('sexe', 1);
            $table->date('date_naissance')->nullable();
            $table->string('statut', 50)->default('actif');
            $table->string('photo', 255)->nullable();
            
            // Colonnes des futures FKs (unconstrained pour l'instant)
            $table->unsignedBigInteger('id_role'); 
            $table->unsignedBigInteger('id_langue')->nullable(); 

            // Colonnes Laravel/Authentification
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mot_de_passe');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};