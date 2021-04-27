<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = ['name'];
  
  // One to Many between Votes and Categories tables
  public function vote() {
    return $this->belongsTo('App\Vote');
  }
}
