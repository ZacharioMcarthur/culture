<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeContenusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('type_contenus')->insert([
            ['nom_contenu'=>'Histoire/Conte'],
            ['nom_contenu'=>'Recette'],
            ['nom_contenu'=>'Article culturel'],
        ]);
    }
}
