<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysTeamRoundVotesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('votes', function(Blueprint $table) {
      // 1-N TEAMS table
      $table->unsignedBigInteger('team_id')->after('value')->nullable();
      $table->foreign('team_id')->references('id')->on('teams')->onDelete('set null');

      // 1-N ROUNDS table
      $table->unsignedBigInteger('round_id')->after('team_id')->nullable();
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
    // 1-N TEAMS table
    Schema::table('votes', function(Blueprint $table) {
      // Removing the foreign key constraint: NomeTabella_NomeColonna_foreign
      $table->dropForeign('votes_team_id_foreign');
      // Deleting the column containing the FK
      $table->dropColumn('team_id');
    });

    // 1-N ROUNDS table
    Schema::table('votes', function(Blueprint $table) {
      $table->dropForeign('votes_round_id_foreign');
      $table->dropColumn('round_id');
    });
  }
}
