<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
  protected $fillable = ['value', 'voter_id', 'user_voted_id', 'team_id', 'round_id'];

  // One to Many between Rounds and Votes tables
  public function round() {
    return $this->belongsTo('App\Round');
  }

  // One to Many between Teams and Votes tables
  public function team() {
    return $this->belongsTo('App\Team');
  }

  // One to Many between Users and Votes tables
  public function user() {
    return $this->belongsTo('App\Vote');
  }
}
