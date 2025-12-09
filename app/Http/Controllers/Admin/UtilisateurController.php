<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use App\Models\Role;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $utilisateurs = Utilisateur::with(['role', 'langue'])->select('utilisateurs.*');

            return DataTables::of($utilisateurs)
                ->addColumn('role_nom', function($utilisateur) {
                    return $utilisateur->role->nom_role ?? 'Non défini';
                })
                ->addColumn('langue_nom', function($utilisateur) {
                    return $utilisateur->langue->nom ?? 'Non défini';
                })
                ->addColumn('statut_badge', function($utilisateur) {
                    return $utilisateur->statut ?
                        '<span class="badge badge-success">Actif</span>' :
                        '<span class="badge badge-danger">Inactif</span>';
                })
                ->addColumn('sexe_badge', function($utilisateur) {
                    $class = $utilisateur->sexe === 'M' ? 'primary' : ($utilisateur->sexe === 'F' ? 'danger' : 'secondary');
                    $text = $utilisateur->sexe === 'M' ? 'Homme' : ($utilisateur->sexe === 'F' ? 'Femme' : 'Autre');
                    return '<span class="badge badge-' . $class . '">' . $text . '</span>';
                })
                ->addColumn('actions', function($utilisateur) {
                    return '
                        <div class="btn-group">
                            <a href="' . route('admin.utilisateurs.show', $utilisateur) . '" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="' . route('admin.utilisateurs.edit', $utilisateur) . '" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="' . route('admin.utilisateurs.destroy', $utilisateur) . '" method="POST" class="d-inline">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cet utilisateur ?\')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    ';
                })
                ->rawColumns(['statut_badge', 'sexe_badge', 'actions'])
                ->make(true);
        }

        return view('admin.utilisateurs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $langues = Langue::all();
        return view('admin.utilisateurs.create', compact('roles', 'langues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'nullable|string|max:100',
            'email' => 'required|string|email|max:150|unique:utilisateurs',
            'mot_de_passe' => 'required|string|min:8|confirmed',
            'sexe' => 'required|in:M,F,Autre',
            'date_naissance' => 'nullable|date',
            'id_role' => 'nullable|exists:roles,id_role',
            'id_langue' => 'nullable|exists:langues,id_langue',
            'statut' => 'boolean',
        ]);

        Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
            'sexe' => $request->sexe,
            'date_naissance' => $request->date_naissance,
            'id_role' => $request->id_role,
            'id_langue' => $request->id_langue,
            'statut' => $request->statut ?? 1,
        ]);

        return redirect()->route('admin.utilisateurs.index')
            ->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        $utilisateur->load(['role', 'langue', 'contenus', 'commentaires', 'notes', 'paiements']);
        return view('admin.utilisateurs.show', compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utilisateur $utilisateur)
    {
        $roles = Role::all();
        $langues = Langue::all();
        return view('admin.utilisateurs.edit', compact('utilisateur', 'roles', 'langues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'nullable|string|max:100',
            'email' => 'required|string|email|max:150|unique:utilisateurs,email,' . $utilisateur->id,
            'mot_de_passe' => 'nullable|string|min:8|confirmed',
            'sexe' => 'required|in:M,F,Autre',
            'date_naissance' => 'nullable|date',
            'id_role' => 'nullable|exists:roles,id_role',
            'id_langue' => 'nullable|exists:langues,id_langue',
            'statut' => 'boolean',
        ]);

        $data = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'sexe' => $request->sexe,
            'date_naissance' => $request->date_naissance,
            'id_role' => $request->id_role,
            'id_langue' => $request->id_langue,
            'statut' => $request->statut ?? 1,
        ];

        if ($request->filled('mot_de_passe')) {
            $data['mot_de_passe'] = Hash::make($request->mot_de_passe);
        }

        $utilisateur->update($data);

        return redirect()->route('admin.utilisateurs.index')
            ->with('success', 'Utilisateur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        // Vérifier si l'utilisateur a des contenus, commentaires, etc.
        if ($utilisateur->contenus()->count() > 0) {
            return redirect()->route('admin.utilisateurs.index')
                ->with('error', 'Impossible de supprimer cet utilisateur car il a des contenus associés.');
        }

        $utilisateur->delete();

        return redirect()->route('admin.utilisateurs.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }
}
