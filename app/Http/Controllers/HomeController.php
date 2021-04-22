<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GroupRoleRoundUser;
use App\Round;
use App\Button;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
  */
  /*
   @return void

  public function __construct()
  {
    $this->middleware('auth');
  }
  */

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('auth.login');
  }
}
