<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
use App\Models\Role;
use App\Models\Langue;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer l'utilisateur admin s'il n'existe pas
        $adminRole = Role::where('nom_role', 'Administrateur')->first();
        $frenchLang = Langue::where('code_langue', 'fr')->first();

        if (!$adminRole) {
            $adminRole = Role::create(['nom_role' => 'Administrateur']);
        }

        if (!$frenchLang) {
            $frenchLang = Langue::create([
                'nom_langue' => 'Français',
                'code_langue' => 'fr',
                'description' => 'Langue officielle du Bénin'
            ]);
        }

        $admin = Utilisateur::where('email', 'admin@culturebenin.bj')->first();

        if (!$admin) {
            Utilisateur::create([
                'nom' => 'ADMIN',
                'prenom' => 'Culture Benin',
                'email' => 'admin@culturebenin.bj',
                'mot_de_passe' => bcrypt('admin123'),
                'sexe' => 'M',
                'date_naissance' => '1990-01-01',
                'date_inscription' => now(),
                'statut' => 'valide',
                'id_role' => $adminRole->id,
                'id_langue' => $frenchLang->id,
            ]);
        }
    }
}