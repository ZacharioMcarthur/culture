<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commentaire;

class CommentairesSeeder extends Seeder
{
    public function run(): void
    {
        Commentaire::create([
            'texte' => 'Très intéressant !',
            'note' => 5,
            'date' => now(),
            'id_utilisateur' => 4, // Jean
            'id_contenu' => 1,
        ]);

        Commentaire::create([
            'texte' => 'Recette facile à suivre',
            'note' => 4,
            'date' => now(),
            'id_utilisateur' => 4,
            'id_contenu' => 2,
        ]);
    }
}
