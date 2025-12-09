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
            $table->foreignId('id_contenu')->constrained('contenus','id_contenu')->cascadeOnDelete();
            $table->foreignId('id_utilisateur')->constrained('utilisateurs','id')->cascadeOnDelete();
            $table->tinyInteger('valeur')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->unique(['id_contenu', 'id_utilisateur'], 'unique_note_par_utilisateur');
            $table->check('valeur BETWEEN 1 AND 5');
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
