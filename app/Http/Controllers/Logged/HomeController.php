<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GroupRoleRoundUser;
use App\Round;

class HomeController extends Controller
{
  public function index()
  {
    // Visualizzo il pulsante --> al click del pulsante si inizia il round
    $auth = Auth::user();
    $user = GroupRoleRoundUser::where('user_id',$auth -> id)->first();
    $round = Round::find(4);
    // dd($user);
    return view('logged.home',compact('user','round'));
  }

  public function rankings()
  {
    // logica della visualizzazione classifica
    return view('logged.rankings');
  }

  public function final()
  {
    // view di saluti e ringraziamenti
    return view('logged.final');
  }
}
