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
      'name', 'lastname', 'username', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  // Many to Many between Users and Roles tables
  public function roles() {
    return $this->belongsToMany('App\Role');
  }

  // Many to Many between Users and Groups tables
  public function groups() {
    return $this->belongsToMany('App\Group');
  }

  // One to Many between Users and Teams tables
  public function team() {
    return $this->belongsTo('App\Team');
  }

  // One to Many between Users and Votes tables
  public function votes() {
    return $this->hasMany('App\Vote');
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
