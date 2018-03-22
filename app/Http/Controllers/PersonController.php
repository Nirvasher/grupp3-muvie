<?php

namespace App\Http\Controllers;

use Session;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Shows all the names of people stored in the database.
     *
     * @return view Returns the view people.index with the people model.
     */
    public function index()
    {
      return view('people.index', ['people' => Person::get()]);
    }

    /**
     * Shows a form for the user.
     *
     * @return view Returns the view people.create.
     */
    public function create()
    {
      return view('people.create');
    }

    /**
     * Stores the name in the database.
     *
     * @param  Request $request Gets file upload form data.
     * @return redirect           Redirects the user to the page people.index.
     */
    public function store(Request $request)
    {
      $person = new Person();
      $person->name = $request->input('person');
      $person->save();

      Session::flash('flash_message', 'Personen har lagts till!');

      return redirect()->route('people.index');
    }

    /**
     * Shows a selected persons name.
     *
     * @param  Person $person Gets ID from request and uses model to fetch relevant data.
     * @return view         Returns the view people.show with the person model.
     */
    public function show(Person $person)
    {
      return view('people.show', ['person' => $person]);
    }

    /**
     * Shows a form so the user can edit the name.
     *
     * @param  Person $person Gets ID from request and uses model to fetch relevant data.
     * @return view         Returns the view people.edit with the person model.
     */
    public function edit(Person $person)
    {
      return view('people.edit', ['person' => $person]);
    }

    /**
     * Updates the name for the choosen person.
     *
     * @param  Request $request Gets form data.
     * @param  Person  $person  Gets ID from request and uses model to fetch relevant data.
     * @return redirect           Redirects the user to the last visited page.
     */
    public function update(Request $request, Person $person)
    {
      $person->name = $request->input('person');
      $person->save();

      Session::flash('flash_message', 'Personen har uppdaterats!');

      return redirect()->back();
    }
}
