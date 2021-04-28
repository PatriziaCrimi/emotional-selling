<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysGroupUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('group_user', function (Blueprint $table) {

       $table -> foreign('user_id' , 'u-group_user')
              -> references('id')
              -> on('users');
       $table -> foreign('group_id' , 'g-group_user')
              -> references('id')
              -> on('groups');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('group_user', function (Blueprint $table) {

        $table -> dropForeign('u-group_user');
        $table -> dropForeign('g-group_user');

      });
    }
}
