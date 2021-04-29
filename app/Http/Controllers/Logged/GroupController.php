<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GroupRoleRoundUser;
use App\Round;
use App\Role;
use App\Button;


class GroupController extends Controller
{
  public function index()
  {
    $round = Round::find(4); // valore del round
    $button1 = Button::find(1); // attivazione votazione
    $button2 = Button::find(2); // stop votazione

    // Prendo gli ID dei ruoli
    $idAdmin = (Role::where('name', 'Admin')->first())->id;
    $idSede = (Role::where('name', 'Sede')->first())->id;
    $idDM = (Role::where('name', 'DM')->first())->id;
    $idDMjunior = (Role::where('name', 'DM Junior')->first())->id;
    $idOsservatore = (Role::where('name', 'Osservatore')->first())->id;
    $idMedico = (Role::where('name', 'Medico')->first())->id;
    $idISF = (Role::where('name', 'ISF')->first())->id;

    $idAuth = Auth::user()->id; // mi prendo l'id dell'utente autenticato
    // valore combo auth id

      // Filtro per ruolo  ( Sede:2)
    $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first();
    if ($auth -> role_id == $idSede || $auth -> role_id == $idAdmin) {

      $usersGroups = GroupRoleRoundUser::where('round_id',$round -> name)->where('role_id','!=',$idSede)->where('role_id','!=',$idAdmin)->where('role_id','!=',$idDM)->where('role_id','!=',$idDMjunior)->get()->groupBy(['group_id','team_id']);

    } else {
      // Filtro autenticato giocatore
      $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
      $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',$round -> name)->get();

      foreach ($userrow as $user) {
        $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',$round->name)->where('role_id','!=',$idDM)->where('role_id','!=',$idDMjunior)->get()->groupBy(['group_id','team_id']);
      }
    }

    return view('logged.groups.index',compact('usersGroups','round','auth', 'button1','button2'));
  }
}
