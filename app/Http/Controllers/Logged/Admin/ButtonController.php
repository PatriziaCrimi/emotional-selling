<?php

namespace App\Http\Controllers\logged\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Button;
use App\Round;
use App\GroupRoleRoundUser;
use App\User;
use App\Group;

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

  public function sedeOptions(){
    $idAuth = Auth::user()->id;
    $idAdmins = GroupRoleRoundUser::where('role_id',1)->get();
    foreach ($idAdmins as $key => $admin) {
      $idAdminsArray[] = $admin->user_id;
    }

    // Controllo se l'utente loggato è un Admin
    if(in_array($idAuth, $idAdminsArray)) {
      $round = Round::find(4);
      $button1 = Button::find(1);
      $button2 = Button::find(2);
      $users = GroupRoleRoundUser::where('role_id',2)->where('round_id',$round->name)->get();
      $groups = Group::all();

      return view('logged.admin.sedegroups',compact('round','button1','button2','users','groups'));
    } else {
      abort(403);
    }
  }

  public function sedeOptionsReq(Request $request) {
    $data = $request->all();

    Validator::make($data, [
         'groups' => 'required',
     ]) -> validate();
    $user = User::findOrFail($data['user_id']);
    $groups = Group::findOrFail($data['groups']);
    $user -> groups() -> sync($groups);
    return redirect()->back();
  }
}
