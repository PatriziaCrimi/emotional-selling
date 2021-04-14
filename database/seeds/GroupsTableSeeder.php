<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $groups = config('groups');

    foreach ($groups as $group) {
      $new_group_obj = new Group();
      $new_group_obj->name = $group['name'];
      $new_group_obj->save();
    }
  }
}
