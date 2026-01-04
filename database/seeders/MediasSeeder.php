<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;

class MediasSeeder extends Seeder
{
    public function run(): void
    {
        Media::create([
            'chemin' => 'media/contenus/tortue_lièvre.mp3',
            'type' => 'audio',
            'description' => 'Lecture audio du conte',
            'id_contenu' => 1,
            'id_utilisateur' => 3, // Amina
        ]);

        Media::create([
            'chemin' => 'media/contenus/wagasi.jpg',
            'type' => 'image',
            'description' => 'Photo du fromage Wagasi',
            'id_contenu' => 2,
            'id_utilisateur' => 3, // Amina
        ]);
    }
}
