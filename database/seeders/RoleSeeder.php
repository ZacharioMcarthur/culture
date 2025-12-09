<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('roles')->insert([
            [
                'nom_role' => 'Administrateur',
                'description' => 'Accès complet à toutes les fonctionnalités du système',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_role' => 'Modérateur',
                'description' => 'Peut gérer les contenus et commentaires',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_role' => 'Utilisateur',
                'description' => 'Utilisateur standard avec accès limité',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
