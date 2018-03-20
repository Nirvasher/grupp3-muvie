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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Movie $movie)
    {
      return view('libraries.create', ['movie' => $movie]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Movie $movie)
    {
      $library = new Library();
      $library->movie_id = $movie->id;
      $library->user_id = Auth::user()->id;
      $library->format = $request->input('format');
      $library->save();

      Session::flash('flash_message', 'Filmen har lagts till i ditt bibliotek!');

      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $library)
    {
      return view('libraries.edit', ['library' => $library]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Library $library)
    {
      $library->format = $request->input('format');
      $library->save();

      Session::flash('flash_message', 'Biblioteket har uppdaterats!');

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        //
    }
}
