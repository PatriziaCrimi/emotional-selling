<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $fillable = ['type'];

  // Many to Many between Users and Roles tables
  public function users() {
    return $this->belongsToMany('App\User');
  }

  // One to Many between Rounds and Roles tables
  public function round() {
    return $this->belongsTo('App\Round');
  }
}
