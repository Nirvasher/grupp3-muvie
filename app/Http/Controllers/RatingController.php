<?php

namespace App\Http\Controllers;

use Session;
use App\Rating;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Stores the rating for selected movie from user.
     *
     * @param  Movie   $movie   Gets ID from request and uses model to fetch relevant data.
     * @param  Request $request Gets form data.
     * @return redirect           Redirects the user to the last visited page.
     */
    public function store(Movie $movie, Request $request)
    {
      $check = Rating::where('user_id', Auth::user()->id)->where('movie_id', $movie->id)->first();
      if (!$check) {
        $rating = new Rating();
        $rating->rating = $request->input('rating');
        $rating->user_id = Auth::user()->id;
        $rating->movie_id = $movie->id;
        $rating->save();

        Session::flash('flash_message', 'Du har betygsatt filmen!');
      }

      return redirect()->back();
    }
}
