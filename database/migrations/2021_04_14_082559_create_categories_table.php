<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('categories', function (Blueprint $table) {
      $table->id();
      $table->tinyInteger('number');
      $table->string('question');
      $table->string('explanation')->nullable();
      $table->timestamps();
    });
  }

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
  {
    Schema::dropIfExists('categories');
  }
}
