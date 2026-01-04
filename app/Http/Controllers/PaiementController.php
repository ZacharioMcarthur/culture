<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Contenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaiementController extends Controller
{
    /**
     * Initialiser un paiement pour un contenu
     */
    public function initier(Request $request, $contenuId)
    {
        // Vérifier que l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Vous devez être connecté pour accéder à ce contenu.');
        }

        $user = Auth::user();
        $contenu = Contenu::findOrFail($contenuId);

        // Vérifier que le contenu est payant
        if ($contenu->statut !== 'payant') {
            return redirect()->route('contenu.show', $contenu->slug)
                ->with('info', 'Ce contenu est gratuit.');
        }

        // Vérifier si l'utilisateur a déjà payé pour ce contenu
        $paiementExistant = Paiement::where('id_utilisateur', $user->id)
            ->where('id_contenu', $contenu->id_contenu)
            ->where('statut', 'réussi')
            ->first();

        if ($paiementExistant) {
            return redirect()->route('contenu.show', $contenu->slug)
                ->with('success', 'Vous avez déjà accès à ce contenu.');
        }

        // Créer un nouveau paiement
        $paiement = Paiement::create([
            'id_utilisateur' => $user->id,
            'id_contenu' => $contenu->id_contenu,
            'montant' => $contenu->prix ?? 0,
            'statut' => 'initié',
            'méthode' => 'en_attente',
            'payload' => [
                'contenu_titre' => $contenu->titre,
                'contenu_slug' => $contenu->slug,
            ],
        ]);

        Log::info('Paiement initié', [
            'paiement_id' => $paiement->id_paiement,
            'user_id' => $user->id,
            'contenu_id' => $contenu->id_contenu,
            'montant' => $paiement->montant,
        ]);

        // Simuler le processus de paiement (dans un vrai système, on redirigerait vers une passerelle de paiement)
        // Pour l'instant, on simule un paiement réussi après confirmation
        return view('paiement.confirmation', compact('paiement', 'contenu'));
    }

    /**
     * Confirmer un paiement (simulation)
     */
    public function confirmer(Request $request, $paiementId)
    {
        $paiement = Paiement::findOrFail($paiementId);

        // Vérifier que l'utilisateur est le propriétaire du paiement
        if ($paiement->id_utilisateur !== Auth::id()) {
            abort(403, 'Accès non autorisé.');
        }

        // Vérifier que le paiement est en statut initié
        if ($paiement->statut !== 'initié') {
            return redirect()->route('home')
                ->with('error', 'Ce paiement a déjà été traité.');
        }

        // Simuler un paiement réussi
        $paiement->update([
            'statut' => 'réussi',
            'méthode' => 'simulation',
            'payload' => array_merge($paiement->payload ?? [], [
                'date_paiement' => now()->toDateTimeString(),
                'simulation' => true,
            ]),
        ]);

        Log::info('Paiement confirmé', [
            'paiement_id' => $paiement->id_paiement,
            'user_id' => $paiement->id_utilisateur,
        ]);

        $contenu = $paiement->contenu;

        return redirect()->route('contenu.show', $contenu->slug)
            ->with('success', 'Paiement effectué avec succès ! Vous avez maintenant accès au contenu.');
    }

    /**
     * Annuler un paiement
     */
    public function annuler(Request $request, $paiementId)
    {
        $paiement = Paiement::findOrFail($paiementId);

        // Vérifier que l'utilisateur est le propriétaire du paiement
        if ($paiement->id_utilisateur !== Auth::id()) {
            abort(403, 'Accès non autorisé.');
        }

        // Annuler le paiement
        $paiement->update([
            'statut' => 'échoué',
        ]);

        return redirect()->route('home')
            ->with('info', 'Paiement annulé.');
    }

    /**
     * Webhook pour les notifications de paiement (pour intégration future avec une passerelle)
     */
    public function webhook(Request $request)
    {
        // Cette méthode sera utilisée pour recevoir les notifications de paiement
        // depuis une passerelle de paiement externe (FedaPay, Stripe, etc.)
        
        Log::info('Webhook de paiement reçu', [
            'payload' => $request->all(),
        ]);

        // TODO: Implémenter la logique de traitement du webhook
        // selon la passerelle de paiement choisie

        return response()->json(['status' => 'received']);
    }
}
