<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupRoleRoundUser extends Model
{
  protected $fillable = [
    'user_id',
    'group_id',
    'role_id',
    'round_id',
    'team_id'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function role(){
    return $this->belongsTo('App\Role');
  }

  public function group(){
    return $this->belongsTo('App\Group');
  }
}
