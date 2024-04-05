<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlasacController;
use App\Http\Controllers\OpstinaController;

// Redirekcija da login strana bude pocetna umesto dashboard
Route::get('/', function () {
    return redirect('/login');
});

// Autentikacija prilikom logovanja
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Operacije sa profilnim nalogom
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Form submission
Route::post('/submit-glasac', [GlasacController::class, 'store']);
// Učitavanje opstina u formu
Route::get('/opstine', [OpstinaController::class, 'getOpstine']);
// Stranica tabele
Route::get('/show-table', [GlasacController::class, 'showTable'])->name('show.table');
Route::get('/load-table', [GlasacController::class, 'loadTable'])->name('load.table');
// Editovanje glasača
Route::get('/glasac/{id}/edit', [GlasacController::class, 'getGlasacForma'])->name('glasac.edit');
Route::put('/glasac/{id}/update',[GlasacController::class, 'updateGlasac'])->name('glasac.update');
Route::post('/glasac/{id}/delete', [GlasacController::class, 'deleteGlasac'])->name('glasac.delete');
require __DIR__.'/auth.php';
