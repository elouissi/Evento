<?php

use App\Http\Controllers\EvenementController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard']);


Route::get('/evenement', [EvenementController::class, 'index'])->name('evenement');
Route::post('/evenement/create', [EvenementController::class, 'store'])->name('CreateEvent');
Route::delete('/evenement/delete/{evenement}', [EvenementController::class, 'destroy'])->name('DeleteEvent');
Route::get('/evenement/edit/{evenement}', [EvenementController::class, 'edit'])->name('EditEvent');
Route::put('/evenement/update/{evenement}', [EvenementController::class, 'update'])->name('UpdateEvent');
