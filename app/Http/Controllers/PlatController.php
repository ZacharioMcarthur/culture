<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlatController extends Controller
{
    /**
     * Display a listing of the plats.
     */
    public function index()
    {
        // Données simulées pour les plats
        $plats = [
            (object) [
                'id' => 1,
                'titre' => 'Amiwo',
                'description' => 'Plat traditionnel à base de maïs, accompagné de sauce épicée aux légumes locaux.',
                'temps_preparation' => '45 min',
                'difficulte' => 'Facile',
                'region' => 'Abomey',
                'image' => 'amiwo.jpg',
                'note' => 4.5,
                'commentaires' => 23
            ],
            (object) [
                'id' => 2,
                'titre' => 'Akassa',
                'description' => 'Spécialité béninoise riche en protéines, servie avec des bananes plantain frites.',
                'temps_preparation' => '30 min',
                'difficulte' => 'Moyen',
                'region' => 'Porto-Novo',
                'image' => 'akassa.jpg',
                'note' => 4.2,
                'commentaires' => 18
            ],
            (object) [
                'id' => 3,
                'titre' => 'Gari Foto',
                'description' => 'Mets typique du sud Bénin, préparé avec du gari et des ingrédients locaux.',
                'temps_preparation' => '60 min',
                'difficulte' => 'Difficile',
                'region' => 'Cotonou',
                'image' => 'garifoto.jpg',
                'note' => 4.8,
                'commentaires' => 31
            ],
            (object) [
                'id' => 4,
                'titre' => 'Atassi',
                'description' => 'Soupe traditionnelle béninoise, souvent consommée lors des cérémonies familiales.',
                'temps_preparation' => '90 min',
                'difficulte' => 'Moyen',
                'region' => 'Ouidah',
                'image' => 'atassi.jpg',
                'note' => 4.3,
                'commentaires' => 15
            ],
            (object) [
                'id' => 5,
                'titre' => 'Tchatchanga',
                'description' => 'Plat à base de poisson fumé, spécialité du peuple Fon.',
                'temps_preparation' => '120 min',
                'difficulte' => 'Difficile',
                'region' => 'Grand-Popo',
                'image' => 'tchatchanga.jpg',
                'note' => 4.7,
                'commentaires' => 27
            ],
            (object) [
                'id' => 6,
                'titre' => 'Wassa Wassa',
                'description' => 'Purée de manioc accompagnée de viande ou de poisson, plat très populaire.',
                'temps_preparation' => '75 min',
                'difficulte' => 'Facile',
                'region' => 'Parakou',
                'image' => 'wassawassa.jpg',
                'note' => 4.6,
                'commentaires' => 22
            ]
        ];

        return view('front.plats', compact('plats'));
    }
}
