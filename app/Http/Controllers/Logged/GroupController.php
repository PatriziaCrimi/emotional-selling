<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Group;
use App\Role;
use App\Team;
use App\Round;

class GroupController extends Controller
{
  public function index()
  {
    // Qui ci sarà la logica per far vedere i gruppi
    // e il pulsante "VOTA"
    return view('logged.groups.index');
  }
}
