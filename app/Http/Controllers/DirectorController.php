<?php

namespace App\Http\Controllers;

use Session;
use App\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Shows all the directors from the database.
     *
     * @return view Returns the view directors.index, with the Director model.
     */
    public function index()
    {
      return view('directors.index', ['directors' => Director::get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Director  $director
     * @return \Illuminate\Http\Response
     */

    /**
     * Shows the selected director based on the requested ID.
     *
     * @param  Director $director Gets the model for the director based on the ID.
     * @return view             Returns a view with directors.show and a model based on the requested ID.
     */
    public function show(Director $director)
    {
      return view('directors.show', ['director' => $director]);
    }
}
