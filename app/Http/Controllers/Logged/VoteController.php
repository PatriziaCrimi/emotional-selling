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

      $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first();

      if ($auth -> role_id == 2 || $auth -> role_id == 1) {

          $usersGroups = GroupRoleRoundUser::where('round_id',3)->where('role_id','!=',2)->where('role_id','!=',1)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);

      }else {

        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
        // dd($auth);

        $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',3)->get();

        foreach ($userrow as $user) {
            $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',3)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);
          }

      }
    }
    // dd($auth);

    ///// AGGIUNTO QUESTO PEZZO PER PORTARMI AL CONTROLLO HAI GIA VOTATO
    $voteCheck = Vote::where('info_voter_id',$auth->id)->first();
    if(!is_null($voteCheck)){
      $voteCheckId = $voteCheck -> info_voter_id;
      return view('logged.votes.index',compact('voteCheck','voteCheckId','usersGroups','round','auth'));
    }else {
      $voteCheckId = 0;
      return view('logged.votes.index',compact('voteCheckId','usersGroups','round','auth'));
    }
    // dd($voteCheckId);

  }

  /**
  * Forms
  **/
  public function formUser($id)
  {
    $round = Round::find(4); // valore round attuale
    $user = GroupRoleRoundUser::where('user_id',$id)->where('round_id',$round->name)->first(); // info utente votato
    $idAuth = Auth::user()->id; // info votante
    $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first();
    $userName = User::where('id',$id)->first();
    // dd($userName);

    // return view('logged.votes.show',compact('user','comboAuth'));


    //// CAMBIATI I RETURN IN JSON!!!!
    return  response()->json(compact('user','comboAuth','userName'), 200);

  }

  public function formTeam($id)
  {
    $round = Round::find(4); // valore round attuale
    $user = null; // user null per controllo view votes.show
    $team = GroupRoleRoundUser::where('team_id',$id)->where('round_id',$round->name)->get(); //team da visualizzare
    $idAuth = Auth::user()->id; // info votante
    $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first(); //valore riga colonna combo per utente autorizzato

    /// CAMBIATI I RETUNR IN JSONN!!!!
    return  response()->json(compact('team','user','id','comboAuth'), 200);
  }

  public function userStore(Request $request)
  {

    $data = $request->all();
    // dd($data);
    // voto domanda 1

    $newVote1 = new Vote();
    $newVote1-> info_voter_id = $data['info_voter_id'];
    $newVote1-> info_voted_id = $data['info_voted_id'];
    $newVote1-> category_id = $data['category1'];
    $newVote1-> value = $data['votesUser1'];
    $newVote1-> comment = $data['comment1'];
    $newVote1-> team_vote = 0;
    $newVote1-> user_vote = 1;

    $newVote1->save();

    // voto domanda 2

    $newVote2 = new Vote();
    $newVote2-> info_voter_id = $data['info_voter_id'];
    $newVote2-> info_voted_id = $data['info_voted_id'];
    $newVote2-> category_id = $data['category2'];
    $newVote2-> value = $data['votesUser2'];
    $newVote2-> comment = $data['comment2'];
    $newVote2-> team_vote = 0;
    $newVote2-> user_vote = 1;

    $newVote2->save();

    // voto domanda 3

    $newVote3 = new Vote();
    $newVote3-> info_voter_id = $data['info_voter_id'];
    $newVote3-> info_voted_id = $data['info_voted_id'];
    $newVote3-> category_id = $data['category3'];
    $newVote3-> value = $data['votesUser3'];
    $newVote3-> comment = $data['comment3'];
    $newVote3-> team_vote = 0;
    $newVote3-> user_vote = 1;

    $newVote3->save();

    return redirect()->back();
    // Redirect::route('logged.votes.index')
  }

  public function teamStore(Request $request)
  {

    $data = $request->all();
    // dd($data);
    $round = Round::find(4);
    $teamMembers = GroupRoleRoundUser::where('team_id',$data['team_id'])->where('round_id',$round->name)->get();
    // membri del team che si sta votando

    foreach ($teamMembers as $i => $member) {

      // per ogni membro del team creo 3 voti

      $newVote1 = new Vote();
      $newVote1-> info_voter_id = $data['info_voter_id'];
      $newVote1-> info_voted_id = $member -> id;
      $newVote1-> category_id = $data['category1'];
      $newVote1-> value = $data['votesTeam1'];
      $newVote1-> comment = $data['comment1'];
      $newVote1-> team_vote = 1;
      $newVote1-> user_vote = 0;

      $newVote1->save();

      $newVote2 = new Vote();
      $newVote2-> info_voter_id = $data['info_voter_id'];
      $newVote2-> info_voted_id = $member -> id;
      $newVote2-> category_id = $data['category2'];
      $newVote2-> value = $data['votesTeam2'];
      $newVote2-> comment = $data['comment2'];
      $newVote2-> team_vote = 1;
      $newVote2-> user_vote = 0;

      $newVote2->save();

      $newVote3 = new Vote();
      $newVote3-> info_voter_id = $data['info_voter_id'];
      $newVote3-> info_voted_id = $member -> id;
      $newVote3-> category_id = $data['category3'];
      $newVote3-> value = $data['votesTeam3'];
      $newVote3-> comment = $data['comment3'];
      $newVote3-> team_vote = 1;
      $newVote3-> user_vote = 0;

      $newVote3->save();
    }

    return redirect()->back();

  }
}
