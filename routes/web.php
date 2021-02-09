<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
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
//Authentification
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authentification');
Route::get('/create_user', [LoginController::class, 'create_index'])->name('create_user');
Route::post('/create_user', [LoginController::class, 'create_user'])->name('created_user');

//Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//HomePage
Route::get('/', [HomeController::class, 'index'])->name('homepage')->middleware('auth');
Route::get('/relance', [HomeController::class, 'relaunch'])->name('relaunch')->middleware('auth');
Route::get('/entretien', [HomeController::class, 'interview'])->name('interview')->middleware('auth');
Route::get('/candidater', [HomeController::class, 'candidate'])->name('candidate')->middleware('auth');
//Insert
Route::get('/insert', [HomeController::class, 'goToInsert'])->name('formulaire')->middleware('auth');
Route::post('/insert', [HomeController::class, 'insert'])->name('validate')->middleware('auth');
//UpDate
Route::get('/update/{suivi}', [HomeController::class, 'goToUpdate'])->name('update')->middleware('auth');
Route::put('/updated/{suivi}', [HomeController::class, 'updated'])->name('updated')->middleware('auth');
//Delete
Route::delete('/{suivi}', [HomeController::class, 'delete'])->name('delete')->middleware('auth');
