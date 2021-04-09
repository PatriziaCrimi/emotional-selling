<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $fillable = ['name'];

  // Many to Many between Users and Groups tables
  public function users() {
    return $this->belongsToMany('App\User');
  }

  // One to Many between Rounds and Groups tables
  public function round() {
    return $this->belongsTo('App\Round');
  }

  // Many to Many between Teams and Groups tables
  public function teams() {
    return $this->belongsToMany('App\Team');
  }
}
