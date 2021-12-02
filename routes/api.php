<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/test', function (Request $request){
    return 'Autentifikovan';
});


Route::get('/klijenti', [\App\Http\Controllers\KlijentisController::class, 'indexApi']);

Route::get('/kvarovi', [\App\Http\Controllers\KvarsController::class, 'indexApi'])->name('kvarovi');


Route::middleware('auth:sanctum')->get('/user/', function (Request $request) {
    return $request->user();
});
 /*
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user', RatingController::class);
});
 */
