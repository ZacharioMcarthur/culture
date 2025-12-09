<?php

use App\Http\Controllers\Admin\UtilisateurController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\LangueController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ContenuController as AdminContenuController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\CommentaireController as AdminCommentaireController;
use App\Http\Controllers\Admin\NoteController as AdminNoteController;
use App\Http\Controllers\Admin\PaiementController as AdminPaiementController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contenu/{slug}', [ContenuController::class, 'show'])->name('contenu.show');

// Routes d'authentification (Breeze)
require __DIR__.'/auth.php';

// Routes utilisateur authentifié
Route::middleware('auth')->group(function () {
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Commentaires et notes
    Route::post('/commentaire', [CommentaireController::class, 'store'])->name('commentaire.store');
    Route::post('/note', [NoteController::class, 'store'])->name('note.store');

    // Paiements
    Route::post('/commande/{contenu}', [PaiementController::class, 'initier'])->name('paiement.initier');
    Route::post('/paiement/webhook', [PaiementController::class, 'webhook'])->name('paiement.webhook');
});

// Routes admin (préfixe admin/{nom_table})
Route::prefix('admin')->middleware(['auth', 'role:Administrateur'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Routes pour chaque table
    Route::resource('utilisateurs', UtilisateurController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('langues', LangueController::class);
    Route::resource('categories', CategorieController::class);
    Route::resource('contenus', AdminContenuController::class);
    Route::resource('medias', MediaController::class);
    Route::resource('commentaires', AdminCommentaireController::class);
    Route::resource('notes', AdminNoteController::class);
    Route::resource('paiements', AdminPaiementController::class);
    Route::resource('settings', SettingController::class);
});
