<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;

class VoteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('logged.votes.index');
  }

  /**
  * Forms
  **/
  public function formUser($id)
  {
    // il form dello user da votare con le domande
    return view('logged.votes.show');
  }

  public function formTeam($id)
  {
    // il form del team da votare con le domande
    return view('logged.votes.show');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // le logiche per salvare i dati
    return Redirect::route('logged.votes.index');
  }
}
