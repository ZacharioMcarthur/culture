<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer d'abord un rôle admin s'il n'existe pas
        $roleId = \DB::table('roles')->where('nom_role', 'Administrateur')->value('id_role');

        if (!$roleId) {
            $roleId = \DB::table('roles')->insertGetId([
                'nom_role' => 'Administrateur',
                'description' => 'Accès complet à toutes les fonctionnalités du système',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Créer l'admin
        \DB::table('utilisateurs')->insert([
            'nom' => 'Admin',
            'prenom' => 'Super',
            'email' => 'admin@culture.com',
            'mot_de_passe' => \Hash::make('password'),
            'sexe' => 'M',
            'statut' => 1,
            'id_role' => $roleId,
            'email_verified_at' => now(),
            'date_inscription' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
