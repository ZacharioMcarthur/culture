<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commentaire;

class CommentairesSeeder extends Seeder
{
    public function run(): void
    {
        Commentaire::create([
            'message' => 'Très intéressant ! J\'adore les contes traditionnels béninois.',
            'id_utilisateur' => 4, // Jean
            'id_contenu' => 1,
        ]);

        Commentaire::create([
            'message' => 'Recette facile à suivre. Je vais essayer de faire du Wagasi ce week-end !',
            'id_utilisateur' => 4,
            'id_contenu' => 2,
        ]);
    }
}
