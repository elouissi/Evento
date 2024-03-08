<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MollieController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
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

 Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard']);

Route::group(['middleware' => ['auth','verified','role:admin|organisateur']], function () {

Route::get('/evenement', [EvenementController::class, 'index'])->name('evenement');
Route::post('/evenement/create', [EvenementController::class, 'store'])->name('CreateEvent');
Route::delete('/evenement/delete/{evenement}', [EvenementController::class, 'destroy'])->name('DeleteEvent');
Route::get('/evenement/edit/{evenement}', [EvenementController::class, 'edit'])->name('EditEvent');
Route::put('/evenement/update/{evenement}', [EvenementController::class, 'update'])->name('UpdateEvent');
Route::patch('/evenement/accept/{evenement}', [EvenementController::class, 'accept'])->name('accept');
Route::patch('/evenement/refuse/{evenement}', [EvenementController::class, 'refuse'])->name('refuse');



Route::get('/categorie/show', [CategorieController::class, 'index'])->name('ShowCategorie');
Route::post('/categorie/create', [CategorieController::class, 'store'])->name('CreateCat');
Route::delete('/categorie/{categorie}', [CategorieController::class, 'destroy'])->name('DeleteCat');
Route::get('/categorie/{Categorie}', [CategorieController::class, 'edit'])->name('EditCat');
Route::put('/categorie/{Categorie}', [CategorieController::class, 'update'])->name('UpdateCat');





Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/baner', [UserController::class, 'BanerUser'])->name('BanerUser');

});

Route::get('/', [HomeController::class, 'index']);
Route::fallback(function(){
    return redirect('/');
});
Route::get('/evenement/show/{evenement}', [EvenementController::class, 'show'])->name('ShowEvent');

Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
Route::get('/reservation/{reservation}', [ReservationController::class, 'store'])->name('CreateReserv');
Route::patch('/reservation/publish/{evenement}', [ReservationController::class, 'publish'])->name('PublishRes');

Route::post('mollie', [MollieController::class, 'mollie'])->name('mollie');
Route::get('/success', [MollieController::class, 'success'])->name('success');
Route::get('cancel', [MollieController::class, 'cancel'])->name('cancel');


Route::get('profile', [UserController::class, 'profile' ] )->name('profile');
Route::post('/search',[HomeController::class,'search']);
Route::get('/filter',[HomeController::class,'index'])->name('filter');







