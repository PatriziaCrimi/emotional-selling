<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'lastname', 'username', 'password', 'team_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  // One to Many between Users and Roles tables
  public function role() {
    return $this->belongsTo('App\Role');
  }

  // One to Many between Users and Groups tables
  public function group() {
    return $this->belongsTo('App\Group');
  }

  // One to Many between Users and Teams tables
  public function team() {
    return $this->belongsTo('App\Team');
  }

  // Many to Many between Users and Votes tables
  public function votes() {
    return $this->belongsToMany('App\Vote');
  }

  // one to Many between Users and GroupRoleRoundUser tables
  public function grouproleroundusers() {
    return $this->hasMany('App\GroupRoleRoundUser');
  }
  /**
   * The attributes that should be cast to native types.
   *
   * */
  /*
  @var array

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
  */
}
