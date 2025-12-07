<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // On utilise Schema::table car la table existe déjà
        Schema::table('users', function (Blueprint $table) {
            
            // Ajout de la contrainte FK vers Role
            // id_role dans users doit être un unsignedBigInteger (fait dans 0001_...)
            $table->foreign('id_role') 
                  ->references('id_role')->on('roles');

            // Ajout de la contrainte FK vers Langue
            $table->foreign('id_langue')
                  ->references('id_langue')->on('langues')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_role']);
            $table->dropForeign(['id_langue']);
        });
    }
};