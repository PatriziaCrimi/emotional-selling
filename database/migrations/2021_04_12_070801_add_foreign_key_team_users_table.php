<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTeamUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('users', function(Blueprint $table) {
      $table->unsignedBigInteger('team_id')->after('password')->nullable();
      $table->foreign('team_id')->references('id')->on('teams')->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function(Blueprint $table) {
      // Removing the foreign key constraint: NomeTabella_NomeColonna_foreign
      $table->dropForeign('users_team_id_foreign');
      // Deleting the column containing the FK
      $table->dropColumn('team_id');
    });
  }
}
