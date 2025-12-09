<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParlerSeeder extends Seeder
{
    public function run(): void
    {
        // Exemple : Littoral -> Fon, Français
        DB::table('parler')->insert([
            ['region_id'=>8, 'langue_id'=>2], // Littoral - Fon
            ['region_id'=>8, 'langue_id'=>1], // Littoral - Français
            ['region_id'=>1, 'langue_id'=>6], // Alibori - Bariba
            ['region_id'=>1, 'langue_id'=>7], // Alibori - Dendi
            ['region_id'=>9, 'langue_id'=>5], // Mono - Mina
        ]);
    }
}
