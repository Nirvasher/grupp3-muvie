<?php

namespace App\Http\Controllers;

use Session;
use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Shows all the genres from the database.
     *
     * @return view Returns view genres.index with model Genre.
     */
    public function index()
    {
      return view('genres.index', ['genres' => Genre::orderBy('name')->get()]);
    }

    /**
     * Shows a form for creating a new genre.
     *
     * @return view Returns view genres.create.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Stores a new genre in the database.
     *
     * @param  Request $request Gets new genre name from form data.
     * @return redirect           Redirects user to the genres.index.
     */
    public function store(Request $request)
    {
      $genre = new Genre();
      $genre->name = $request->input('genre');
      $genre->save();

      Session::flash('flash_message', 'Genren har skapats!');

      return redirect()->route('genres.index');
    }

    /**
     * Shows the choosen genre.
     *
     * @param  Genre  $genre Gets ID from request and uses model to fetch relevant data.
     * @return view        Returns the view genres.show with the model genre.
     */
    public function show(Genre $genre)
    {
        return view('genres.show', ['genre' => $genre]);
    }

    /**
     * Gets data from database so the user can edit in a form.
     *
     * @param  Genre  $genre Gets ID from request and uses model to fetch relevant data.
     * @return view        Retuns the view genres.edit with the model genre.
     */
    public function edit(Genre $genre)
    {
        return view('genres.edit', ['genre' => $genre]);
    }

    /**
     * Updates the data in the database for the choosen genre.
     *
     * @param  Request $request Gets form data.
     * @param  Genre   $genre   Gets ID from request and uses model to fetch relevant data.
     * @return redirect           Redirects the user to the last visited page.
     */
    public function update(Request $request, Genre $genre)
    {
      $genre->name = $request->input('name');
      $genre->save();

      Session::flash('flash_message', 'Genren har uppdaterats!');

      return redirect()->back();
    }
}
