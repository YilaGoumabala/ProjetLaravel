<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecteurController;
use App\Http\Controllers\VigileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/vigile', [VigileController::class, ('index')])->middleware(['auth', 'verified'])->name('vigile_index');
Route::get('/insertion_vigile', [VigileController::class, ('create')])->middleware(['auth', 'verified'])->name('inserer_vigile');
Route::post('/traitement_vigile', [VigileController::class, ('store')])->middleware(['auth', 'verified'])->name('traitement_vigile');

Route::get('/edite_vigile/{id}', [VigileController::class, "edit"])->middleware(['auth', 'verified'])->name('editer_vigile');
Route::post('/modif_vigile/{id}', [VigileController::class, "update"])->middleware(['auth', 'verified'])->name('modifier_vigile');
Route::get('/delete_vigile/{id}', [VigileController::class, "destroy"])->middleware(['auth', 'verified'])->name('supprimer_vigile');

Route::get('/editer/{id}', [SecteurController::class, "edit"])->middleware(['auth', 'verified'])->name('editer');
Route::get('/secteur', [SecteurController::class, ('index')])->middleware(['auth', 'verified'])->name('secteur');
Route::get('/insertion_secteur', [SecteurController::class, ('create')])->middleware(['auth', 'verified'])->name('inserer_secteur');
Route::post('/traitement_secteur', [SecteurController::class, ('store')])->middleware(['auth', 'verified'])->name('traitement_secteur');

Route::post('/modif_secteur/{id}', [SecteurController::class, "update"])->middleware(['auth', 'verified'])->name('modifier_secteur');
Route::get('/delete_secteur/{id}', [SecteurController::class, "destroy"])->middleware(['auth', 'verified'])->name('supprimer_secteur');

require __DIR__ . '/auth.php';
