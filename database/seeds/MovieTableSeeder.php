<?php

use Illuminate\Database\Seeder;
use App\Movie;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $movie = new Movie();
      $movie->title = 'Fantastiska vidunder: Grindelwalds brott';
      $movie->description = 'The second installment of the "Fantastic Beasts and Where to Find Them" franchise which follows the adventures of Newt Scamander.';
      $movie->runtime = '?';
      $movie->releasedate = '2018-11-16';
      $movie->save();

      $movie = new Movie();
      $movie->title = 'The Ranger';
      $movie->description = 'Teen punks, on the run from the cops and hiding out in the woods, come up against the local authority - an unhinged park ranger with an axe to grind.';
      $movie->runtime = '?';
      $movie->releasedate = '2018-03-12';
      $movie->save();

      $movie = new Movie();
      $movie->title = 'Prospect';
      $movie->description = 'A teenage girl and her father travel to a remote moon on the hunt for elusive riches. But there are others roving the moon\'s toxic forest and the job quickly devolves into a desperate fight to escape.';
      $movie->runtime = '1h 38min';
      $movie->releasedate = '2018-03-10';
      $movie->save();

      $movie = new Movie();
      $movie->title = 'Game Over, Man!';
      $movie->description = 'Three friends are on the verge of getting their video game financed when their benefactor is taken hostage by terrorists.';
      $movie->runtime = '?';
      $movie->releasedate = '2018-04-20';
      $movie->save();

      $movie = new Movie();
      $movie->title = 'Star Wars: The Last Jedi';
      $movie->description = 'Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares for battle with the First Order.';
      $movie->runtime = '2h 32min';
      $movie->releasedate = '2017-12-13';
      $movie->save();
    }
}
