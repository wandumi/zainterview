<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Album\AlbumController;
use App\Http\Controllers\Artist\ArtistController;
use App\Http\Controllers\Auth\ProviderController;


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

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

Route::get('/artists', [ArtistController::class, 'index'])->name('artists');
Route::get('/artists/{query}', [ArtistController::class, 'search']);
Route::get('/artists/show/{artist}', [ArtistController::class, 'show']);
Route::get('/artists_search/{artist}', [ArtistController::class, 'search_artist']);
Route::post('/artists', [ArtistController::class, 'store'])->middleware('auth');
Route::delete('/artists/{artist}', [ArtistController::class, 'destroy'])->middleware('auth');

Route::get('/albums', [AlbumController::class, 'index'])->name('albums');
Route::get('/albums/{query}', [AlbumController::class, 'search'])->name('albums.search');
Route::get('/album/show/{artist}/{album}', [AlbumController::class, 'show']);
Route::get('/album_search/{artist}/{album}', [AlbumController::class, 'search_album']);
Route::post('/albums', [AlbumController::class, 'store'])->middleware('auth');
Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->middleware('auth');

Route::view('/{any?}', 'welcome')->name('welcome')->where('any','.*');
