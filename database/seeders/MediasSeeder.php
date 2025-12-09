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
            'description' => 'Lecture audio du conte',
            'id_contenu' => 1,
            'id_type_media' => 2, // Audio
            'langue_id' => 2,
        ]);

        Media::create([
            'chemin' => 'media/contenus/wagasi.jpg',
            'description' => 'Photo du fromage Wagasi',
            'id_contenu' => 2,
            'id_type_media' => 1, // Image
            'langue_id' => 5,
        ]);
    }
}
