<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('langues')->insert([
            [
                'code' => 'fr',
                'nom' => 'Français',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'en',
                'nom' => 'English',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'es',
                'nom' => 'Español',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
