<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Google OAuth Routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/utilisateur', [App\Http\Controllers\Admin\AdminController::class, 'utilisateurs'])->name('utilisateurs');
    Route::get('/contenu', [App\Http\Controllers\Admin\AdminController::class, 'contenus'])->name('contenus');
    Route::get('/commentaire', [App\Http\Controllers\Admin\AdminController::class, 'commentaires'])->name('commentaires');
    Route::get('/media', [App\Http\Controllers\Admin\AdminController::class, 'medias'])->name('medias');
    Route::get('/region', [App\Http\Controllers\Admin\AdminController::class, 'regions'])->name('regions');
    Route::get('/langue', [App\Http\Controllers\Admin\AdminController::class, 'langues'])->name('langues');
    Route::get('/role', [App\Http\Controllers\Admin\AdminController::class, 'roles'])->name('roles');
    Route::get('/type-contenu', [App\Http\Controllers\Admin\AdminController::class, 'typeContenus'])->name('type_contenus');
    Route::get('/type-media', [App\Http\Controllers\Admin\AdminController::class, 'typeMedias'])->name('type_medias');
    Route::get('/parler', [App\Http\Controllers\Admin\AdminController::class, 'parler'])->name('parler');
});

// Content Routes
Route::get('/contenus/{type}', [App\Http\Controllers\ContentController::class, 'index'])->name('contents.index');
Route::get('/contenu/{id}', [App\Http\Controllers\ContentController::class, 'show'])->name('content.show');

// Protected Content Routes (require auth)
Route::middleware('auth')->group(function () {
    // Payment routes
    Route::get('/contenu/{id}/paiement-requis', [App\Http\Controllers\ContentController::class, 'paymentRequired'])->name('content.payment.required');
    Route::post('/contenu/{id}/payer', [App\Http\Controllers\ContentController::class, 'processPayment'])->name('content.process.payment');

    // Comment routes
    Route::post('/contenu/{contentId}/commentaire', [App\Http\Controllers\ContentController::class, 'storeComment'])->name('content.comment.store');
    Route::put('/commentaire/{commentId}', [App\Http\Controllers\ContentController::class, 'updateComment'])->name('comment.update');
    Route::delete('/commentaire/{commentId}', [App\Http\Controllers\ContentController::class, 'deleteComment'])->name('comment.delete');
});

// Culture Routes - Temporarily disabled while adapting to new database structure

require __DIR__.'/auth.php';
