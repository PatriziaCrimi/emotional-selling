<?php

namespace App\Http\Controllers\logged\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
    $round = Round::find(4);
    $button1 = Button::find(1);
    $button2 = Button::find(2);
    $users = GroupRoleRoundUser::where('role_id',2)->where('round_id',$round->name)->get();
    $groups = Group::all();
    return view('logged.admin.sedegroups',compact('round','button1','button2','users','groups'));
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
