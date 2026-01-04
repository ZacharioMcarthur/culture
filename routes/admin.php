<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LanguesController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\TypeContenusController;
use App\Http\Controllers\TypeMediasController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MediasController;
use App\Http\Controllers\ContenusController;
use App\Http\Controllers\CommentairesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;

Route::prefix('/admin')->middleware('admin')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    // Resources
    Route::resource('langues', LanguesController::class);
    Route::resource('regions', RegionsController::class);
    Route::resource('typecontenus', TypeContenusController::class);
    Route::resource('typemedias', TypeMediasController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('users', UsersController::class);
    Route::resource('medias', MediasController::class);
    Route::resource('contenus', ContenusController::class);
    Route::resource('commentaires', CommentairesController::class);
    
    // Payments management
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');
    Route::post('/payments/{payment}/refund', [PaymentController::class, 'refund'])->name('payments.refund');
    
    // Statistics
    Route::get('/statistics', [HomeController::class, 'statistics'])->name('statistics');
    
    // Export
    Route::get('/export/users', [UsersController::class, 'export'])->name('export.users');
    Route::get('/export/contenus', [ContenusController::class, 'export'])->name('export.contenus');
    Route::get('/export/payments', [PaymentController::class, 'export'])->name('export.payments');
});
