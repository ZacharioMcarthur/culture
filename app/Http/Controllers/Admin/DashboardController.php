<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contenu;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Note;
use App\Models\Media;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques générales
        $totalUsers = User::count();
        $totalContenus = Contenu::count();
        $totalCategories = Categorie::count();
        $totalCommentaires = Commentaire::count();
        $totalNotes = Note::count();
        $totalMedias = Media::count();
        
        // Statistiques de paiement
        $paiementsReussis = Paiement::where('statut', 'réussi')->count();
        $revenusTotaux = Paiement::where('statut', 'réussi')->sum('montant');
        $paiementsEnAttente = Paiement::where('statut', 'initié')->count();
        
        // Contenus par statut
        $contenusPubliés = Contenu::where('statut', 'publié')->count();
        $contenusPayants = Contenu::where('statut', 'payant')->count();
        $contenusBrouillons = Contenu::whereNotIn('statut', ['publié', 'payant'])->count();
        
        // Paiements des 7 derniers jours
        $paiementsParJour = Paiement::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as total'),
                DB::raw('SUM(CASE WHEN statut = "réussi" THEN montant ELSE 0 END) as revenus')
            )
            ->where('created_at', '>=', Carbon::now()->subDays(6)->startOfDay())
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Préparer les données pour le graphique
        $dates = [];
        $totauxPaiements = [];
        $revenus = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dates[] = Carbon::now()->subDays($i)->locale('fr')->isoFormat('ddd D MMM');
            
            $paiement = $paiementsParJour->firstWhere('date', $date);
            $totauxPaiements[] = $paiement ? $paiement->total : 0;
            $revenus[] = $paiement ? (float) $paiement->revenus : 0;
        }

        // Utilisateurs des 12 derniers mois
        $usersParMois = User::select(
                DB::raw('MONTH(date_inscription) as mois'),
                DB::raw('YEAR(date_inscription) as annee'),
                DB::raw('COUNT(*) as total')
            )
            ->where('date_inscription', '>=', Carbon::now()->subMonths(11)->startOfMonth())
            ->groupBy('mois', 'annee')
            ->orderBy('annee', 'asc')
            ->orderBy('mois', 'asc')
            ->get();

        $mois = [];
        $usersData = [];
        
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $mois[] = $date->locale('fr')->isoFormat('MMM YYYY');
            
            $user = $usersParMois->first(function($u) use ($date) {
                return $u->mois == $date->month && $u->annee == $date->year;
            });
            $usersData[] = $user ? $user->total : 0;
        }

        // Contenus récents
        $contenusRecents = Contenu::with('auteur', 'categorie')
            ->latest()
            ->take(10)
            ->get();

        // Paiements récents
        $paiementsRecents = Paiement::with('utilisateur', 'contenu')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalUsers',
            'totalContenus',
            'totalCategories',
            'totalCommentaires',
            'totalNotes',
            'totalMedias',
            'paiementsReussis',
            'revenusTotaux',
            'paiementsEnAttente',
            'contenusPubliés',
            'contenusPayants',
            'contenusBrouillons',
            'dates',
            'totauxPaiements',
            'revenus',
            'mois',
            'usersData',
            'contenusRecents',
            'paiementsRecents'
        ));
    }
}
