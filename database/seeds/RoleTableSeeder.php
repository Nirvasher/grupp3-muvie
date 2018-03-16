<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_member = new Role();
      $role_member->name = 'member';
      $role_member->description = 'Vanlig användare som är medlem.';
      $role_member->save();

      $role_admin = new Role();
      $role_admin->name = 'editor';
      $role_admin->description = 'Användare som kan redigera och lägga till innehåll.';
      $role_admin->save();
    }
}
