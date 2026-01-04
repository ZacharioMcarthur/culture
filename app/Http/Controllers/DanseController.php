<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DanseController extends Controller
{
    /**
     * Display a listing of the danses.
     */
    public function index()
    {
        // Données simulées pour les danses
        $danses = [
            (object) [
                'id' => 1,
                'nom' => 'Danse Zinli',
                'description' => 'La danse Zinli est une danse traditionnelle béninoise originaire du peuple Fon. Elle est souvent exécutée lors des célébrations importantes et des cérémonies royales.',
                'origine' => 'Peuple Fon',
                'region' => 'Abomey',
                'video' => 'egoun.mp4',
                'note' => 4.8,
                'commentaires' => 34,
                'duree' => '5 min'
            ],
            (object) [
                'id' => 2,
                'nom' => 'Danse Agbadja',
                'description' => 'Danse traditionnelle exécutée lors des cérémonies de mariage et de baptême. Elle se caractérise par ses mouvements gracieux et ses costumes colorés.',
                'origine' => 'Peuple Fon',
                'region' => 'Cotonou',
                'video' => 'ouidah-presentation.mp4',
                'note' => 4.6,
                'commentaires' => 28,
                'duree' => '8 min'
            ],
            (object) [
                'id' => 3,
                'nom' => 'Danse Tchébé',
                'description' => 'Rythme endiablé qui accompagne les festivals et les célébrations populaires. Cette danse est très énergique et entraînante.',
                'origine' => 'Peuple Adja',
                'region' => 'Parakou',
                'video' => 'egoun.mp4',
                'note' => 4.7,
                'commentaires' => 41,
                'duree' => '6 min'
            ],
            (object) [
                'id' => 4,
                'nom' => 'Danse Kpétou',
                'description' => 'Danse sacrée exécutée lors des rituels traditionnels et des cérémonies ancestrales. Elle est très spirituelle et symbolique.',
                'origine' => 'Peuple Fon',
                'region' => 'Ouidah',
                'video' => 'ouidah-presentation.mp4',
                'note' => 4.9,
                'commentaires' => 52,
                'duree' => '10 min'
            ],
            (object) [
                'id' => 5,
                'nom' => 'Danse Sakpata',
                'description' => 'Danse dédiée au dieu Sakpata, divinité de la maladie et de la guérison dans la culture béninoise.',
                'origine' => 'Peuple Fon',
                'region' => 'Abomey',
                'video' => 'egoun.mp4',
                'note' => 4.5,
                'commentaires' => 19,
                'duree' => '7 min'
            ],
            (object) [
                'id' => 6,
                'nom' => 'Danse Adjogan',
                'description' => 'Danse traditionnelle du peuple Fon, souvent exécutée par les femmes âgées lors des cérémonies importantes.',
                'origine' => 'Peuple Fon',
                'region' => 'Allada',
                'video' => 'ouidah-presentation.mp4',
                'note' => 4.4,
                'commentaires' => 23,
                'duree' => '12 min'
            ]
        ];

        return view('front.danses', compact('danses'));
    }
}
