<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Group;
use App\Role;
use App\Team;
use App\Round;

class GroupController extends Controller
{
  public function index()
  {
    // Prendo l'id dell'utente autenticato e QUERY per prenderlo nel database
    $auth_user_id = Auth::user()->id;
    $auth_user = User::where('id', $auth_user_id)->first();

    // QUERY per ricavare i Gruppi dell'utente autenticato
    $groups_list = $auth_user->groups;

    // QUERY per ricavare i Ruoli dell'utente autenticato
    $roles_list = $auth_user->roles;

    $data = [
      'groups_list' => $groups_list,
      'roles_list' => $roles_list
    ];
    return view('logged.groups', $data);
  }
}
