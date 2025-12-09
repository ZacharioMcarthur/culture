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
            $table->id(); // clé primaire simple 'id'
            $table->string('nom', 100)->nullable();
            $table->string('prenom', 100)->nullable();
            $table->string('email', 150)->unique();
            $table->string('mot_de_passe', 255);
            $table->enum('sexe', ['M','F','Autre'])->default('Autre');
            $table->date('date_naissance')->nullable();
            $table->timestamp('date_inscription')->useCurrent();
            $table->string('photo', 255)->nullable();
            $table->tinyInteger('statut')->default(1);
            $table->unsignedInteger('id_role')->nullable();
            $table->unsignedInteger('id_langue')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('two_factor_enabled')->default(0);
            $table->text('two_factor_secret')->nullable();
            $table->timestamps();

            $table->foreign('id_role')->references('id_role')->on('roles')->nullOnDelete();
            $table->foreign('id_langue')->references('id_langue')->on('langues')->nullOnDelete();
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
