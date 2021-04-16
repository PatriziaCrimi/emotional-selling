<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\GroupRoleRoundUser;
use App\Round;
use App\User;
use App\Vote;

class VoteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $round = Round::find(4); // valore del round
    $idAuth = Auth::user()->id; // mi prendo l'id dell'utente autenticato
     // valore combo auth id

    // Filtro per round
    if ($round -> name == 1) {
      // Filtro per ruolo  ( Sede:2)
      $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first();

      if ($auth -> role_id == 2 || $auth -> role_id == 1) {

          $usersGroups = GroupRoleRoundUser::where('round_id',1)->where('role_id','!=',2)->where('role_id','!=',1)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);

      }else {

        // Filtro autenticato giocatore
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();

        $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',1)->get();

        foreach ($userrow as $user) {
            $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',1)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);
          }

      }

    }

    if ($round -> name == 2) {

      $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first();

      if ($auth -> role_id == 2 || $auth -> role_id == 1) {

          $usersGroups = GroupRoleRoundUser::where('round_id',2)->where('role_id','!=',2)->where('role_id','!=',1)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);

      }else {

        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();

        $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',2)->get();

        foreach ($userrow as $user) {
            $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',2)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);
          }
      }

    }

    if ($round -> name == 3) {

      $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first();

      if ($auth -> role_id == 2 || $auth -> role_id == 1) {

          $usersGroups = GroupRoleRoundUser::where('round_id',3)->where('role_id','!=',2)->where('role_id','!=',1)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);

      }else {

        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();

        $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',3)->get();

        foreach ($userrow as $user) {
            $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',3)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);
          }

      }
    }
    return view('logged.votes.index',compact('usersGroups','round','auth'));
  }

  /**
  * Forms
  **/
  public function formUser($id)
  {
    $round = Round::find(4);
    $user = GroupRoleRoundUser::where('user_id',$id)->where('round_id',$round->name)->first(); // info utente votato
    $idAuth = Auth::user()->id; // info votante
    $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first();
    // dd($idComboAuth);
    // il form dello user da votare con le domande
    return view('logged.votes.show',compact('user','comboAuth'));
  }

  public function formTeam($id)
  {
    $round = Round::find(4);
    $user = null;
    $team = GroupRoleRoundUser::where('team_id',$id)->where('round_id',$round->name)->get();
    // dd($team);
    // il form del team da votare con le domande
    return view('logged.votes.show',compact('team','user','id'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function userStore(Request $request)
  {

    $data = $request->all();

    $newVote1 = new Vote();
    $newVote1-> info_voter_id = $data['info_voter_id'];
    $newVote1-> info_voted_id = $data['info_voted_id'];
    $newVote1-> category_id = $data['category1'];
    $newVote1-> value = $data['votesUser1'];
    $newVote1-> comment = $data['comment1'];

    $newVote1->save();

    $newVote2 = new Vote();
    $newVote2-> info_voter_id = $data['info_voter_id'];
    $newVote2-> info_voted_id = $data['info_voted_id'];
    $newVote2-> category_id = $data['category2'];
    $newVote2-> value = $data['votesUser2'];
    $newVote2-> comment = $data['comment2'];

    $newVote2->save();

    $newVote3 = new Vote();
    $newVote3-> info_voter_id = $data['info_voter_id'];
    $newVote3-> info_voted_id = $data['info_voted_id'];
    $newVote3-> category_id = $data['category3'];
    $newVote3-> value = $data['votesUser3'];
    $newVote3-> comment = $data['comment3'];
    
    $newVote3->save();

    return Redirect::route('logged.votes.index');
  }

  public function teamStore(Request $request)
  {

    $data = $request->all();
    dd($data);
    // le logiche per salvare i dati
    return Redirect::route('logged.votes.index');
  }
}
