<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Commentaire;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function index(Request $request, $type)
    {
        // Types de contenus disponibles (basés sur les données de la DB)
        $typesDisponibles = [
            'histoires' => 'Histoire/Conte',
            'plats' => 'Recette',
            'articles' => 'Article culturel'
        ];

        if (!array_key_exists($type, $typesDisponibles)) {
            abort(404);
        }

        $nomType = $typesDisponibles[$type];

        // Récupérer les contenus validés de ce type
        $contenus = Contenu::where('statut', 'valide')
            ->whereHas('typeContenu', function($query) use ($nomType) {
                $query->where('nom_contenu', $nomType);
            })
            ->with(['auteur', 'region', 'langue', 'typeContenu', 'medias'])
            ->paginate(12);

        return view('contents.index', compact('contenus', 'type', 'nomType'));
    }

    public function show(Request $request, $id)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à ce contenu.');
        }

        $contenu = Contenu::with(['auteur', 'region', 'langue', 'typeContenu', 'medias'])->findOrFail($id);

        // Vérifier si le contenu est valide
        if ($contenu->statut !== 'valide') {
            abort(404);
        }

        // Vérifier si l'utilisateur a payé pour ce contenu (sauf admin)
        $user = Auth::user();
        if (!$user->isAdmin() && !$this->hasPaidForContent($user->id, $id)) {
            return redirect()->route('content.payment.required', $id)
                ->with('warning', 'Vous devez payer pour accéder à ce contenu complet.');
        }

        // Récupérer les commentaires
        $commentaires = $contenu->commentaires()
            ->with('utilisateur')
            ->orderBy('date', 'desc')
            ->get();

        return view('contents.show', compact('contenu', 'commentaires'));
    }

    public function paymentRequired($id)
    {
        $contenu = Contenu::findOrFail($id);

        // Aperçu limité du contenu
        $preview = [
            'titre' => $contenu->titre,
            'type' => $contenu->typeContenu->nom_contenu ?? 'N/A',
            'region' => $contenu->region->nom_region ?? 'N/A',
            'preview_text' => Str::limit($contenu->texte, 200),
            'prix' => 5.00 // Prix fixe pour l'exemple
        ];

        return view('contents.payment_required', compact('contenu', 'preview'));
    }

    public function processPayment(Request $request, $id)
    {
        $contenu = Contenu::findOrFail($id);
        $user = Auth::user();

        // Simulation de paiement réussi
        // Dans un vrai projet, intégrer une API de paiement (Stripe, PayPal, etc.)

        // Marquer comme payé (table paiement à créer dans un vrai projet)
        $this->markAsPaid($user->id, $id);

        return redirect()->route('content.show', $id)
            ->with('success', 'Paiement effectué avec succès ! Vous pouvez maintenant accéder au contenu complet.');
    }

    public function storeComment(Request $request, $contentId)
    {
        $request->validate([
            'texte' => 'required|string|max:1000',
            'note' => 'nullable|integer|min:1|max:5'
        ]);

        $user = Auth::user();
        $contenu = Contenu::findOrFail($contentId);

        // Vérifier si l'utilisateur a déjà commenté ce contenu
        $existingComment = Commentaire::where('id_utilisateur', $user->id)
            ->where('id_contenu', $contentId)
            ->first();

        if ($existingComment) {
            return back()->with('error', 'Vous avez déjà commenté ce contenu.');
        }

        Commentaire::create([
            'texte' => $request->texte,
            'note' => $request->note,
            'date' => now(),
            'id_utilisateur' => $user->id,
            'id_contenu' => $contentId
        ]);

        return back()->with('success', 'Votre commentaire a été ajouté.');
    }

    public function updateComment(Request $request, $commentId)
    {
        $request->validate([
            'texte' => 'required|string|max:1000',
            'note' => 'nullable|integer|min:1|max:5'
        ]);

        $user = Auth::user();
        $commentaire = Commentaire::findOrFail($commentId);

        // Vérifier si l'utilisateur peut modifier ce commentaire
        if (!$commentaire->canBeEditedBy($user)) {
            abort(403);
        }

        $commentaire->update([
            'texte' => $request->texte,
            'note' => $request->note
        ]);

        return back()->with('success', 'Votre commentaire a été modifié.');
    }

    public function deleteComment($commentId)
    {
        $user = Auth::user();
        $commentaire = Commentaire::findOrFail($commentId);

        // Vérifier si l'utilisateur peut supprimer ce commentaire
        if (!$commentaire->canBeDeletedBy($user)) {
            abort(403);
        }

        $commentaire->delete();

        return back()->with('success', 'Le commentaire a été supprimé.');
    }

    private function hasPaidForContent($userId, $contentId)
    {
        // Simulation - dans un vrai projet, vérifier dans une table paiements
        // Pour l'exemple, on considère que l'admin a toujours accès
        $user = Auth::find($userId);
        if ($user && $user->isAdmin()) {
            return true;
        }

        // Simulation de paiement - à remplacer par vraie logique
        return session()->has("paid_content_{$contentId}");
    }

    private function markAsPaid($userId, $contentId)
    {
        // Simulation - dans un vrai projet, enregistrer dans table paiements
        session()->put("paid_content_{$contentId}", true);
    }
}