<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfilController;

Route::get('/', [ProfilController::class, 'show'])->name('profil');
Route::post('/', [ProfilController::class, 'login'])->name('profil.login');
Route::get('/inscription', [ProfilController::class, 'registerForm'])->name('profil.register.form');
Route::post('/inscription', [ProfilController::class, 'register'])->name('profil.register');
Route::get('/logout', [ProfilController::class, 'logout'])->name('profil.logout');

Route::resource('articles', ArticleController::class);
