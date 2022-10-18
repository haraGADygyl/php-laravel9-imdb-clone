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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/my-movies', function () {
//    return view('my-movies');
//})->name('my-movies');
Route::get('/movies/my-movies', [\App\Http\Controllers\MovieController::class, 'my_movies'])->name('my-movies');
Route::resource('/movies', \App\Http\Controllers\MovieController::class);

require __DIR__.'/auth.php';
