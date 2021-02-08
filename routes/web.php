<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
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
//HomePage
Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/relance', [HomeController::class, 'relaunch'])->name('relaunch');
Route::get('/entretien', [HomeController::class, 'interview'])->name('interview');
//Insert
Route::get('/insert', [HomeController::class, 'goToInsert'])->name('formulaire');
Route::post('/insert', [HomeController::class, 'insert'])->name('validate');
//UpDate
Route::get('/update/{suivi}', [HomeController::class, 'goToUpdate'])->name('update');
Route::put('/updated/{suivi}', [HomeController::class, 'updated'])->name('updated');
//Delete
Route::delete('/{suivi}', [HomeController::class, 'delete'])->name('delete');
