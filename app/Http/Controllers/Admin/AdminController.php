<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use App\Models\Contenu;
use App\Models\Commentaire;
use App\Models\Media;
use App\Models\Region;
use App\Models\Langue;
use App\Models\Role;
use App\Models\TypeContenu;
use App\Models\TypeMedia;
use App\Models\Parler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function dashboard()
    {
        // Statistiques pour le dashboard
        $stats = [
            'utilisateurs' => Utilisateur::count(),
            'contenus' => Contenu::count(),
            'commentaires' => Commentaire::count(),
            'medias' => Media::count(),
            'regions' => Region::count(),
            'langues' => Langue::count(),
            'contenus_valides' => Contenu::where('statut', 'valide')->count(),
            'contenus_attente' => Contenu::where('statut', 'en_attente')->count(),
        ];

        // Données récentes
        $recentUsers = Utilisateur::latest()->take(5)->get();
        $recentContents = Contenu::with('auteur', 'typeContenu')->latest()->take(5)->get();
        $recentComments = Commentaire::with('utilisateur', 'contenu')->latest()->take(5)->get();

        // Graphiques
        $contentByType = DB::table('contenus')
            ->join('type_contenus', 'contenus.id_type_contenu', '=', 'type_contenus.id')
            ->select('type_contenus.nom_contenu', DB::raw('count(*) as count'))
            ->groupBy('type_contenus.nom_contenu')
            ->get();

        $usersByRole = DB::table('utilisateurs')
            ->join('roles', 'utilisateurs.id_role', '=', 'roles.id')
            ->select('roles.nom_role', DB::raw('count(*) as count'))
            ->groupBy('roles.nom_role')
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentUsers',
            'recentContents',
            'recentComments',
            'contentByType',
            'usersByRole'
        ));
    }

    public function utilisateurs()
    {
        $utilisateurs = Utilisateur::with('role', 'langue')->paginate(10);
        return view('admin.utilisateurs.index', compact('utilisateurs'));
    }

    public function contenus()
    {
        $contenus = Contenu::with('auteur', 'region', 'langue', 'typeContenu', 'moderateur')->paginate(10);
        return view('admin.contenus.index', compact('contenus'));
    }

    public function commentaires()
    {
        $commentaires = Commentaire::with('utilisateur', 'contenu')->paginate(10);
        return view('admin.commentaires.index', compact('commentaires'));
    }

    public function medias()
    {
        $medias = Media::with('contenu', 'typeMedia', 'langue')->paginate(10);
        return view('admin.medias.index', compact('medias'));
    }

    public function regions()
    {
        $regions = Region::paginate(10);
        return view('admin.regions.index', compact('regions'));
    }

    public function langues()
    {
        $langues = Langue::paginate(10);
        return view('admin.langues.index', compact('langues'));
    }

    public function roles()
    {
        $roles = Role::paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    public function typeContenus()
    {
        $typeContenus = TypeContenu::paginate(10);
        return view('admin.type_contenus.index', compact('typeContenus'));
    }

    public function typeMedias()
    {
        $typeMedias = TypeMedia::paginate(10);
        return view('admin.type_medias.index', compact('typeMedias'));
    }

    public function parler()
    {
        $parler = Parler::with('region', 'langue')->paginate(10);
        return view('admin.parler.index', compact('parler'));
    }
}