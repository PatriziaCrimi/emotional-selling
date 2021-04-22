<?php

namespace App\Http\Controllers\logged\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\CsvExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Vote;

class CsvfileController extends Controller
{
  public function index() {
    $data = Vote::latest()->paginate(10);
    // dd($data);
    return view('logged.csv_file_pagination',compact('data'))
           ->with('i',(request()->input('page',1) -1) *10);
  }

  public function exportCsv(Request $request){

    $fileName = 'voti.csv';
    $votes = Vote::all();

    $headers = array(
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    );

    $columns = array('Nome_votato', 'Cognome_Votato', 'Commento', 'Categoria', 'Voto');

    $callback = function() use($votes, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($votes as $vote) {

            $userVoterName = \App\GroupRoleRoundUser::where('id',$vote -> info_voter_id)->first();
            // echo $userVoterName -> user -> name;
            $userVoterLastName = \App\GroupRoleRoundUser::where('id',$vote -> info_voter_id)->first();
            // echo $userVoterLastName -> user -> lastname;

            $row['Nome_votato']  = $userVoterName -> user -> name;
            $row['Cognome_Votato']    = $userVoterLastName -> user -> lastname;
            $row['Commento']    = $vote->comment;
            $row['Categoria']  = $vote->category -> name;
            $row['Voto']  = $vote->value;

            fputcsv($file, array($row['Nome_votato'],
             $row['Cognome_Votato'],
             $row['Commento'],
             $row['Categoria'],
             $row['Voto']));
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
  }

}
