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
      $new_category_obj->name = $category['name'];
      $new_category_obj->save();
    }
  }
}
