<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class UtilisateursSeeder extends Seeder
{
    public function run(): void
    {
        // Administrateur 1
        Utilisateur::create([
            'nom' => 'NASCIMENTO',
            'prenom' => 'Zachario Blimond',
            'email' => 'nascimentozachario@gmail.com',
            'mot_de_passe' => Hash::make('Zachario@2025'),
            'sexe' => 'M',
            'date_naissance' => '2004-11-05',
            'date_inscription' => now(),
            'statut' => 'valide',
            'id_role' => 1, // Administrateur
            'id_langue' => 1, // Français
            'photo' => 'photos/default.png',
        ]);

        // Administrateur 2
        Utilisateur::create([
            'nom' => 'COMLAN',
            'prenom' => 'Maurice',
            'email' => 'maurice.comlan@uac.bj',
            'mot_de_passe' => Hash::make('Eneam123'),
            'sexe' => 'M',
            'date_naissance' => '1975-01-01',
            'date_inscription' => now(),
            'statut' => 'valide',
            'id_role' => 1,
            'id_langue' => 1,
            'photo' => 'photos/default.png',
        ]);

        // Contributeur
        Utilisateur::create([
            'nom' => 'KUROKIBA',
            'prenom' => 'Arthur',
            'email' => 'arthur.otk.kurokiba@gmail.com',
            'mot_de_passe' => Hash::make('Kurokiba@123'),
            'sexe' => 'F',
            'date_naissance' => '2004-11-04',
            'date_inscription' => now(),
            'statut' => 'valide',
            'id_role' => 3, // Contributeur
            'id_langue' => 2, // Fon
            'photo' => 'photos/default.png',
        ]);

        // Lecteur
        Utilisateur::create([
            'nom' => 'OKE',
            'prenom' => 'Meryl',
            'email' => 'meryloke7@gmail.com',
            'mot_de_passe' => Hash::make('meryl@1234'),
            'sexe' => 'M',
            'date_naissance' => '2007-12-11',
            'date_inscription' => now(),
            'statut' => 'valide',
            'id_role' => 4, // Lecteur
            'id_langue' => 1, // Français
            'photo' => 'photos/default.png',
        ]);
    }
}
