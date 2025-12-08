<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            ['nom_region' => 'Alibori', 'type_region' => 'departement', 'description' => 'Nord-est du Bénin'],
            ['nom_region' => 'Atacora', 'type_region' => 'departement', 'description' => 'Nord-ouest du Bénin'],
            ['nom_region' => 'Atlantique', 'type_region' => 'departement', 'description' => 'Sud-centre du Bénin'],
            ['nom_region' => 'Borgou', 'type_region' => 'departement', 'description' => 'Nord-centre du Bénin'],
            ['nom_region' => 'Collines', 'type_region' => 'departement', 'description' => 'Centre du Bénin'],
            ['nom_region' => 'Donga', 'type_region' => 'departement', 'description' => 'Nord-ouest du Bénin'],
            ['nom_region' => 'Kouffo', 'type_region' => 'departement', 'description' => 'Sud-ouest du Bénin'],
            ['nom_region' => 'Littoral', 'type_region' => 'departement', 'description' => 'Petit département comprenant Cotonou'],
            ['nom_region' => 'Mono', 'type_region' => 'departement', 'description' => 'Sud-ouest du Bénin'],
            ['nom_region' => 'Ouémé', 'type_region' => 'departement', 'description' => 'Sud-est du Bénin'],
            ['nom_region' => 'Plateau', 'type_region' => 'departement', 'description' => 'Centre-est du Bénin'],
            ['nom_region' => 'Zou', 'type_region' => 'departement', 'description' => 'Centre-sud du Bénin'],
            // Communes sélectionnées
            ['nom_region' => 'Banikoara', 'type_region' => 'commune'],
            ['nom_region' => 'Gogounou', 'type_region' => 'commune'],
            ['nom_region' => 'Kandi', 'type_region' => 'commune'],
            ['nom_region' => 'Karimama', 'type_region' => 'commune'],
            ['nom_region' => 'Malanville', 'type_region' => 'commune'],
            ['nom_region' => 'Ouidah', 'type_region' => 'commune'],
            ['nom_region' => 'Porto Novo', 'type_region' => 'commune'],
            ['nom_region' => 'Cotonou', 'type_region' => 'ville'],
            ['nom_region' => 'Parakou', 'type_region' => 'commune'],
            ['nom_region' => 'Djougou', 'type_region' => 'commune'],
            ['nom_region' => 'Natitingou', 'type_region' => 'commune'],
            ['nom_region' => 'Lokossa', 'type_region' => 'commune'],
            ['nom_region' => 'Abomey', 'type_region' => 'commune'],
            ['nom_region' => 'Bohicon', 'type_region' => 'commune'],
        ];

        foreach ($regions as $region) {
            \App\Models\Region::create($region);
        }
    }
}
