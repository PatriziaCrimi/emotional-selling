<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $fillable = ['name'];

  // One to Many between Users and Groups tables
  public function users() {
    return $this->belongsToMany('App\User');
  }
}
