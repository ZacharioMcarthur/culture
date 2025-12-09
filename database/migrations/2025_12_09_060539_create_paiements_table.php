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
        Schema::create('paiements', function (Blueprint $table) {
            $table->increments('id_paiement');
            $table->string('reference', 200)->unique();
            $table->unsignedBigInteger('id_utilisateur');
            $table->unsignedInteger('id_contenu')->nullable();
            $table->decimal('montant', 10, 2);
            $table->enum('statut', ['initié','réussi','échoué','remboursé'])->default('initié');
            $table->string('méthode', 50)->nullable();
            $table->json('payload')->nullable();
            $table->timestamps();

            $table->foreign('id_utilisateur')->references('id')->on('utilisateurs')->cascadeOnDelete();
            $table->foreign('id_contenu')->references('id_contenu')->on('contenus')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
