<?php

use Illuminate\Database\Seeder;
use App\Artist;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $artist = new Artist();
      $artist->name = 'Mark Hamill';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Carrie Fisher';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Adam Driver';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Johnny Depp';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Eddie Redmayne';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Alison Sudol';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Chloe Levine';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Jeremy Holm';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Granit Lahu';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Sophie Thatcher';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Pedro Pascal';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Jay Duplass';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Adam Devine';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Sugar Lyn Beard';
      $artist->save();

      $artist = new Artist();
      $artist->name = 'Steve Howey';
      $artist->save();
    }
}
