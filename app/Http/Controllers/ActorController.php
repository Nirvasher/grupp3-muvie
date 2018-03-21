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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('actors.index', ['actors' => Actor::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Movie $movie)
    {
      return view('actors.create', ['movie' => $movie, 'people' => Person::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
      /**
       * [Pop-up about adding an actor to a movie]
       * @var [type]
       */
      $actor = $actor->id;

      $movie = Movie::find($request->input('movie_id'));

      $movie->actors()->attach($actor);

      Session::flash('flash_message', 'Skådespelaren har lagts till!');

      return redirect()->route('movies.show', ['id' => $request->input('movie_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
      return view('actors.show', ['actor' => $actor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
      return view('actors.edit', ['actor' => $actor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
      /**
       * [Pop-up about updating an actor's settings]
       * @var [type]
       */
      $actor->name = $request->input('name');
      $actor->save();

      Session::flash('flash_message', 'Skådespelaren har uppdaterats!');

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        //
    }
}
