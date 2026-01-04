<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            LanguesSeeder::class,
            CategorieSeeder::class,
            TypeContenusSeeder::class,
            TypeMediasSeeder::class,
            RegionsSeeder::class,
            AdminSeeder::class,
            UtilisateursSeeder::class,
            ContenusSeeder::class,
            MediasSeeder::class,
            CommentairesSeeder::class,
        ]);
    }
}