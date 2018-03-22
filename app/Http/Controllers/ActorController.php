<?php

namespace App\Http\Controllers;

use Session;
use App\Actor;
use App\Movie;
use App\Person;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Displays all actors.
     *
     * @return view Returns the view actors.index with Actors model.
     */
    public function index()
    {
      return view('actors.index', ['actors' => Actor::get()]);
    }

    /**
     * Shows the form for creating a new actor.
     *
     * @param  Movie  $movie Gets the movie based on the requested ID.
     * @return view        Returns the view actors.create with the models Movie and People.
     */
    public function create(Movie $movie)
    {
      return view('actors.create', ['movie' => $movie, 'people' => Person::get()]);
    }

    /**
     * Stores the new actor into the database.
     *
     * @param  Request $request Uses the Laravel Request object to get form-data.
     * @return redirect           Sends the user to the route movies.show, with movie ID.
     */
    public function store(Request $request)
    {
      $actor = Actor::where('person_id', $request->input('actor'))->first();
      if(!$actor) {
        $actor = new Actor;
        $actor->person_id = $request->input('actor');
        $actor->save();
        $actor = Actor::where('person_id', $request->input('actor'))->first();
      }

      $actor = $actor->id;

      $movie = Movie::find($request->input('movie_id'));

      $actorMovie = $movie->actors->where('id', $actor)->first();
      if(!$actorMovie) {
        $movie->actors()->attach($actor);

        Session::flash('flash_message', 'Skådespelaren har lagts till!');
      }

      return redirect()->route('movies.show', ['id' => $request->input('movie_id')]);
    }

    /**
     * Shows the selected actor.
     *
     * @param  Actor  $actor Gets the actor based on the requested ID.
     * @return view        Returns the view actors.show, with the model Actor.
     */
    public function show(Actor $actor)
    {
      return view('actors.show', ['actor' => $actor]);
    }
}
