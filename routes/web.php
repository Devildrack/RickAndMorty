<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', [CharacterController::class, 'index']);
Route::get('/character/{id}', [CharacterController::class, 'show']);
Route::get('/search', [CharacterController::class, 'search']);
Route::get('/filter', [CharacterController::class, 'filter']);
