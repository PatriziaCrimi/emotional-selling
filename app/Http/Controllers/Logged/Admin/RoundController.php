<?php

namespace App\Http\Controllers\logged\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Round;

class RoundController extends Controller
{
  public function update(Request $request) {

    // funzione per modificare il round attuale SOLO lato ADMIN
    $data = $request->input('round');
    $round = Round::find(4);
    $round -> name = $data;
    $round -> save();

    return redirect()->back();
  }
}
