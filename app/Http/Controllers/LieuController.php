<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LieuController extends Controller
{
    /**
     * Display a listing of the lieux.
     */
    public function index()
    {
        // Données simulées pour les lieux
        $lieux = [
            (object) [
                'id' => 1,
                'nom' => 'Royal Palaces of Abomey',
                'description' => 'Site classé au patrimoine mondial de l\'UNESCO, témoignage de l\'histoire du royaume d\'Abomey.',
                'type' => 'Site historique',
                'region' => 'Abomey',
                'image' => 'Abomey_royal_palace_wall.jpg',
                'note' => 4.8,
                'visites' => 1250,
                'horaires' => '8h-18h',
                'prix' => '2000 FCFA'
            ],
            (object) [
                'id' => 2,
                'nom' => 'Pendjari National Park',
                'description' => 'Réserve naturelle abritant éléphants, lions et antilopes dans un paysage spectaculaire.',
                'type' => 'Parc naturel',
                'region' => 'Natitingou',
                'image' => 'parc-pendjari.jpg',
                'note' => 4.9,
                'visites' => 890,
                'horaires' => '6h-18h',
                'prix' => '500 FCFA'
            ],
            (object) [
                'id' => 3,
                'nom' => 'Village Lacustre Ganvié',
                'description' => 'Connu comme la "Venise d\'Afrique", village construit sur pilotis.',
                'type' => 'Village lacustre',
                'region' => 'Cotonou',
                'image' => 'Village-lacustre-ganvie.jpg',
                'note' => 4.7,
                'visites' => 2100,
                'horaires' => 'Ouvert 24/7',
                'prix' => 'Gratuit'
            ],
            (object) [
                'id' => 4,
                'nom' => 'Temple des Pythons',
                'description' => 'Site sacré d\'Ouidah, lieu de vénération des pythons dans la culture vodoun.',
                'type' => 'Site sacré',
                'region' => 'Ouidah',
                'image' => 'Temple_de_python_de_kpétou_gbo.png',
                'note' => 4.5,
                'visites' => 680,
                'horaires' => '9h-17h',
                'prix' => '1000 FCFA'
            ],
            (object) [
                'id' => 5,
                'nom' => 'Grande Mosquée de Porto-Novo',
                'description' => 'Chef-d\'œuvre de l\'architecture islamique au Bénin, construite au 19ème siècle.',
                'type' => 'Site religieux',
                'region' => 'Porto-Novo',
                'image' => 'Grande_Mosquee_de_Porto-Novo.jpg',
                'note' => 4.6,
                'visites' => 450,
                'horaires' => '5h-19h',
                'prix' => 'Gratuit'
            ],
            (object) [
                'id' => 6,
                'nom' => 'Plage d\'Ouidah',
                'description' => 'Destination touristique populaire avec ses eaux turquoise et ses activités nautiques.',
                'type' => 'Plage',
                'region' => 'Ouidah',
                'image' => 'Beach_of_Ouidah_Benin.jpg',
                'note' => 4.4,
                'visites' => 1800,
                'horaires' => 'Ouvert 24/7',
                'prix' => 'Gratuit'
            ]
        ];

        return view('front.lieux', compact('lieux'));
    }
}
