<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupRoleUserTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('group_role_user', function (Blueprint $table) {
      $table->id();
      // FK constraint con Users table
      $table->unsignedBigInteger('user_id')->nullable();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
      // FK constraint con Roles table
      $table->unsignedBigInteger('role_id')->nullable();
      $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
      // FK constraint con Groups table
      $table->unsignedBigInteger('group_id')->nullable();
      $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null');
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
    Schema::dropIfExists('group_role_user');
  }
}
