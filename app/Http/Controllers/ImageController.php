<?php

namespace App\Http\Controllers;

use Session;
use App\Image;
use App\Movie;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Shows a upload form for the user and shows selected movie.
     *
     * @param  Movie  $movie Gets ID from request and uses model to fetch relevant data.
     * @return view        Returns the view images.create with the model movie.
     */
    public function create(Movie $movie)
    {
      return view('images.create', ['movie' => $movie]);
    }

    /**
     * Uploads image and stores image information to the database, linked to the movie.
     *
     * @param  Request $request Gets file upload form data.
     * @return redirect           Redirects the user to movies.show with movie ID.
     */
    public function store(Request $request)
    {
      $path = $request->file('image')->store('images', 'public');

      $image = new Image();
      $image->url = $path;
      $image->movie_id = $request->input('movie_id');
      $image->save();

      Session::flash('flash_message', 'Bilden har lagts till!');

      return redirect()->route('movies.show', ['movie' => $request->input('movie_id')]);
    }
}
