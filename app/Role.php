<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $fillable = ['name'];

  // One to Many between Users and Roles tables
  public function users() {
    return $this->hasMany('App\User');
  }
}
