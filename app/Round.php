<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
  protected $fillable = ['name'];

  // One to Many between Rounds and Groups tables
  public function groups() {
    return $this->hasMany('App\Group');
  }

  // One to Many between Rounds and Roles tables
  public function roles() {
    return $this->hasMany('App\Role');
  }

  // One to Many between Rounds and Votes tables
  public function votes() {
    return $this->hasMany('App\Vote');
  }
}
