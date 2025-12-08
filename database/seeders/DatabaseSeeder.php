<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\DanseSeeder;
use Database\Seeders\EvenementSeeder;
use Database\Seeders\LieuSeeder;
use Database\Seeders\PlatSeeder;
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
        // Créer un utilisateur admin
        User::factory()->create([
            'name' => 'Administrateur Culture',
            'email' => 'admin@culture.benin',
            'role' => 'admin',
        ]);

        // Créer quelques utilisateurs de test
        User::factory()->create([
            'name' => 'Utilisateur Test',
            'email' => 'user@culture.benin',
            'role' => 'user',
        ]);

        // Lancer les seeders de contenu culturel
        $this->call([
            PlatSeeder::class,
            LieuSeeder::class,
            DanseSeeder::class,
            EvenementSeeder::class,
        ]);
    }
}
