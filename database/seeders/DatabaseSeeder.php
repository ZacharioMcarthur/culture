<?php

namespace Database\Seeders;

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
        // Lancer les seeders principaux
        $this->call([
            AdminUserSeeder::class,
            RoleSeeder::class,
            LangueSeeder::class,
            RegionSeeder::class,
            TypeContenuSeeder::class,
            TypeMediaSeeder::class,
            // Content seeders can be added here when available
        ]);
    }
}
