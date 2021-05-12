<?php

namespace App\Http\Controllers\logged\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vote;
use App\GroupRoleRoundUser;
use App\Round;
use App\Button;

class CsvfileController extends Controller
{
  public function index() {

    $round = Round::find(4);
    $button1 = Button::find(1);
    $button2 = Button::find(2);
    $button3 = Button::find(3); // inizia Workshop

    $idAuth = Auth::user()->id;
    $idAdmins = GroupRoleRoundUser::where('role_id',1)->get();
    foreach ($idAdmins as $key => $admin) {
      $idAdminsArray[] = $admin->user_id;
    }

    // Controllo se l'utente loggato è un Admin
    if(in_array($idAuth, $idAdminsArray)) {
      $data = Vote::latest()->whereIn('team_vote',[2,3])->paginate(10);
      // dd($data);

      return view('logged.admin.csv_file_pagination',compact('data','round','button1','button2', 'button3'))
             ->with('i',(request()->input('page',1) -1) *10);
    } else {
      abort(403);
    }

  }

  public function exportCsv(Request $request){

    $idAuth = Auth::user()->id;
    $idAdmins = GroupRoleRoundUser::where('role_id',1)->get();
    foreach ($idAdmins as $key => $admin) {
      $idAdminsArray[] = $admin->user_id;
    }

    // Controllo se l'utente loggato è un Admin
    if(in_array($idAuth, $idAdminsArray)) {

      $fileName = 'voti.csv';
      $votes = Vote::whereIn('team_vote',[2,3])->get();

      $headers = array(
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
      );

      $columns = array('Nome_votante','    Cognome_Votante', '     Commento', '     Team_votato','    Categoria', '     Voto');

      $callback = function() use($votes, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($votes as $vote) {

          $userVoterName = \App\GroupRoleRoundUser::where('id',$vote -> info_voter_id)->first();
          // echo $userVoterName -> user -> name;
          $userVoterLastName = \App\GroupRoleRoundUser::where('id',$vote -> info_voter_id)->first();
          // echo $userVoterLastName -> user -> lastname;

          $row['Nome_votante']  = $userVoterName -> user -> name;
          $row['Cognome_Votante']    = $userVoterLastName -> user -> lastname;
          if (is_null($vote->comment)) {
            $row['Commento'] = 'Nessun commento dato';
          }else {
            $row['Commento'] = $vote->comment;
          }
          $row['Categoria']  = $vote->category -> question;
          $row['Team_votato'] = $vote->team -> name;
          $row['Voto']  = $vote->value;

          fputcsv($file, array($row['Nome_votante'],
          '        '.$row['Cognome_Votante'],
          '        '.$row['Commento'],
          '        '.$row['Team_votato'],
          '        '.$row['Categoria'],
          '        '.$row['Voto']));
        }

        fclose($file);
      };

      return response()->stream($callback, 200, $headers);

    } else {
      abort(403);
    }
  }
}
