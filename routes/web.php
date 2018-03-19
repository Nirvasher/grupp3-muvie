<?php

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

Auth::routes();

Route::get('/', 'MovieController@index')->name('home');
Route::get('/home', 'MovieController@index');
Route::get('/movies', 'MovieController@index')->name('movies.index');
Route::get('/movies/{movie}', 'MovieController@show')->name('movies.show');

Route::get('/genres', 'GenreController@index')->name('genres.index');
Route::get('/genres/create', 'GenreController@create')->name('genres.create');
Route::post('/genres', 'GenreController@store')->name('genres.store');
Route::get('/genres/{genre}/edit', 'GenreController@edit')->name('genres.edit');
Route::get('/genres/{genre}', 'GenreController@show')->name('genres.show');
<<<<<<< HEAD
<<<<<<< HEAD
=======
Route::post('/genres/{genre}', 'GenreController@update')->name('genres.update');
>>>>>>> cdfc72a270e93f1a3cb7e2147d87505c4fb865f0

Route::get('/actors', 'ActorController@index')->name('actors.index');
Route::get('/actors/{actor}', 'ActorController@show')->name('actors.show');

<<<<<<< HEAD
Route::get('/directors/{director}', 'DirectorController@show')->name('directors.show');
=======
Route::post('/genres/{genre}', 'GenreController@update')->name('genres.update');
>>>>>>> master
=======
Route::get('/directors/{director}', 'DirectorController@show')->name('directors.show');
>>>>>>> cdfc72a270e93f1a3cb7e2147d87505c4fb865f0
