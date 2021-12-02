<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    /* Ovu funkciju koristim da grupisem sve rute koje ce kroz autentifikaciju */


    Route::get('/', function () {

        return view('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/klijenti', [\App\Http\Controllers\KlijentisController::class, 'index'])->name('klijenti');
    Route::get('/klijenti/create', [\App\Http\Controllers\KlijentisController::class, 'create'])->name('kreirajKlijenta');
    Route::get('/klijenti/store', [\App\Http\Controllers\KlijentisController::class, 'store']);
    Route::get('/klijenti/edit/{id}', [\App\Http\Controllers\KlijentisController::class, 'edit']);
    Route::get('/klijenti/update/{id}', [\App\Http\Controllers\KlijentisController::class, 'update']);
    Route::get('/klijenti/delete/{id}', [\App\Http\Controllers\KlijentisController::class, 'destroy']);
    Route::get('/klijenti/show/{id}', [\App\Http\Controllers\KlijentisController::class, 'show']);


    Route::get('/kvarovi', [\App\Http\Controllers\KvarsController::class, 'index'])->name('kvarovi');
    Route::get('/kvarovi/create', [\App\Http\Controllers\KvarsController::class, 'create'])->name('kreirajKvar');
    Route::get('/kvarovi/store', [\App\Http\Controllers\KvarsController::class, 'store']);
    Route::get('/kvarovi/edit/{id}', [\App\Http\Controllers\KvarsController::class, 'edit']);
    Route::get('/kvarovi/update/{id}', [\App\Http\Controllers\KvarsController::class, 'update']);
    Route::get('/kvarovi/delete/{id}', [\App\Http\Controllers\KvarsController::class, 'destroy']);
    Route::get('/kvarovi/show/{id}', [\App\Http\Controllers\KvarsController::class, 'show']);




    /* Ovo dodaš i ta ruta mora proći kroz autentifikaciju, ako nije unutar grupe : ->middleware(['auth']) */

});
Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';
