<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputKlubController;
use App\Http\Controllers\DataScoreController;
use App\Http\Controllers\KlasemenController;
use App\Http\Controllers\PertandinganController;

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


Route::get('/',[HomeController::class, 'index'])->name('home.index');

Route::get('/Input',[InputKlubController::class, 'create'])->name('InputKlub.index');
Route::get('/klub/dataklub',[InputKlubController::class, 'index'])->name('dataklub.index');
Route::post('/klub/dataklub',[InputKlubController::class, 'store'])->name('klub.store');
Route::get('/klub/{klub}', [InputKlubController::class, 'show'])->name('klub.show');
Route::get('/klub/{klub}/edit', [InputKlubController::class, 'edit'])->name('klub.edit');
Route::put('/klub/{klub}', [InputKlubController::class, 'update'])->name('klub.update');
Route::delete('/klub/{klub}', [InputKlubController::class, 'destroy'])->name('klub.destroy');

Route::get('/klasemen',[KlasemenController::class, 'index'])->name('klasemen.index');


// Route::get('/DataScore',[DataScoreController::class, 'index'])->name('dataklub.index');
// Route::get('/input',[DataScoreController::class, 'create'])->name('dataklub.create');
// Route::get('/input/search',[DataScoreController::class, 'seacrh'])->name('dataklub.search');

Route::get('/dataskor',[PertandinganController::class, 'store'])->name('score.index');
Route::post('/dataskor/post',[PertandinganController::class, 'insertScoreData'])->name('score.store');

