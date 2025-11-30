<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id('id_commentaire');
            $table->text('texte');
            $table->integer('note')->nullable();
            $table->timestamp('date')->useCurrent();
            $table->foreignId('id_utilisateur')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_contenu')->constrained('contenus')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
};