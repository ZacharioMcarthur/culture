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
        Schema::create('medias', function (Blueprint $table) {
            $table->increments('id_media');
            $table->string('chemin', 255);
            $table->string('type', 50)->nullable();
            $table->unsignedInteger('id_contenu')->nullable();
            $table->unsignedBigInteger('id_utilisateur')->nullable();
            $table->string('description', 255)->nullable();
            $table->integer('taille')->nullable();
            $table->timestamps();

            $table->foreign('id_contenu')->references('id_contenu')->on('contenus')->cascadeOnDelete();
            $table->foreign('id_utilisateur')->references('id')->on('utilisateurs')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};
