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
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id_note');
            $table->unsignedInteger('id_contenu');
            $table->unsignedBigInteger('id_utilisateur');
            $table->tinyInteger('valeur')->check('valeur BETWEEN 1 AND 5');
            $table->timestamps();

            $table->foreign('id_contenu')->references('id_contenu')->on('contenus')->cascadeOnDelete();
            $table->foreign('id_utilisateur')->references('id')->on('utilisateurs')->cascadeOnDelete();
            $table->unique(['id_contenu', 'id_utilisateur'], 'unique_note_par_utilisateur');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
