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
Route::post('/genres/{genre}', 'GenreController@update')->name('genres.update');

Route::get('/actors', 'ActorController@index')->name('actors.index');
Route::get('/actors/create', 'ActorController@create')->name('actors.create');
Route::post('/actors', 'ActorController@store')->name('actors.store');
Route::get('/actors/{actor}/edit', 'ActorController@edit')->name('actors.edit');
Route::get('/actors/{actor}', 'ActorController@show')->name('actors.show');
Route::post('/actors/{actor}', 'ActorController@update')->name('actors.update');

Route::get('/directors', 'DirectorController@index')->name('directors.index');
Route::get('/directors/create', 'DirectorController@create')->name('directors.create');
Route::post('/directors', 'DirectorController@store')->name('directors.store');
Route::get('/directors/{director}/edit', 'DirectorController@edit')->name('directors.edit');
Route::get('/directors/{director}', 'DirectorController@show')->name('directors.show');
Route::post('/directors/{director}', 'DirectorController@update')->name('directors.update');

Route::get('/images/create/{movie}', 'ImageController@create')->name('images.create');
Route::post('/images', 'ImageController@store')->name('images.store');
Route::get('/images/{image}/edit', 'ImageController@edit')->name('images.edit');
Route::get('/images/{image}', 'ImageController@show')->name('images.show');
Route::post('/images/{image}', 'ImageController@update')->name('images.update');

Route::get('/users/{user}', 'UserController@show')->name('users.show');

Route::get('/libraries/create/{movie}', 'LibraryController@create')->name('libraries.create');
Route::post('/libraries/store/{movie}', 'LibraryController@store')->name('libraries.store');
Route::get('/libraries/{library}/edit', 'LibraryController@edit')->name('libraries.edit');
Route::post('/libraries/{library}', 'LibraryController@update')->name('libraries.update');
