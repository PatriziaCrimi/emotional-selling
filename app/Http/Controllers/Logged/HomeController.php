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
}
