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
            $table->foreignId('id_utilisateur')->constrained('utilisateurs','id')->cascadeOnDelete();
            $table->foreignId('id_contenu')->nullable()->constrained('contenus','id_contenu')->nullOnDelete();
            $table->decimal('montant', 10, 2);
            $table->enum('statut', ['initié','réussi','échoué','remboursé'])->default('initié');
            $table->string('méthode', 50)->nullable();
            $table->json('payload')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
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
