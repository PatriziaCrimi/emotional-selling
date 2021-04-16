<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GroupRoleRoundUser;
use App\Round;


class GroupController extends Controller
{
  public function index()
  {
    $round = Round::find(4); // valore del round
    $idAuth = Auth::user()->id; // mi prendo l'id dell'utente autenticato
    $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first(); // valore combo auth id

    // Filtro per round
    if ($round -> name == 1) {
      // Filtro per ruolo  ( Sede:2)
      if ($auth -> role_id == 2) {

          $usersGroups = GroupRoleRoundUser::where('round_id',1)->where('role_id','!=',2)->where('role_id','!=',1)->get()->groupBy(['group_id','team_id']);

      }else {

        $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',1)->get();

        foreach ($userrow as $user) {
            $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',1)->get()->groupBy(['group_id','team_id']);
          }

      }

    }

    if ($round -> name == 2) {

      if ($auth -> role_id == 2) {

          $usersGroups = GroupRoleRoundUser::where('round_id',2)->where('role_id','!=',2)->where('role_id','!=',1)->get()->groupBy(['group_id','team_id']);

      }else {

        $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',2)->get();

        foreach ($userrow as $user) {
            $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',2)->get()->groupBy(['group_id','team_id']);
          }

      }

    }

    if ($round -> name == 3) {

      if ($auth -> role_id == 2) {

          $usersGroups = GroupRoleRoundUser::where('round_id',3)->where('role_id','!=',2)->where('role_id','!=',1)->get()->groupBy(['group_id','team_id']);

      }else {

        $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',3)->get();

        foreach ($userrow as $user) {
            $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',3)->get()->groupBy(['group_id','team_id']);
          }

      }
    }

    return view('logged.groups.index',compact('usersGroups','round','auth'));
  }
}
