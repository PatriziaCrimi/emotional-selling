<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  protected $fillable = ['name'];

  // Many to Many between Teams and Groups tables
  public function groups() {
    return $this->belongsToMany('App\Group');
  }

  // One to Many between Users and Teams tables
  public function users() {
    return $this->hasMany('App\User');
  }

  // One to Many between Teams and Votes tables
  public function votes() {
    return $this->hasMany('App\Vote');
  }
}
