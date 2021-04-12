<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyRoundRolesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('roles', function(Blueprint $table) {
      $table->unsignedBigInteger('round_id')->after('type')->nullable();
      $table->foreign('round_id')->references('id')->on('rounds')->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('roles', function(Blueprint $table) {
      // Removing the foreign key constraint: NomeTabella_NomeColonna_foreign
      $table->dropForeign('roles_round_id_foreign');
      // Deleting the column containing the FK
      $table->dropColumn('round_id');
    });
  }
}
