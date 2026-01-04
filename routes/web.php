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
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// Routes publiques
Route::get('/', [ContenuController::class, 'accueil'])->name('accueil');
Route::get('/contenus/{slug}', [ContenuController::class, 'details'])->name('contenus.details');
Route::get('/contenus/tous', [ContenuController::class, 'tous'])->name('contenus.tous');

// Routes d'authentification (Breeze)
require __DIR__.'/auth.php';

// Routes utilisateur authentifié
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Paiements
    Route::get('/payment/initiate/{contenuId}', [PaymentController::class, 'initiate'])->name('payment.initiate');
    Route::get('/payment/history', [PaymentController::class, 'history'])->name('payment.history');
    Route::get('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');

    // Commentaires
    Route::post('/commentaires/user-store', [\App\Http\Controllers\ContenuController::class, 'storeCommentaire'])->name('commentaires.userStore');

    // Logout
    Route::post('/logout', function () {
        auth()->logout();
        return redirect('/');
    })->name('logout');
});

// Routes admin (préfixe admin/{nom_table})
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
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
