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
Route::get('/creation_utilisateur', [LoginController::class, 'create_index'])->name('create_user');
Route::post('/creation_utilisateur', [LoginController::class, 'create_user'])->name('created_user');
//Forgot password
Route::get('/motdepassperdu', [LoginController::class, 'lost_password'])->middleware('guest')->name('lost_password');
Route::post('/motdepassperdu', [LoginController::class, 'request_password'])->middleware('guest')->name('request_password');
Route::get('/reset-password/{token}', function ($token) {return view('auth.reset-password', ['token' => $token]);})->middleware('guest')->name('password.reset');
Route::post('/reset-password', [LoginController::class, 'reset_password'])->middleware('guest')->name('update_password');


//Logout
Route::get('/deconnexion', [LoginController::class, 'logout'])->name('logout');
//HomePage
Route::get('/', [HomeController::class, 'index'])->name('homepage')->middleware('auth');
Route::get('/relance', [HomeController::class, 'relaunch'])->name('relaunch')->middleware('auth');
Route::get('/entretien', [HomeController::class, 'interview'])->name('interview')->middleware('auth');
Route::get('/candidater', [HomeController::class, 'candidate'])->name('candidate')->middleware('auth');
Route::get('/positive', [HomeController::class, 'positive'])->name('positive')->middleware('auth');
Route::get('/negative', [HomeController::class, 'negative'])->name('negative')->middleware('auth');
Route::get('/encours', [HomeController::class, 'encours'])->name('encours')->middleware('auth');
//Insert
Route::get('/ajouter', [HomeController::class, 'goToInsert'])->name('formulaire')->middleware('auth');
Route::post('/ajouter', [HomeController::class, 'insert'])->name('validate')->middleware('auth');
//UpDate
Route::get('/miseajour/{suivi}', [HomeController::class, 'goToUpdate'])->name('update')->middleware('auth');
Route::put('/miseajour/{suivi}', [HomeController::class, 'updated'])->name('updated')->middleware('auth');
//Delete
Route::delete('/effacement/{suivi}', [HomeController::class, 'delete'])->name('delete')->middleware('auth');
//Page Menu
Route::get('/information', [HomeController::class, 'info'])->name('info');
Route::get('/protectiondesdonnees', [HomeController::class, 'data'])->name('data');
Route::get('/envoyersonidee', [HomeController::class, 'idea'])->name('idea');
