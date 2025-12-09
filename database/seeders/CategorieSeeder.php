<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('categories')->insert([
            [
                'nom' => 'Histoire et Patrimoine',
                'slug' => 'histoire-patrimoine',
                'description' => 'Découvrez l\'histoire fascinante et le patrimoine culturel du Bénin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Arts et Culture',
                'slug' => 'arts-culture',
                'description' => 'Explorez les arts traditionnels et la culture béninoise',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Cuisine Traditionnelle',
                'slug' => 'cuisine-traditionnelle',
                'description' => 'Les saveurs authentiques de la cuisine béninoise',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Musique et Danse',
                'slug' => 'musique-danse',
                'description' => 'La richesse musicale et les danses traditionnelles du Bénin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Nature et Environnement',
                'slug' => 'nature-environnement',
                'description' => 'La biodiversité exceptionnelle du Bénin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
