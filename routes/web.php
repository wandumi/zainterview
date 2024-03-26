<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

Route::get('/artists', [ArtistController::class, 'index'])->name('artists');
Route::get('/artists/{query}', [ArtistController::class, 'search']);
Route::get('/artists/show/{artist}', [ArtistController::class, 'show']);

Route::get('/albums', [AlbumController::class, 'index'])->name('albums');
Route::get('/albums/{query}', [AlbumController::class, 'search'])->name('albums.search');
Route::get('/album/show/{album}', [AlbumController::class, 'show']);

Route::view('/{any?}', 'welcome')->name('welcome')->where('any','.*');
