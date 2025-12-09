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
            $table->foreignId('id_contenu')->nullable()->constrained('contenus','id_contenu')->cascadeOnDelete();
            $table->foreignId('id_utilisateur')->nullable()->constrained('utilisateurs','id')->nullOnDelete();
            $table->string('description', 255)->nullable();
            $table->integer('taille')->nullable();
            $table->timestamps();
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
