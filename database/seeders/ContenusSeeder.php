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
            'slug' => 'le-conte-de-la-tortue-et-du-lievre',
            'extrait' => 'Il était une fois une tortue et un lièvre qui décidaient de faire une course...',
            'contenu' => 'Il était une fois une tortue et un lièvre. Le lièvre se moquait de la lenteur de la tortue. Un jour, ils décidèrent de faire une course pour voir qui était le plus rapide. Le lièvre, très confiant, décida de faire une sieste en chemin, pensant qu\'il avait tout le temps. Mais la tortue, avançant à son rythme régulier, arriva première. Cette histoire nous enseigne que la persévérance et la régularité sont plus importantes que la vitesse.',
            'statut' => 'publié',
            'prix' => 0.00,
            'id_categorie' => 1,
            'id_auteur' => 3, // Amina
            'vues' => 0,
        ]);

        Contenu::create([
            'titre' => 'Recette du Wagasi',
            'slug' => 'recette-du-wagasi',
            'extrait' => 'Le Wagasi est un fromage traditionnel béninois...',
            'contenu' => 'Le Wagasi est un fromage traditionnel béninois fabriqué à partir de lait de vache. Pour le préparer, il faut faire cailler le lait avec du jus de citron ou du ferment naturel. Le caillé est ensuite pressé pour enlever le petit-lait, puis mis dans des feuilles de bananier pour lui donner son arôme caractéristique. Le Wagasi peut être consommé frais, frit ou grillé. Il est souvent accompagné de pâte rouge ou de bouillie de mil.',
            'statut' => 'payant',
            'prix' => 100.00,
            'id_categorie' => 2,
            'id_auteur' => 3,
            'vues' => 0,
        ]);
    }
}
