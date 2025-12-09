<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contenu;

class ContenusSeeder extends Seeder
{
    public function run(): void
    {
        Contenu::create([
            'titre' => 'Le conte de la tortue et du lièvre',
            'texte' => 'Il était une fois une tortue et un lièvre...',
            'date_creation' => now(),
            'statut' => 'valide',
            'parent_id' => null,
            'date_validation' => now(),
            'id_region' => 2, // Atacora
            'id_langue' => 2, // Fon
            'id_moderateur' => 2, // Maurice
            'id_type_contenu' => 1, // Histoire
            'id_auteur' => 3, // Amina
        ]);

        Contenu::create([
            'titre' => 'Recette du Wagasi',
            'texte' => 'Le Wagasi est un fromage traditionnel béninois...',
            'date_creation' => now(),
            'statut' => 'valide',
            'parent_id' => null,
            'date_validation' => now(),
            'id_region' => 9, // Mono
            'id_langue' => 5, // Mina
            'id_moderateur' => 2,
            'id_type_contenu' => 2, // Recette
            'id_auteur' => 3,
        ]);
    }
}
