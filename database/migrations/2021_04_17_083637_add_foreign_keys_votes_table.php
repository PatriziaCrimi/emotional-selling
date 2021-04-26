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
      // FK constraint Categories table
      $table->unsignedBigInteger('category_id')->after('comment')->nullable();
      $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
      // FK constraint Info-Votante table
      $table->unsignedBigInteger('info_voter_id')->after('category_id')->nullable();
      $table->foreign('info_voter_id')->references('id')->on('group_role_round_users')->onDelete('set null');
      // FK constraint Info-Votato table
      $table->unsignedBigInteger('info_voted_id')->after('info_voter_id')->nullable();
      $table->foreign('info_voted_id')->references('id')->on('group_role_round_users')->onDelete('set null');
      // FK constraint Team-id utente votato table
      $table->unsignedBigInteger('team_id')->after('info_voted_id')->nullable();
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
    Schema::drop('votes', function(Blueprint $table) {
      // Removing the foreign key constraint: NomeTabella_NomeColonna_foreign
      // Removing FK constraint Categories table
      $table->dropForeign('votes_category_id_foreign');
      $table->dropColumn('category_id');
      // Removing FK constraint Info-Votante table
      $table->dropForeign('group_role_round_users_info_voter_id_foreign');
      $table->dropColumn('info_voter_id');
      // Removing FK constraint Info-Votato table
      $table->dropForeign('group_role_round_users_info_voted_id_foreign');
      $table->dropColumn('info_voted_id');
      // Removing FK constraint Team_id utente votato table
      $table->dropForeign('group_role_round_users_team_id_foreign');
      $table->dropColumn('team_id');
    });
  }
}
