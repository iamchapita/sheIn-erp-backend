<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Rutas de Inicio de sesión, registro y actualización de usuario
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
// Route::post('/setToSeller', [UserController::class, 'setToSeller'])->middleware('auth:sanctum')->name('setToSeller');
// Route::post('/createDirection', [DirectionController::class, 'store'])->name('createDirection');
