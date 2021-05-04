<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = ['role_id', 'number', 'question', 'explanation'];

  // One to Many between Votes and Categories tables
  public function vote() {
    return $this->belongsTo('App\Vote');
  }

  // One to Many between Roles and Categories tables
  public function role() {
    return $this->belongsTo('App\Role');
  }
}
