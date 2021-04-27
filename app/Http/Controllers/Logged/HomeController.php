<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GroupRoleRoundUser;
use App\Round;
use App\Vote;
use App\Button;
use DB;

class HomeController extends Controller
{
  public function index()
  {

    $auth = Auth::user();
    $user = GroupRoleRoundUser::where('user_id',$auth -> id)->first();
    $round = Round::find(4);
    $button1 = Button::find(1); // attivazione votazione
    $button2 = Button::find(2); // stop votazione

    return view('logged.home',compact('user','round','button1','button2'));
  }
}
