<?php

use Illuminate\Database\Seeder;
use App\GroupRoleRoundUser;

class GroupRoleRoundUsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $grru = config('group_role_round_user');

    foreach ($grru as $current_grru) {
      $new_current_grru_obj = new GroupRoleRoundUser();
      $new_current_grru_obj->user_id = $current_grru['user_id'];
      $new_current_grru_obj->group_id = $current_grru['group_id'];
      $new_current_grru_obj->role_id = $current_grru['role_id'];
      $new_current_grru_obj->round_id = $current_grru['round_id'];
      $new_current_grru_obj->save();
    }
  }
}
