<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Commentaire;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContenuController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $contenu = Contenu::with(['categorie', 'auteur', 'medias', 'commentaires.utilisateur', 'notes'])
            ->where('slug', $slug)
            ->where('statut', 'publié')
            ->firstOrFail();

        // Vérifier si l'utilisateur a accès au contenu payant
        if ($contenu->statut === 'payant') {
            if (!Auth::check()) {
                return redirect()->route('login')
                    ->with('error', 'Vous devez être connecté pour accéder à ce contenu.');
            }

            // Vérifier si l'utilisateur a payé pour ce contenu
            $aPaye = Auth::user()->paiements()
                ->where('id_contenu', $contenu->id_contenu)
                ->where('statut', 'réussi')
                ->exists();

            if (!$aPaye) {
                return redirect()->route('home')
                    ->with('error', 'Vous devez payer pour accéder à ce contenu premium.');
            }
        }

        // Incrémenter le nombre de vues
        $contenu->incrementerVues();

        // Calculer la moyenne des notes
        $moyenneNotes = $contenu->moyenneNotes();
        $nombreNotes = $contenu->nombreNotes();

        // Récupérer les commentaires (un par utilisateur)
        $commentaires = $contenu->commentaires()->with('utilisateur')->get();

        return view('contenu.show', compact('contenu', 'moyenneNotes', 'nombreNotes', 'commentaires'));
    }
}
