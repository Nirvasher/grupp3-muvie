<?php

use Illuminate\Database\Seeder;
use App\Actor;

class ActorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $actor = new Actor();
      $actor->name = 'Mark Hamill';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Carrie Fisher';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Adam Driver';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Johnny Depp';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Eddie Redmayne';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Alison Sudol';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Chloe Levine';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Jeremy Holm';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Granit Lahu';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Sophie Thatcher';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Pedro Pascal';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Jay Duplass';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Adam Devine';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Sugar Lyn Beard';
      $actor->save();

      $actor = new Actor();
      $actor->name = 'Steve Howey';
      $actor->save();
    }
}
