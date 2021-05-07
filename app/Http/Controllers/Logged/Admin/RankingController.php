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

    $scoresArray = array();
    $scoresArrayIsf = array();
    $scoresArrayCta = array();
    $scoresArrayParoleTossiche = array();

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

       /*
       $dm = DB::table("votes")
       ->join('teams','teams.id','=','votes.team_id')
       ->select(DB::raw('sum(value / 2) as valore','votes.team_id'),'teams.name')
       ->where('team_vote',3)->groupBy('votes.team_id','teams.name')
       ->orderBy('valore','DESC')->get();
       */

      // ---------------------- QUERY PER SOMMA TEAM ---------------------- //

      /*
      $votesCount = DB::table("votes")
      ->join('teams','teams.id','=','votes.team_id')
      ->select(DB::raw('sum(value) as valore','votes.team_id'),'teams.name')
      ->where('team_vote',2)->groupBy('votes.team_id','teams.name')
      ->orderBy('valore','DESC')->get();

      $final= [$dm,$votesCount];
      $votesRank = json_decode(json_encode($final),true);
      */

      $votesCollection = DB::table('votes')
      ->join('teams','teams.id','=','votes.team_id')
      ->join('categories','categories.id','=','votes.category_id')
      ->select('votes.team_id', 'teams.name',
            DB::raw("SUM(CASE WHEN team_vote = '2' THEN value ELSE 0 END) as `normalVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' THEN value / 2 ELSE 0 END) as `halfVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '2' AND categories.role_id = '7' THEN value ELSE 0 END) as `isf`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' AND categories.role_id = '7' THEN value / 2 ELSE 0 END) as `isfHalfVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '2' AND category_id = '3' THEN value ELSE 0 END) as `calltoaction`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' AND category_id = '3' THEN value / 2 ELSE 0 END) as `calltoactionHalfVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '2' AND category_id = '2' THEN value ELSE 0 END) as `paroleTossiche`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' AND category_id = '2' THEN value / 2 ELSE 0 END) as `paroleTossicheHalfVote`", 'votes.team_id'),

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

      // Ex aequo ISF
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

      // Ex aequo Call To Action
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

      // Ex aequo Parole Tossiche
      foreach ($votesCollection as $key => $voteTeam) {
        $sumTeam = $voteTeam->normalVote + $voteTeam->halfVote;
        $sumParoleTossiche = $voteTeam->paroleTossiche + $voteTeam->paroleTossicheHalfVote;
        $teamName = $voteTeam->name;
        $scoresArrayParoleTossiche[$teamName] = array(
          'team_id' => $voteTeam->team_id,
          'name' => $teamName,
          'score' => $sumTeam,
          'paroleTossiche' => $sumParoleTossiche
        );
      }

      $votesParoleTossiche = json_decode(json_encode($scoresArrayParoleTossiche),true);
      array_multisort( array_column($votesParoleTossiche, "score"), SORT_DESC, $votesParoleTossiche );

      return view('logged.admin.rankings',compact('votesRank','votesIsf', 'votesCta', 'votesParoleTossiche', 'round','button1','button2', 'button3'));

    } else {
      abort(403);
    }
  }

  public function indexAvg() {

    $round = Round::find(4);
    $button1 = Button::find(1); // attivazione votazione
    $button2 = Button::find(2); // stop votazione
    $button3 = Button::find(3); // inizia Workshop

    $idAuth = Auth::user() -> id;
    $idCombo = GroupRoleRoundUser::where('user_id',$idAuth)->first();

    $scoresArray = array();
    $scoresArrayIsf = array();
    $scoresArrayCta = array();
    $scoresArrayParoleTossiche = array();

    if ($idCombo->role->name == "Admin") {

      // Collection per Punteggi dei Voti ricevuti per Team divisi tra normali e dimezzati
      $votesCollection = DB::table('votes')
      ->join('teams','teams.id','=','votes.team_id')
      ->join('categories','categories.id','=','votes.category_id')
      ->select('votes.team_id', 'teams.name',
            DB::raw("SUM(CASE WHEN team_vote = '2' THEN value ELSE 0 END) as `normalVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' THEN value / 2 ELSE 0 END) as `halfVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '2' AND categories.role_id = '7' THEN value ELSE 0 END) as `isf`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' AND categories.role_id = '7' THEN value / 2 ELSE 0 END) as `isfHalfVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '2' AND category_id = '3' THEN value ELSE 0 END) as `calltoaction`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' AND category_id = '3' THEN value / 2 ELSE 0 END) as `calltoactionHalfVote`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '2' AND category_id = '2' THEN value ELSE 0 END) as `paroleTossiche`", 'votes.team_id'),
            DB::raw("SUM(CASE WHEN team_vote = '3' AND category_id = '2' THEN value / 2 ELSE 0 END) as `paroleTossicheHalfVote`", 'votes.team_id'),

        )->groupBy('votes.team_id', 'teams.name')
      ->get();

      // ------------------------------ MEDIA PER CLASSIFICA GENERALE ------------------------------

      // Collection per Numero dei Voti ricevuti per Team
      $votesQuantityCollection = DB::table('votes')
      ->join('teams','teams.id','=','votes.team_id')
      ->join('categories','categories.id','=','votes.category_id')
      ->select('votes.team_id', 'teams.name',
        DB::raw('count(*) as `votesCount`')
      ) ->whereIn('team_vote',[2,3])
      ->groupBy('votes.team_id', 'teams.name')
      ->get();

      // Array per Punteggio totale dei Voti ricevuti per Team
      foreach ($votesCollection as $key => $voteTeam) {
        $sumTeam = $voteTeam->normalVote + $voteTeam->halfVote;
        $teamName = $voteTeam->name;
        $scoresArray[$teamName] = array(
          'team_id' => $voteTeam->team_id,
          'name' => $teamName,
          'score' => $sumTeam,
        );
      }

      // Array per la media per Team
      foreach ($scoresArray as $key => $team) {
        foreach ($votesQuantityCollection as $index => $quantity) {
          if($team['team_id'] == $quantity->team_id) {
            $avgTeam = $team['score'] / $quantity->votesCount;
            $avgArray[$quantity->name] = array(
              'team_id' => $quantity->team_id,
              'name' => $quantity->name,
              'avg' => $avgTeam,
            );
          }
        }
      }

      $votesRankAvg = json_decode(json_encode($avgArray),true);
      array_multisort( array_column($votesRankAvg, "avg"), SORT_DESC, $votesRankAvg );

      /*
      // Classifica media generale
      $avg = Vote::select('team_id', \DB::raw('avg(value) as avg'))
              ->whereIn('team_vote',[2,3])
              ->groupBy('team_id')
              ->orderBy('avg','DESC')
              ->get();
      */

      // ------------------------------ EX-AEQUO PER ISF ------------------------------

      /*
      // Classifica media ISF
      $avgIsf = Vote::select('team_id', \DB::raw('avg(value) as avg'))
                ->join('categories','categories.id','=','votes.category_id')
                ->whereIn('team_vote',[2,3])
                ->where('categories.role_id',7)
                ->groupBy('team_id')
                ->orderBy('avg','DESC')
                ->get();
      */

      // Collection per Numero dei Voti ricevuti per Team per ISF
      $isfQuantityCollection = DB::table('votes')
      ->join('teams','teams.id','=','votes.team_id')
      ->join('categories','categories.id','=','votes.category_id')
      ->select('votes.team_id', 'teams.name',
        DB::raw('count(*) as `votesCount`')
      ) ->whereIn('team_vote',[2,3])
      ->where('categories.role_id', 7)
      ->groupBy('votes.team_id', 'teams.name')
      ->get();

      // Array per Punteggio totale dei Voti ricevuti per Team per ISF
      foreach ($votesCollection as $key => $voteTeam) {
        $sumTeam = $voteTeam->normalVote + $voteTeam->halfVote;
        $sumIsf = $voteTeam->isf + $voteTeam->isfHalfVote;
        $scoresArrayIsf[$voteTeam->name] = array(
          'team_id' => $voteTeam->team_id,
          'name' => $teamName,
          'score' => $sumTeam,
          'sumIsf' => $sumIsf
        );
      }

      // Array per la media ISF per Team
      foreach ($scoresArrayIsf as $key => $team) {
        foreach ($isfQuantityCollection as $index => $quantity) {
          if($team['team_id'] == $quantity->team_id) {
            $avgIsf = $team['sumIsf'] / $quantity->votesCount;
            $avgArrayIsf[$quantity->name] = array(
              'team_id' => $quantity->team_id,
              'name' => $quantity->name,
              'score' => $team['score'],
              'avgIsf' => $avgIsf,
            );
          }
        }
      }

      $votesAvgIsf = json_decode(json_encode($avgArrayIsf),true);
      array_multisort( array_column($votesAvgIsf, "score"), SORT_DESC, $votesAvgIsf );

// ------------------------- EX-AEQUO PER CALL TO ACTION -------------------------

      /*
      // Classifica media Call to action
      $avgCta =  Vote::select('team_id', \DB::raw('avg(value) as avg'))
                ->whereIn('team_vote',[2,3])
                ->where('category_id',4)
                ->groupBy('team_id')
                ->orderBy('avg','DESC')
                ->get();
      */

      // Collection per Numero dei Voti ricevuti per Team per CTA
      $ctaQuantityCollection = DB::table('votes')
      ->join('teams','teams.id','=','votes.team_id')
      ->select('votes.team_id', 'teams.name',
        DB::raw('count(*) as `votesCount`')
      ) ->whereIn('team_vote',[2,3])
      ->where('category_id', 3)
      ->groupBy('votes.team_id', 'teams.name')
      ->get();

      // Array per Punteggio totale dei Voti ricevuti per Team per CTA
      foreach ($votesCollection as $key => $voteTeam) {
        $sumTeam = $voteTeam->normalVote + $voteTeam->halfVote;
        $sumCta = $voteTeam->calltoaction + $voteTeam->calltoactionHalfVote;
        $scoresArrayCta[$voteTeam->name] = array(
          'team_id' => $voteTeam->team_id,
          'name' => $teamName,
          'score' => $sumTeam,
          'sumCta' => $sumCta
        );
      }

      // Array per la media ISF per Team per CTA
      foreach ($scoresArrayCta as $key => $team) {
        foreach ($ctaQuantityCollection as $index => $quantity) {
          if($team['team_id'] == $quantity->team_id) {
            $avgCta = $team['sumCta'] / $quantity->votesCount;
            $avgArrayCta[$quantity->name] = array(
              'team_id' => $quantity->team_id,
              'name' => $quantity->name,
              'score' => $team['score'],
              'avgCta' => $avgCta,
            );
          }
        }
      }

      $votesAvgCta = json_decode(json_encode($avgArrayCta),true);
      array_multisort( array_column($votesAvgCta, "score"), SORT_DESC, $votesAvgCta );

// ------------------------- EX-AEQUO PER PAROLE TOSSICHE -------------------------

      /*
      // Classifica media Tossica
      $avgTox =  Vote::select('team_id', \DB::raw('avg(value) as avg'))
                ->whereIn('team_vote',[2,3])
                ->where('category_id',3)
                ->groupBy('team_id')
                ->orderBy('avg','DESC')
                ->get();
      */

      // Collection per Numero dei Voti ricevuti per Team per PAROLE TOSSICHE
      $toxQuantityCollection = DB::table('votes')
      ->join('teams','teams.id','=','votes.team_id')
      ->select('votes.team_id', 'teams.name',
        DB::raw('count(*) as `votesCount`')
      ) ->whereIn('team_vote',[2,3])
      ->where('category_id', 2)
      ->groupBy('votes.team_id', 'teams.name')
      ->get();

      // Array per Punteggio totale dei Voti ricevuti per Team per PAROLE TOSSICHE
      foreach ($votesCollection as $key => $voteTeam) {
        $sumTeam = $voteTeam->normalVote + $voteTeam->halfVote;
        $sumTox = $voteTeam->paroleTossiche + $voteTeam->paroleTossicheHalfVote;
        $scoresArrayTox[$voteTeam->name] = array(
          'team_id' => $voteTeam->team_id,
          'name' => $teamName,
          'score' => $sumTeam,
          'sumTox' => $sumTox
        );
      }

      // Array per la media ISF per Team per PAROLE TOSSICHE
      foreach ($scoresArrayTox as $key => $team) {
        foreach ($toxQuantityCollection as $index => $quantity) {
          if($team['team_id'] == $quantity->team_id) {
            $avgTox = $team['sumTox'] / $quantity->votesCount;
            $avgArrayTox[$quantity->name] = array(
              'team_id' => $quantity->team_id,
              'name' => $quantity->name,
              'score' => $team['score'],
              'avgTox' => $avgTox,
            );
          }
        }
      }

      $votesAvgTox = json_decode(json_encode($avgArrayTox),true);
      array_multisort( array_column($votesAvgTox, "score"), SORT_DESC, $votesAvgTox );

     return view('logged.admin.rankingsAvg',compact('votesRankAvg','votesAvgIsf','votesAvgCta','votesAvgTox','round','button1','button2', 'button3'));

    } else {
      abort(403);
    }
  }
}
