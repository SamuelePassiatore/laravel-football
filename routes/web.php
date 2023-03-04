<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rotte per gestire la risorsa Team
// Route::resource('teams', TeamController::class);


// # CESTINO

// Rotta per la lista delle squadre cestinate
Route::get('/teams/trash', [TeamController::class, 'trash'])->name('teams.trash.index');

// Rotta per ripristinare
Route::patch('/teams/{team}/restore', [TeamController::class, 'restore'])->name('teams.trash.restore');

// Rotta per eliminare definitivamente una squadra cestinata
Route::delete('/teams/{team}/drop', [TeamController::class, 'drop'])->name('teams.trash.drop');

// Rotta per eliminare tutto
Route::delete('/teams/drop', [TeamController::class, 'dropAll'])->name('teams.trash.dropAll');


// # CRUD


// Rotta lista team
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');

// Rotta per avre la pagina del form
Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');

// Rotta dettaglio team
Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');


// Rotta per SALVARE i dati sul DB di una nuova squadra
Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');

// Rotta per il form di modifica
Route::get('/teams/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');


// Rotta per l'update di una squadra
Route::put('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');


// Rotta per eliminare una squadra
Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
