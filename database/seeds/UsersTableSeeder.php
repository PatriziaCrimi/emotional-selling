<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = config('users');

    foreach ($users as $user) {
      $new_user_obj = new User();
      $new_user_obj->name = $user['name'];
      $new_user_obj->lastname = $user['lastname'];
      $new_user_obj->username = $user['username'];
      $new_user_obj->password = bcrypt($user['password']);
      $new_user_obj->team_id = $user['team_id'];
      $new_user_obj->save();
    }
  }
}
