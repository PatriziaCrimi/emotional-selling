<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    // Visualizzo il pulsante --> al click del pulsante si inizia il round
    return view('logged.home');
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
