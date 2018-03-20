<?php

use Illuminate\Database\Seeder;
use Person;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $person = new Person();
      $person->name = 'Mark Hamill';
      $person->save();

      $person = new Person();
      $person->name = 'Carrie Fisher';
      $person->save();

      $person = new Person();
      $person->name = 'Adam Driver';
      $person->save();

      $person = new Person();
      $person->name = 'Johnny Depp';
      $person->save();

      $person = new Person();
      $person->name = 'Eddie Redmayne';
      $person->save();

      $person = new Person();
      $person->name = 'Alison Sudol';
      $person->save();

      $person = new Person();
      $person->name = 'Chloe Levine';
      $person->save();

      $person = new Person();
      $person->name = 'Jeremy Holm';
      $person->save();

      $person = new Person();
      $person->name = 'Granit Lahu';
      $person->save();

      $person = new Person();
      $person->name = 'Sophie Thatcher';
      $person->save();

      $person = new Person();
      $person->name = 'Pedro Pascal';
      $person->save();

      $person = new Person();
      $person->name = 'Jay Duplass';
      $person->save();

      $person = new Person();
      $person->name = 'Adam Devine';
      $person->save();

      $person = new Person();
      $person->name = 'Sugar Lyn Beard';
      $person->save();

      $person = new Person();
      $person->name = 'Steve Howey';
      $person->save();
    }
}
