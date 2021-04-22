<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call(TeamsTableSeeder::class);
    $this->call(UsersTableSeeder::class);
    $this->call(RoundsTableSeeder::class);
    $this->call(GroupsTableSeeder::class);
    $this->call(RolesTableSeeder::class);
    $this->call(CategoriesTableSeeder::class);
    $this->call(GroupRoleRoundUsersTableSeeder::class);
    $this->call(ButtonsTableSeeder::class);
  }
}
