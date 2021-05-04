<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyCategoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('categories', function(Blueprint $table) {
      // FK constraint Roles table
      $table->unsignedBigInteger('role_id')->after('id')->nullable();
      $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('categories', function (Blueprint $table) {
      // Removing the foreign key constraint: NomeTabella_NomeColonna_foreign
      $table->dropForeign('categories_role_id_foreign');
      // Deleting the column containing the FK
      $table->dropColumn('role_id');
    });
  }
}
