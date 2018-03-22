<?php

namespace App\Http\Controllers;

use Session;
use App\Library;
use App\User;
use App\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Lets the user add a movie by selecting a format for the movie.
     *
     * @param  Movie  $movie Gets ID from request and uses model to fetch relevant data.
     * @return view        Returns the view images.create with the model movie.
     */
    public function create(Movie $movie)
    {
      return view('libraries.create', ['movie' => $movie]);
    }

    /**
     * Stores the choosen movie in the users library.
     *
     * @param  Request $request Gets form data.
     * @param  Movie   $movie   Gets ID from request and uses model to fetch relevant data.
     * @return redirect           Redirects the user to movies.show with movie ID.
     */
    public function store(Request $request, Movie $movie)
    {
      $movieLibrary = Auth::user()->libraries->where('movie_id', $movie->id)->first();
      if(!$movieLibrary) {
        $library = new Library();
        $library->movie_id = $movie->id;
        $library->user_id = Auth::user()->id;
        $library->format = $request->input('format');
        $library->save();

        Session::flash('flash_message', 'Filmen har lagts till i ditt bibliotek!');
      }

      return redirect()->route('movies.show', ['id' => $movie->id]);
    }

    /**
     * Lets the user edit the format for the movie in the library.
     *
     * @param  Library $library Gets ID from request and uses model to fetch relevant data.
     * @return view           Returns the view libraries.edit with the model library.
     */
    public function edit(Library $library)
    {
      return view('libraries.edit', ['library' => $library]);
    }

    /**
     * Updates the choosen library with new format-information.
     *
     * @param  Request $request Gets form data.
     * @param  Library $library Gets ID from request and uses model to fetch relevant data.
     * @return redirect           Redirects the user to the last visited page.
     */
    public function update(Request $request, Library $library)
    {
      $library->format = $request->input('format');
      $library->save();

      Session::flash('flash_message', 'Biblioteket har uppdaterats!');

      return redirect()->back();
    }
}
