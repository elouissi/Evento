<?php

use App\Http\Controllers\CategorieController;
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
Route::patch('/evenement/accept/{evenement}', [EvenementController::class, 'accept'])->name('accept');
Route::patch('/evenement/refuse/{evenement}', [EvenementController::class, 'refuse'])->name('refuse');



Route::get('/categorie', [CategorieController::class, 'index'])->name('categorie');
Route::post('/categorie/create', [CategorieController::class, 'store'])->name('CreateCat');
Route::delete('/categorie/{categorie}', [CategorieController::class, 'destroy'])->name('DeleteCat');
Route::get('/categorie/{Categorie}', [CategorieController::class, 'edit'])->name('EditEvent');
Route::put('/categorie/{Categorie}', [CategorieController::class, 'update'])->name('UpdateCat');
