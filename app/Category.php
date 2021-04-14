<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  // One to Many between Votes and Categories tables
  public function vote() {
    return $this->belongsTo('App\Vote');
  }
}
