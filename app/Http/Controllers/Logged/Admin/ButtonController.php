<?php

namespace App\Http\Controllers\logged\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Button;

class ButtonController extends Controller
{
  public function updateStartVote(Request $request) {

    // funzione per modificare il round attuale SOLO lato ADMIN
    $data = $request->input('button1');
    $round = Button::find(1);
    $round -> status = $data;
    $round -> save();

    return redirect()->back();
  }

  public function updateStopVote(Request $request) {

    // funzione per modificare il round attuale SOLO lato ADMIN
    $data = $request->input('button2');
    $round = Button::find(2);
    $round -> status = $data;
    $round -> save();

    return redirect()->back();
  }
}
