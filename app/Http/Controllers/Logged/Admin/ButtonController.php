<?php

namespace App\Http\Controllers\logged\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Button;
use App\Round;
use App\GroupRoleRoundUser;
use App\User;
use App\Group;
use App\Vote;
use App\Team;
use App\Role;

class ButtonController extends Controller
{
  public function startWorkshop(Request $request) {

    // Funzione per far comparire in pagina il form del Login
    $data = $request->input('button3');
    $button3 = Button::find(3);
    $button3->status = $data;
    $button3->save();

    return redirect()->back();
  }

  public function updateStartVote(Request $request) {

    // Visualizzazione pulsante "Vota" a inizio votazione
    $data = $request->input('button1');
    $round = Button::find(1);
    $round -> status = $data;
    $round -> save();

    return redirect()->back();
  }

  public function updateStopVote(Request $request) {

    // Visualizzazione pulsante "Home" a fine votazione
    $data = $request->input('button2');
    $round = Button::find(2);
    $round -> status = $data;
    $round -> save();

    return redirect()->back();
  }

  public function sedeOptions(){
    $idAuth = Auth::user()->id;
    $idAdmins = GroupRoleRoundUser::where('role_id',1)->get();
    foreach ($idAdmins as $key => $admin) {
      $idAdminsArray[] = $admin->user_id;
    }

    // Controllo se l'utente loggato è un Admin
    if(in_array($idAuth, $idAdminsArray)) {
      $round = Round::find(4);
      $button1 = Button::find(1);
      $button2 = Button::find(2);
      $button3 = Button::find(3); // inizia Workshop
      $users = GroupRoleRoundUser::where('role_id',2)->where('round_id',$round->name)->get();
      $groups = Group::all();

      return view('logged.admin.sedegroups',compact('round','button1','button2', 'button3', 'users','groups'));
    } else {
      abort(403);
    }
  }

  public function sedeOptionsReq(Request $request) {
    $data = $request->all();

    Validator::make($data, [
         'groups' => 'required',
     ]) -> validate();
    $user = User::findOrFail($data['user_id']);
    $groups = Group::findOrFail($data['groups']);
    $user -> groups() -> sync($groups);
    return redirect()->back();
  }

  public function sedeOptionsDetach() {

    //cancello tutte le associazioni delle sedi
    $users = User::all();
    foreach ($users as $user) {
      $user -> groups() -> detach();
    }
    return redirect()->back();
  }

  public function showVotes(){

    $idAuth = Auth::user()->id;
    $idAdmins = GroupRoleRoundUser::where('role_id',1)->get();
    foreach ($idAdmins as $key => $admin) {
      $idAdminsArray[] = $admin->user_id;
    }

    if(in_array($idAuth, $idAdminsArray)) {
      $round = Round::find(4);
      $button1 = Button::find(1);
      $button2 = Button::find(2);
      $button3 = Button::find(3); // inizia Workshop
      $users = User::orderBy('lastname','ASC')->get();
      $rounds = Round::where('id','!=',4)->get();

      return view('logged.admin.votes',compact('round','button1','button2', 'button3', 'users','rounds'));
    } else {
      abort(403);
    }

  }

  public function getListVotes(Request $request) {
    $data = $request->all();
    $query = GroupRoleRoundUser::where('user_id',$data['user_id'])->where('round_id',$data['round_id'])->first();
    $votes = Vote::where('info_voter_id',$query->id)->where('team_vote',2)->get();
    foreach ($votes as $vote) {
      $array = [];
      $category = $vote -> category -> question;
      $info_voter_id = GroupRoleRoundUser::where('id',$vote -> info_voter_id)->first();
      $role = Role::where('id',$info_voter_id -> role_id)->first();
      $round = Round::where('id',$info_voter_id -> round_id)->first();
      $name = User::where('id',$info_voter_id -> user_id)->first();
      $team = Team::where('id',$vote->team_id)->first();
      $comment = strlen($vote->comment) > 50 ? substr($vote->comment,0,50)."..." : $vote->comment;
      $array = array(
        'id' => $vote -> id,
        'value' => $vote -> value,
        'category' => $category,
        'role' => $role -> name,
        'round' => $round -> name,
        'name' => $name -> name,
        'lastname' => $name -> lastname,
        'team' => $team -> name,
        'comment' => $comment,
        'vote_time' => $vote -> created_at->format('H:i:s m/d'),
      );
      $finalArray[] = $array;
    }

    return response()->json($finalArray);

  }

  public function getVoting(){

    $idAuth = Auth::user()->id;
    $idAdmins = GroupRoleRoundUser::where('role_id',1)->get();
    foreach ($idAdmins as $key => $admin) {
      $idAdminsArray[] = $admin->user_id;
    }

    if(in_array($idAuth, $idAdminsArray)) {

      $round = Round::find(4);
      $button1 = Button::find(1);
      $button2 = Button::find(2);
      $button3 = Button::find(3); // inizia Workshop
      $users = User::orderBy('lastname','ASC')->get();
      $rounds = Round::where('id','!=',4)->get();

      return view('logged.admin.voting',compact('round','button1','button2', 'button3', 'users','rounds'));
    } else {
      abort(403);
    }
  }

  public function getVotingLive(Request $request) {
    $data = $request -> all();
    $combo = GroupRoleRoundUser::where('role_id','!=',1)->where('role_id','!=',6)->where('role_id','!=',7)->where('round_id',$data['round_id'])->get();
    foreach ($combo as $user) {
      $vote = Vote::where('info_voter_id',$user->id)->first();
      $utente = User::where('id',$user->user_id)->first();
      $role = Role::where('id',$user->role_id)->first();
      if (!is_null($vote)) {
        $array = array(
          'name' => $utente -> name,
          'lastname' => $utente -> lastname,
          'role' => $role -> name,
          'vote' => 'Ha votato',
          'vote_time' => $vote -> created_at->format('H:i:s m/d'),
        );
        $finalArray[] = $array;
      }else {
        $array = array(
          'name' => $utente -> name,
          'lastname' => $utente -> lastname,
          'role' => $role -> name,
          'vote' => 'Non ha votato',
          'vote_time' => 'in attesa',
        );
        $finalArray[] = $array;
      }
    }

    return response()->json($finalArray);

  }

}
