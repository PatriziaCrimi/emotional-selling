<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyRoundGroupsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('groups', function(Blueprint $table) {
      $table->unsignedBigInteger('round_id')->after('name')->nullable();
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
    Schema::table('groups', function(Blueprint $table) {
      // Removing the foreign key constraint: NomeTabella_NomeColonna_foreign
      $table->dropForeign('groups_round_id_foreign');
      // Deleting the column containing the FK
      $table->dropColumn('round_id');
    });
  }
}
