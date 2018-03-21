<?php

namespace App\Http\Controllers;

use Session;
use App\Movie;
use App\Person;
use App\Director;
use App\Genre;
use App\Image;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('movies.index', ['movies' => Movie::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('movies.create', ['people' => Person::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $movie = new Movie();
      $movie->title = $request->input('title');
      $movie->description = $request->input('description');
      $movie->runtime = $request->input('runtime');
      $movie->releasedate = $request->input('releasedate');
      $movie->save();

      if ($request->hasFile('poster')) {
        $path = $request->file('poster')->store('images', 'public');

        $image = new Image();
        $image->url = $path;
        $image->movie_id = $movie->id;
        $image->save();

        $movie->image_id = $image->id;
        $movie->save();
      }
      /**
       * [Pop-up on the previous site (movies.index) that says the movie has been added/created.]
       * @var [type]
       */

      Session::flash('flash_message', 'Filmen har lagts till!');

      return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
      return view('movies.show', ['movie' => $movie, 'genres' => Genre::get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
      return view('movies.edit', ['movie' => $movie, 'people' => Person::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
      $director = Director::where('person_id', $request->input('director'))->first();
      if(!$director) {
        $director = new Director;
        $director->person_id = $request->input('director');
        $director->save();
        $director = Director::where('person_id', $request->input('director'))->first();
      }
      $director = $director->id;

      if ($request->hasFile('poster')) {
        $path = $request->file('poster')->store('images', 'public');

        $image = new Image();
        $image->url = $path;
        $image->movie_id = $movie->id;
        $image->save();

        $movie->image_id = $image->id;
      }

      $movie->title = $request->input('title');
      $movie->description = $request->input('description');
      $movie->runtime = $request->input('runtime');
      $movie->releasedate = $request->input('releasedate');
      $movie->director_id = $director;
      $movie->save();

/**
 * [Pop-up of a message.]
 * @var [type]
 */
      Session::flash('flash_message', 'Filmen har uppdaterats!');

/**
 * [returns client to the previous page after the movie has been changed.]
 * @var [type]
 */
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
 /**
  * [Creates a genre for the specific movie selected]
  * @param Request $request [description]
  * @param Movie   $movie   [description]
  */
    public function addGenre(Request $request, Movie $movie)
    {
      $genre = $request->input('genre');
      $movie->genres()->attach($genre);

      Session::flash('flash_message', 'Genren har lagts till!');

      return redirect()->back();
    }
}
