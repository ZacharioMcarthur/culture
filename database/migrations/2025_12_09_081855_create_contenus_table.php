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
            $table->foreignId('id_categorie')->nullable()->constrained('categories','id_categorie')->nullOnDelete();
            $table->foreignId('id_auteur')->nullable()->constrained('utilisateurs','id')->nullOnDelete();
            $table->integer('vues')->default(0);
            $table->timestamps();
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
