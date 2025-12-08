<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvenementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evenements = [
            [
                'titre' => 'Festival International de Ouidah',
                'description' => 'Célébration culturelle majeure mettant en valeur les traditions vodoun et les arts béninois.',
                'date_debut' => now()->addDays(30)->format('Y-m-d'),
                'heure_debut' => '18:00',
                'lieu' => 'Place des Zoungou, Ouidah',
                'prix' => 5000,
                'organisateur' => 'Ministère de la Culture',
                'statut' => true,
            ],
            [
                'titre' => 'Festival des Arts de Porto-Novo',
                'description' => 'Exposition d\'art contemporain et traditionnel béninois avec performances artistiques.',
                'date_debut' => now()->addDays(60)->format('Y-m-d'),
                'heure_debut' => '10:00',
                'lieu' => 'Musée Honmé, Porto-Novo',
                'prix' => 2000,
                'organisateur' => 'Association des Artistes Béninois',
                'statut' => true,
            ],
            [
                'titre' => 'Nuit des Masques',
                'description' => 'Spectacle traditionnel des masques dan et egungun, héritage culturel ancestral.',
                'date_debut' => now()->addDays(45)->format('Y-m-d'),
                'heure_debut' => '20:00',
                'lieu' => 'Palais Royal d\'Abomey',
                'prix' => 10000,
                'organisateur' => 'Communauté Dan',
                'statut' => true,
            ],
        ];

        foreach ($evenements as $evenement) {
            \App\Models\Evenement::create($evenement);
        }
    }
}
