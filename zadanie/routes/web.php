<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayPetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddPetController;
use App\Http\Controllers\DeletePetController;
use App\Http\Controllers\EditPetController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/search', [DisplayPetController::class, 'index']);
Route::post('/{search?}', [AddPetController::class, 'add']);
Route::delete('/{search?}', [DeletePetController::class, 'delete']);
Route::put('/{search?}', [EditPetController::class, 'edit']);