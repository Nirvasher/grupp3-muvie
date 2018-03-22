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
Route::get('/movies/create', 'MovieController@create')->name('movies.create');
Route::post('/movies', 'MovieController@store')->name('movies.store');
Route::get('/movies/{movie}/edit', 'MovieController@edit')->name('movies.edit');
Route::post('/movies/{movie}/add/genre', 'MovieController@addGenre')->name('movies.addGenre');
Route::get('/movies/{movie}', 'MovieController@show')->name('movies.show');
Route::post('/movies/{movie}', 'MovieController@update')->name('movies.update');

Route::get('/genres', 'GenreController@index')->name('genres.index');
Route::get('/genres/create', 'GenreController@create')->name('genres.create');
Route::post('/genres', 'GenreController@store')->name('genres.store');
Route::get('/genres/{genre}/edit', 'GenreController@edit')->name('genres.edit');
Route::get('/genres/{genre}', 'GenreController@show')->name('genres.show');
Route::post('/genres/{genre}', 'GenreController@update')->name('genres.update');

Route::get('/actors', 'ActorController@index')->name('actors.index');
Route::get('/actors/create', 'ActorController@create')->name('actors.create');
Route::get('/actors/add/{movie}', 'ActorController@create')->name('actors.add');
Route::post('/actors', 'ActorController@store')->name('actors.store');
Route::get('/actors/{actor}', 'ActorController@show')->name('actors.show');

Route::get('/directors', 'DirectorController@index')->name('directors.index');
Route::get('/directors/{director}', 'DirectorController@show')->name('directors.show');

Route::get('/images/create/{movie}', 'ImageController@create')->name('images.create');
Route::post('/images', 'ImageController@store')->name('images.store');

Route::get('/users/{user}', 'UserController@show')->name('users.show');

Route::get('/libraries/create/{movie}', 'LibraryController@create')->name('libraries.create');
Route::post('/libraries/store/{movie}', 'LibraryController@store')->name('libraries.store');
Route::get('/libraries/{library}/edit', 'LibraryController@edit')->name('libraries.edit');
Route::post('/libraries/{library}', 'LibraryController@update')->name('libraries.update');

Route::get('/people', 'PersonController@index')->name('people.index');
Route::get('/people/create', 'PersonController@create')->name('people.create');
Route::post('/people', 'PersonController@store')->name('people.store');
Route::get('/people/{person}/edit', 'PersonController@edit')->name('people.edit');
Route::get('/people/{person}', 'PersonController@show')->name('people.show');
Route::post('/people/{person}', 'PersonController@update')->name('people.update');

Route::post('/rate/movie/{movie}', 'RatingController@store')->name('ratings.store');
