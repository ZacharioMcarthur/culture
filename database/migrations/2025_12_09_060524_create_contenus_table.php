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
        Schema::create('contenus', function (Blueprint $table) {
            $table->increments('id_contenu');
            $table->string('titre', 255);
            $table->string('slug', 255)->unique();
            $table->text('extrait')->nullable();
            $table->longText('contenu');
            $table->enum('statut', ['brouillon','publié','payant'])->default('brouillon');
            $table->decimal('prix', 10, 2)->default(0.00);
            $table->unsignedInteger('id_categorie')->nullable();
            $table->unsignedBigInteger('id_auteur')->nullable(); // référence vers utilisateurs.id
            $table->integer('vues')->default(0);
            $table->timestamps();

            $table->foreign('id_categorie')->references('id_categorie')->on('categories')->nullOnDelete();
            $table->foreign('id_auteur')->references('id')->on('utilisateurs')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenus');
    }
};
