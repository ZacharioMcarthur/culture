<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer les 6 derniers éléments de chaque catégorie actifs depuis la table contenus
        // Récupérer les contenus par type (basé sur les vraies données de la DB)
        $histoires = DB::table('contenus')
            ->join('type_contenus', 'contenus.id_type_contenu', '=', 'type_contenus.id')
            ->where('contenus.statut', 'valide')
            ->where('type_contenus.nom_contenu', 'Histoire/Conte')
            ->select('contenus.*', 'type_contenus.nom_contenu')
            ->latest('contenus.created_at')
            ->take(6)
            ->get();

        $plats = DB::table('contenus')
            ->join('type_contenus', 'contenus.id_type_contenu', '=', 'type_contenus.id')
            ->where('contenus.statut', 'valide')
            ->where('type_contenus.nom_contenu', 'Recette')
            ->select('contenus.*', 'type_contenus.nom_contenu')
            ->latest('contenus.created_at')
            ->take(6)
            ->get();

        $articles = DB::table('contenus')
            ->join('type_contenus', 'contenus.id_type_contenu', '=', 'type_contenus.id')
            ->where('contenus.statut', 'valide')
            ->where('type_contenus.nom_contenu', 'Article culturel')
            ->select('contenus.*', 'type_contenus.nom_contenu')
            ->latest('contenus.created_at')
            ->take(6)
            ->get();

        return view('home', compact('histoires', 'plats', 'articles'));
    }
}
