<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GroupRoleRoundUser;
use App\Round;
use App\Vote;
use DB;

class HomeController extends Controller
{
  public function index()
  {

    $auth = Auth::user();
    $user = GroupRoleRoundUser::where('user_id',$auth -> id)->first();
    $round = Round::find(4);

    return view('logged.home',compact('user','round'));
  }

  public function rankings()
  {
    $round = Round::find(4);
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

    return view('logged.rankings',compact('votesRank','round'));
  }

  public function final()
  {
    $round = Round::find(4);

    return view('logged.final',compact('round'));
  }
}
