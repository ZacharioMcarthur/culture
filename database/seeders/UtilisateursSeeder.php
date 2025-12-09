<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class UtilisateursSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'nom' => 'NASCIMENTO',
                'prenom' => 'Zachario Blimond',
                'email' => 'nascimentozachario@gmail.com',
                'mot_de_passe' => 'Zachario@2025',
                'sexe' => 'M',
                'date_naissance' => '2004-11-05',
                'id_role' => 1,
                'id_langue' => 1,
            ],
            [
                'nom' => 'COMLAN',
                'prenom' => 'Maurice',
                'email' => 'maurice.comlan@uac.bj',
                'mot_de_passe' => 'Eneam123',
                'sexe' => 'M',
                'date_naissance' => '1975-01-01',
                'id_role' => 1,
                'id_langue' => 1,
            ],
            [
                'nom' => 'KUROKIBA',
                'prenom' => 'Arthur',
                'email' => 'arthur.otk.kurokiba@gmail.com',
                'mot_de_passe' => 'Kurokiba@123',
                'sexe' => 'F',
                'date_naissance' => '2004-11-04',
                'id_role' => 3,
                'id_langue' => 2,
            ],
            [
                'nom' => 'OKE',
                'prenom' => 'Meryl',
                'email' => 'meryloke7@gmail.com',
                'mot_de_passe' => 'meryl@1234',
                'sexe' => 'M',
                'date_naissance' => '2007-12-11',
                'id_role' => 4,
                'id_langue' => 1,
            ],
        ];

        foreach ($users as $user) {
            Utilisateur::create([
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'email' => $user['email'],
                'mot_de_passe' => Hash::make($user['mot_de_passe']),
                'sexe' => $user['sexe'],
                'date_naissance' => $user['date_naissance'],
                'date_inscription' => now(),
                'statut' => 'valide',
                'id_role' => $user['id_role'],
                'id_langue' => $user['id_langue'],
                'photo' => 'photos/default.png',
            ]);
        }
    }
}
