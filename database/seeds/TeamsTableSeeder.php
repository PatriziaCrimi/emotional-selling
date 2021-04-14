<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $teams = config('teams');

    foreach ($teams as $team) {
      $new_team_obj = new Team();
      $new_team_obj->name = $team['name'];
      $new_team_obj->save();
    }
  }
}
