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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id(); // id
            $table->string('nom', 100)->nullable();
            $table->string('prenom', 100)->nullable();
            $table->string('email', 150)->unique();
            $table->string('mot_de_passe', 255);
            $table->enum('sexe', ['M','F','Autre'])->default('Autre');
            $table->date('date_naissance')->nullable();
            $table->timestamp('date_inscription')->useCurrent();
            $table->string('photo', 255)->nullable();
            $table->tinyInteger('statut')->default(1);
            $table->foreignId('id_role')->nullable()->constrained('roles','id_role')->nullOnDelete();
            $table->foreignId('id_langue')->nullable()->constrained('langues','id_langue')->nullOnDelete();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->boolean('two_factor_enabled')->default(false);
            $table->text('two_factor_secret')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
