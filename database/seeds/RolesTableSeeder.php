<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $roles = config('roles');

    foreach ($roles as $role) {
      $new_role_obj = new Role();
      $new_role_obj->name = $role['name'];
      $new_role_obj->save();
    }
  }
}
