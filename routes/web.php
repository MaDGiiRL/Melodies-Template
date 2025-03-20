<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/contacts', [PublicController::class, 'contacts'])->name('contacts');

Route::get('/auth/github', [AuthController::class, 'redirectToGithub'])->name('github.login');
Route::get('/auth/github/callback', [AuthController::class, 'handleGithubCallback']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/spotify/search', [PublicController::class, 'search']);
Route::get('/top-playlists', [PublicController::class, 'topPlaylists'])->name('top.playlists');
Route::get('/spotify/create', [PublicController::class, 'create'])->name('spotify.create');
