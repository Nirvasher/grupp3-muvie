<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Shows the choosen users profile with library and ratings.
     *
     * @param  User   $user Gets ID from request and uses model to fetch relevant data.
     * @return view       Returns the view users.show with the user model.
     */
    public function show(User $user)
    {
      return view('users.show', ['user' => $user]);
    }
}
