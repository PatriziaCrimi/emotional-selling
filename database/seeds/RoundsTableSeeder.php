<?php

use Illuminate\Database\Seeder;
use App\Round;

class RoundsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $rounds = config('rounds');

    foreach ($rounds as $round) {
      $new_round_obj = new Round();
      $new_round_obj->name = $round['name'];
      $new_round_obj->save();
    }
  }
}
