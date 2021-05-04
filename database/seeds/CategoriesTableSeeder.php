<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categories = config('categories');

    foreach ($categories as $category) {
      $new_category_obj = new Category();
      $new_category_obj->role_id = $category['role_id'];
      $new_category_obj->number = $category['number'];
      $new_category_obj->question = $category['question'];
      $new_category_obj->explanation = $category['explanation'];
      $new_category_obj->save();
    }
  }
}
