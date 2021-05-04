<?php

namespace App\Http\Controllers\Logged\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GroupRoleRoundUser;
use App\Round;
use App\Vote;
use App\Button;
use DB;

class RankingController extends Controller
{
  public function index()
  {
    $round = Round::find(4);
    $button1 = Button::find(1); // attivazione votazione
    $button2 = Button::find(2); // stop votazione
    $button3 = Button::find(3); // inizia Workshop

    $idAuth = Auth::user() -> id;
    $idCombo = GroupRoleRoundUser::where('user_id',$idAuth)->first();

    if ($idCombo->role->name == "Admin") {

      // ---------------------- QUERY PER USER ----------------------

      /*
      $votesCount = DB::table('votes')
      ->join('group_role_round_users','group_role_round_users.id','=','votes.info_voted_id')
      ->where('role_id','!=','2')
      ->where('role_id','!=','1')
      ->where('role_id','!=','3')
      ->join('users','users.id','=','group_role_round_users.user_id')
      ->select(DB::raw('sum(value) as valore, votes.info_voted_id'),'group_role_round_users.user_id','users.name','users.lastname')
      ->groupBy('info_voted_id','group_role_round_users.user_id','users.name','users.lastname')
      ->orderBy('valore','DESC')
      ->get();

      $votesRank = json_decode(json_encode($votesCount),true);
      */

      // ---------------------- QUERY PER TEAM ---------------------- //

      /*
      $votesCount = DB::table('votes')
      ->join('teams','teams.id','=','votes.team_id')
      ->join('group_role_round_users','group_role_round_users.id','=','votes.info_voted_id')
      ->select(DB::raw('sum(value) as valore, votes.team_id'),'teams.name','group_role_round_users.round_id')
       ->groupBy('team_id','teams.name','group_role_round_users.round_id')
       ->orderBy('valore','DESC')
       ->get();

       $votesRank = json_decode(json_encode($votesCount),true);
       */

       // $dm = DB::table("votes")
       // ->join('teams','teams.id','=','votes.team_id')
       // ->select(DB::raw('sum(value / 2) as valore','votes.team_id'),'teams.name')
       // ->where('team_vote',3)->groupBy('votes.team_id','teams.name')
       // ->orderBy('valore','DESC')->get();

      // ---------------------- QUERY PER SOMMA TEAM ---------------------- //

      // $votesCount = DB::table("votes")
      // ->join('teams','teams.id','=','votes.team_id')
      // ->select(DB::raw('sum(value) as valore','votes.team_id'),'teams.name')
      // ->where('team_vote',2)->groupBy('votes.team_id','teams.name')
      // ->orderBy('valore','DESC')->get();
      //

      // $final= [$dm,$votesCount];
      // $votesRank = json_decode(json_encode($final),true);

      $votesCollection = DB::table('votes')
      ->join('teams','teams.id','=','votes.team_id')
      ->select('votes.team_id', 'teams.name',
            DB::raw("SUM(CASE WHEN team_vote = '2' THEN value ELSE 0 END) as `normalVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' THEN value / 2 ELSE 0 END) as `halfVote`", 'votes.team_id')
        )->groupBy('votes.team_id', 'teams.name')
      ->get();

      foreach ($votesCollection as $key => $voteTeam) {
        $sumTeam = $voteTeam->normalVote + $voteTeam->halfVote;
        $teamName = $voteTeam->name;
        $scoresArray[$teamName] = array(
          'team_id' => $voteTeam->team_id,
          'name' => $teamName,
          'score' => $sumTeam
        );
      }

      $votesRank = json_decode(json_encode($scoresArray),true);
      array_multisort( array_column($votesRank, "score"), SORT_DESC, $votesRank );

      return view('logged.admin.rankings',compact('votesRank','round','button1','button2', 'button3'));

    } else {
      abort(403);
    }
  }
}
