<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
  protected $fillable = [
    'value',
    'comment',
    'category_id',
    'info_voter_id',
    'info_voted_id',
    'team_vote',
    'team_id'
  ];

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
    return $this->belongsTo('App\User');
  }

  // One to Many between Votes and Categories tables
  public function category() {
    return $this->belongsTo('App\Category');
  }

  public function grouprolerounduser() {
    return $this->belongsTo('App\GroupRoleRoundUser');
  }
}
