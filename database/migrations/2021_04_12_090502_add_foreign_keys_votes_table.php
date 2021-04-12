<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysVotesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('votes', function(Blueprint $table) {
      // 1-N USERS table
      $table->unsignedBigInteger('user_voted_id')->after('voter_id')->nullable();
      $table->foreign('user_voted_id')->references('id')->on('users')->onDelete('set null');

      // 1-N TEAMS table
      $table->unsignedBigInteger('team_id')->after('user_voted_id')->nullable();
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
    // 1-N USERS table
    Schema::table('votes', function(Blueprint $table) {
      // Removing the foreign key constraint: NomeTabella_NomeColonna_foreign
      $table->dropForeign('votes_user_voted_id_foreign');
      // Deleting the column containing the FK
      $table->dropColumn('user_voter_id');
    });

    // 1-N TEAMS table
    Schema::table('votes', function(Blueprint $table) {
      $table->dropForeign('votes_team_id_foreign');
      $table->dropColumn('team_id');
    });

    // 1-N ROUNDS table
    Schema::table('votes', function(Blueprint $table) {
      $table->dropForeign('votes_round_id_foreign');
      $table->dropColumn('round_id');
    });
  }
}
