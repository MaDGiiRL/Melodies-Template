<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/auth/github', [AuthController::class, 'redirectToGithub'])->name('github.login');
Route::get('/auth/github/callback', [AuthController::class, 'handleGithubCallback']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/spotify/search', [PublicController::class, 'search']);



Route::get('/top-tracks', [PublicController::class, 'topTracks'])->name('top.tracks');
Route::get('/top-playlists', [PublicController::class, 'topPlaylists'])->name('top.playlists');



Route::get('/create-playlist', [PublicController::class, 'createPlaylist'])->name('create.playlist');
Route::post('/store-playlist', [PublicController::class, 'storePlaylist'])->name('store.playlist');
Route::get('/playlists', [PublicController::class, 'showPlaylists'])->name('playlists.index');
Route::get('/playlists/{playlist}', [PublicController::class, 'showPlaylist'])->name('playlists.show');
