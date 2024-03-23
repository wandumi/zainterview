<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\LastFam\LastFmController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LastFm\SearchController;

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

Route::get('/last_fm', [LastFmController::class, 'index']);

Route::get('/search_form', [SearchController::class, 'index'])->name('search_form');
Route::get('/search', [SearchController::class, 'search'])->name('search');
