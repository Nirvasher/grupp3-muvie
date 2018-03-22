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
     * Shows all the movies in the database.
     *
     * @return view Returns the view movies.index with the movies model.
     */
    public function index()
    {
        return view('movies.index', ['movies' => Movie::get()]);
    }

    /**
     * Shows a form so the user can edit the choosen movie.
     *
     * @return view Returns the view movies.create with the people model.
     */
    public function create()
    {
      return view('movies.create', ['people' => Person::get()]);
    }

    /**
     * Stores the new movie in the database.
     *
     * @param  Request $request Gets the multi form data.
     * @return redirect           Redirects the user to the index page for movies.
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

      Session::flash('flash_message', 'Filmen har lagts till!');

      return redirect()->route('movies.index');
    }

    /**
     * Shows the selected movie.
     *
     * @param  Movie  $movie Gets ID from request and uses model to fetch relevant data.
     * @return view        Returns the view movies.show with the models movie and genre.
     */
    public function show(Movie $movie)
    {
      return view('movies.show', ['movie' => $movie, 'genres' => Genre::get()]);
    }

    /**
     * Lets the user edit the movie. Shows form.
     *
     * @param  Movie  $movie Gets ID from request and uses model to fetch relevant data.
     * @return view        Returns the view movies.edit with the models movie and people.
     */
    public function edit(Movie $movie)
    {
      return view('movies.edit', ['movie' => $movie, 'people' => Person::get()]);
    }

    /**
     * Updates the data for the movie in the database.
     *
     * @param  Request $request Gets form data.
     * @param  Movie   $movie   Gets ID from request and uses model to fetch relevant data.
     * @return redirect           Redirects the user to the last visited page.
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

      Session::flash('flash_message', 'Filmen har uppdaterats!');

      return redirect()->back();
    }

    /**
     * Attaches a genre to a movie.
     *
     * @param  Request $request Gets form data.
     * @param  Movie   $movie   Gets ID from request and uses model to fetch relevant data.
     * @return redirect           Redirects the user to the last visited page.
     */
    public function addGenre(Request $request, Movie $movie)
    {
      $genre = $request->input('genre');

      $genreMovie = $movie->genres->where('id', $genre)->first();
      if (!$genreMovie) {
        $movie->genres()->attach($genre);

        Session::flash('flash_message', 'Genren har lagts till!');
      }

      return redirect()->back();
    }
}
