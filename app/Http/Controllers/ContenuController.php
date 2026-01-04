<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Commentaire;
use App\Models\Note;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContenuController extends Controller
{
    /**
     * Page d'accueil avec les contenus récents
     */
    public function accueil()
    {
        $contenusRecents = Contenu::with(['categorie', 'medias'])
            ->where('statut', 'publié')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
            
        return view('front.accueil', compact('contenusRecents'));
    }

    /**
     * Page de détails d'un contenu avec vérification de paiement
     */
    public function details($slug)
    {
        $contenu = Contenu::with(['categorie', 'medias', 'commentaires.utilisateur'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Vérifier si le contenu est payant et si l'utilisateur a payé
        $hasPaid = false;
        $canAccess = true;
        
        if ($contenu->statut === 'payant' && Auth::check()) {
            $hasPaid = Payment::where('user_id', Auth::id())
                ->where('contenu_id', $contenu->id_contenu)
                ->where('status', 'approved')
                ->exists();
            $canAccess = $hasPaid;
        } elseif ($contenu->statut === 'payant') {
            $canAccess = false;
        }

        // Incrémenter le nombre de vues
        $contenu->increment('vues');

        return view('front.details', compact('contenu', 'hasPaid', 'canAccess'));
    }

    /**
     * Afficher tous les contenus
     */
    public function tous()
    {
        $contenus = Contenu::with(['categorie', 'medias'])
            ->where('statut', 'publié')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
            
        return view('front.tous', compact('contenus'));
    }

    /**
     * Store un commentaire sur un contenu
     */
    public function storeCommentaire(Request $request, $contenuId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Commentaire::create([
            'id_contenu' => $contenuId,
            'id_utilisateur' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès!');
    }
}
