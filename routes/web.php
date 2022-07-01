<?php

use App\Http\Controllers\GameController;
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

//Home
Route::get('/', [GameController::class, 'index']);

//Jogos
Route::get('/games/create', [GameController::class, 'create'])->middleware('auth');
Route::get('/games/{id}', [GameController::class, 'show']);
Route::post('/games', [GameController::class, 'store']);
Route::delete('/games/{id}', [GameController::class, 'destroy'])->middleware('auth');
Route::get('/games/edit/{id}', [GameController::class, 'edit'])->middleware('auth');
Route::put('/games/update/{id}', [GameController::class, 'update'])->middleware('auth');

Route::get('/dashboard', [GameController::class, 'dashboard'])->middleware('auth');

// /*Jogos do Usuário*/
Route::post('/games/buy/{id}', [GameController::class, 'buyGame'])->middleware('auth');
Route::delete('/games/leave/{id}', [GameController::class, 'leaveGame'])->middleware('auth');
