<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [\App\Http\Controllers\MovieController::class, 'search'])->name('search');
Route::get('/my-movies', [\App\Http\Controllers\MovieController::class, 'my_movies'])->name('my-movies');
Route::resource('/movies', \App\Http\Controllers\MovieController::class);

require __DIR__.'/auth.php';
