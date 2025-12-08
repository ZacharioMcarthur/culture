<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer les 6 derniers éléments de chaque catégorie actifs depuis la table contenus
        $plats = DB::table('contenus')
            ->join('type_contenus', 'contenus.id_type_contenu', '=', 'type_contenus.id')
            ->where('contenus.statut', 'valide')
            ->where('type_contenus.nom_contenu', 'Recette')
            ->select('contenus.*', 'type_contenus.nom_contenu')
            ->latest('contenus.created_at')
            ->take(6)
            ->get();

        $lieux = DB::table('contenus')
            ->join('type_contenus', 'contenus.id_type_contenu', '=', 'type_contenus.id')
            ->where('contenus.statut', 'valide')
            ->where('type_contenus.nom_contenu', 'Article culturel')
            ->where('contenus.titre', 'like', '%lieu%')
            ->select('contenus.*', 'type_contenus.nom_contenu')
            ->latest('contenus.created_at')
            ->take(6)
            ->get();

        $danses = DB::table('contenus')
            ->join('type_contenus', 'contenus.id_type_contenu', '=', 'type_contenus.id')
            ->where('contenus.statut', 'valide')
            ->where('contenus.titre', 'like', '%danse%')
            ->select('contenus.*', 'type_contenus.nom_contenu')
            ->latest('contenus.created_at')
            ->take(6)
            ->get();

        $evenements = DB::table('contenus')
            ->join('type_contenus', 'contenus.id_type_contenu', '=', 'type_contenus.id')
            ->where('contenus.statut', 'valide')
            ->where('contenus.titre', 'like', '%festival%')
            ->select('contenus.*', 'type_contenus.nom_contenu')
            ->latest('contenus.created_at')
            ->take(6)
            ->get();

        return view('home', compact('plats', 'lieux', 'danses', 'evenements'));
    }
}
