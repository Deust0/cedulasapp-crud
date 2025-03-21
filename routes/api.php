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
});
Route::get('/citizen', [ciudadanosController::class, 'showAllCitizen']);

Route::get('/citizen/{id}', [ciudadanosController::class, 'showCitizenById']);

Route::post('/citizen', [ciudadanosController::class, 'addCitizen']);

Route::put('/citizen/{id}', [ciudadanosController::class, 'modifyCitizen']);

Route::delete('/citizen/{id}', [ciudadanosController::class, 'deleteCitizen']);

Route::patch('/citizen/{id}', [ciudadanosController::class, 'updateUserField']);
