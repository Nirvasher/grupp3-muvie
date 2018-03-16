<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $genre = new Genre();
      $genre->name = 'Action';
      $genre->save();

      $genre = new Genre();
      $genre->name = 'Komedi';
      $genre->save();

      $genre = new Genre();
      $genre->name = 'Science fiction';
      $genre->save();

      $genre = new Genre();
      $genre->name = 'Thriller';
      $genre->save();

      $genre = new Genre();
      $genre->name = 'Fantasy';
      $genre->save();
    }
}
