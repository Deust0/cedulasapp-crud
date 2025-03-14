<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ciudadanosController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request){
    return $request->user();
});



Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

// Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth:sanctum'])->group(function() {
    //Route::get('logout',[AuthController::class, 'logout']);

    Route::get('/ciudadanos', [ciudadanosController::class, 'showAll']);

    Route::get('/ciudadanos/{id}', [ciudadanosController::class, 'show']);

    Route::post('/ciudadanos', [ciudadanosController::class, 'agregarCiudadano']);

    Route::put('/ciudadanos/{id}', [ciudadanosController::class, 'modificarCiudadano']);

    Route::delete('/ciudadanos/{id}', [ciudadanosController::class, 'eliminarCiudadano']);

    Route::patch('/ciudadanos/{id}', [ciudadanosController::class, 'modificarParcialCiudadano']);
});