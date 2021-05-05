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
      ->join('categories','categories.id','=','votes.category_id')
      ->select('votes.team_id', 'teams.name',
            DB::raw("SUM(CASE WHEN team_vote = '2' THEN value ELSE 0 END) as `normalVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' THEN value / 2 ELSE 0 END) as `halfVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '2' AND category_id = '2' THEN value ELSE 0 END) as `obiezioni`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' AND category_id = '2' THEN value / 2 ELSE 0 END) as `obiezioniHalfVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '2' AND category_id = '4' THEN value ELSE 0 END) as `calltoaction`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' AND category_id = '4' THEN value / 2 ELSE 0 END) as `calltoactionHalfVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '2' AND categories.role_id = '7' THEN value ELSE 0 END) as `isf`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' AND categories.role_id = '7' THEN value / 2 ELSE 0 END) as `isfHalfVote`", 'votes.team_id'),
        )->groupBy('votes.team_id', 'teams.name')
      ->get();

      dd($votesCollection);

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

      foreach ($votesCollection as $key => $voteTeam) {
        $sumTeam = $voteTeam->normalVote + $voteTeam->halfVote;
        $sumIsf = $voteTeam->isf + $voteTeam->isfHalfVote;
        $teamName = $voteTeam->name;
        $scoresArrayIsf[$teamName] = array(
          'team_id' => $voteTeam->team_id,
          'name' => $teamName,
          'score' => $sumTeam,
          'isf' => $sumIsf
        );
      }

      $votesIsf = json_decode(json_encode($scoresArrayIsf),true);
      array_multisort( array_column($votesIsf, "score"), SORT_DESC, $votesIsf );

      foreach ($votesCollection as $key => $voteTeam) {
        $sumTeam = $voteTeam->normalVote + $voteTeam->halfVote;
        $sumObiezioni = $voteTeam->obiezioni + $voteTeam->obiezioniHalfVote;
        $teamName = $voteTeam->name;
        $scoresArrayObiezioni[$teamName] = array(
          'team_id' => $voteTeam->team_id,
          'name' => $teamName,
          'score' => $sumTeam,
          'scoreObiezioni' => $sumObiezioni
        );
      }

      $votesObiezioni = json_decode(json_encode($scoresArrayObiezioni),true);
      array_multisort( array_column($votesObiezioni, "score"), SORT_DESC, $votesObiezioni );

      foreach ($votesCollection as $key => $voteTeam) {
        $sumTeam = $voteTeam->normalVote + $voteTeam->halfVote;
        $sumCta = $voteTeam->calltoaction + $voteTeam->calltoactionHalfVote;
        $teamName = $voteTeam->name;
        $scoresArrayCta[$teamName] = array(
          'team_id' => $voteTeam->team_id,
          'name' => $teamName,
          'score' => $sumTeam,
          'cta' => $sumCta
        );
      }

      $votesCta = json_decode(json_encode($scoresArrayCta),true);
      array_multisort( array_column($votesCta, "score"), SORT_DESC, $votesCta );


      // dd($votesObiezioni);
      return view('logged.admin.rankings',compact('votesRank','votesObiezioni','votesIsf','votesCta','round','button1','button2', 'button3'));

    } else {
      abort(403);
    }
  }
}
