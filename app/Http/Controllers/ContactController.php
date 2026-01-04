<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the contact.
     */
    public function index()
    {
        return view('front.contact');
    }

    /**
     * Store a newly created contact in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'institution' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Logique pour envoyer l'email (à implémenter)
        
        return redirect()->route('contact.index')
            ->with('success', 'Votre message a été envoyé avec succès! Nous vous répondrons dans les plus brefs délais.');
    }
}
