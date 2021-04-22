<?php

use Illuminate\Database\Seeder;
use App\Button;
class ButtonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $buttons = config('buttons');

      foreach ($buttons as $button) {
        $new_button_obj = new Button();
        $new_button_obj->status = $button['status'];
        $new_button_obj->save();
      }
    }
}
