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

    $votesCount = DB::table('votes')
    ->select(DB::raw('sum(value) as valore , info_voted_id'))
    ->groupBy('info_voted_id')
    ->orderBy('valore','DESC')
    ->get();

    return view('logged.rankings',compact('votesCount'));
  }

  public function final()
  {
    // view di saluti e ringraziamenti
    return view('logged.final');
  }
}
