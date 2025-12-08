<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $danses = [
            [
                'nom' => 'Gome',
                'description' => 'Danse traditionnelle du nord Bénin, exécutée lors de cérémonies importantes. Rythme syncopé accompagnant les tambours.',
                'region' => 'Nord',
                'signification' => 'Danse de célébration et de communion sociale',
                'instruments' => 'Tambours, flûtes, calebasses',
                'statut' => true,
            ],
            [
                'nom' => 'Sakpata',
                'description' => 'Danse rituelle dédiée au dieu de la variole dans la religion vodoun. Danse sacrée aux mouvements puissants.',
                'region' => 'Centre',
                'signification' => 'Cérémonie de protection et de guérison',
                'instruments' => 'Tambours sacrés, grelots',
                'statut' => true,
            ],
            [
                'nom' => 'Agbadja',
                'description' => 'Danse guerrière du royaume d\'Abomey, symbole de la puissance militaire dahoméenne.',
                'region' => 'Centre',
                'signification' => 'Célébration de la force et du courage',
                'instruments' => 'Tambours de guerre, trompettes',
                'statut' => true,
            ],
            [
                'nom' => 'Kpase',
                'description' => 'Danse traditionnelle des marchés, accompagnant les transactions commerciales.',
                'region' => 'Sud',
                'signification' => 'Danse de joie et d\'échange social',
                'instruments' => 'Tambours, cloches',
                'statut' => true,
            ],
        ];

        foreach ($danses as $danse) {
            \App\Models\Danse::create($danse);
        }
    }
}
