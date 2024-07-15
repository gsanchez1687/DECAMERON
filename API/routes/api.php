<?php

use App\Http\Controllers\CountriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Registrar hoteles
Route::post('hotel/store', HotelsController::class . '@store')->name('hotel/store');

//Lista de hoteles
Route::get('hotel/all', HotelsController::class . '@all')->name('hotel/all');

//lista de tipo de habitaciones
Route::get('hotel/rooms', HotelsController::class . '@rooms')->name('hotel/rooms');

//lista de tipo de alojamiento
Route::get('hotel/accommodations', HotelsController::class . '@accommodations')->name('hotel/accommodations');