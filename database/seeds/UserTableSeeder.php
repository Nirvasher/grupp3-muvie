<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user->name = 'Daniel Andersen';
      $user->email = 'daniel@dnest.se';
      $user->password = Hash::make('testar');
      $user->save();
      $user->roles()->attach(Role::where('name', 'editor')->first());

      $user = new User();
      $user->name = 'Emmie Duphorn';
      $user->email = 'emmie.duphorn95@gmail.com';
      $user->password = Hash::make('testar');
      $user->save();
      $user->roles()->attach(Role::where('name', 'editor')->first());

      $user = new User();
      $user->name = 'Auan Jiawook';
      $user->email = 'auanking98@gmail.com';
      $user->password = Hash::make('testar');
      $user->save();
      $user->roles()->attach(Role::where('name', 'editor')->first());

      $user = new User();
      $user->name = 'Test Testsson';
      $user->email = 'test@testar.se';
      $user->password = Hash::make('testar');
      $user->save();
      $user->roles()->attach(Role::where('name', 'member')->first());
    }
}
