<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\GroupRoleRoundUser;
use App\Round;
use App\User;
use App\Role;
use App\Vote;
use App\Button;

class VoteController extends Controller
{

  public function index()
  {
    $round = Round::find(4); // valore del round
    $button1 = Button::find(1); // attivazione votazione
    $button2 = Button::find(2); // stop votazione
    $idAuth = Auth::user()->id; // mi prendo l'id dell'utente autenticato

    // Prendo gli ID dei ruoli
    $idAdmin = (Role::where('name', 'Admin')->first())->id;
    $idSede = (Role::where('name', 'Sede')->first())->id;
    $idDM = (Role::where('name', 'DM')->first())->id;
    $idDMjunior = (Role::where('name', 'DM Junior')->first())->id;
    $idOsservatore = (Role::where('name', 'Osservatore')->first())->id;
    $idMedico = (Role::where('name', 'Medico')->first())->id;
    $idISF = (Role::where('name', 'ISF')->first())->id;

    // Salvo in un array tutti gli id degli Admin
    $idAdmins = GroupRoleRoundUser::where('role_id',$idAdmin)->get();
    foreach ($idAdmins as $key => $admin) {
      $idAdminsArray[] = $admin->user_id;
    }

      // Controllo se l'utente loggato è un Admin
      if(in_array($idAuth, $idAdminsArray)) {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first();
      } else {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
      }

      // Filtro per ruolo  ( Sede:2, Admin:1)
      if ($auth -> role_id == $idSede || $auth -> role_id == $idAdmin) {
        $usersGroups = GroupRoleRoundUser::where('round_id',$round -> name)->whereIn('role_id',[$idMedico,$idISF])->get()->groupBy(['group_id','team_id']);
      } else {
        // Filtro autenticato giocatore
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
        $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',$round -> name)->get();
        foreach ($userrow as $user) {
          $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',$round -> name)->where('role_id','!=',$idDM)->where('role_id','!=',$idDMjunior)->where('role_id','!=',$idOsservatore)->get()->groupBy(['group_id','team_id']);
        }
      }

    // Variabili necessarie per il controllo "Hai già votato"
    $voteCheck = Vote::where('info_voter_id',$auth->id)->first();
    if(!is_null($voteCheck)){
      $voteCheckId = $voteCheck -> info_voter_id;
      return view('logged.votes.index',compact('voteCheck','voteCheckId','usersGroups','round','auth', 'button1','button2'));
    }else {
      $voteCheckId = 0;
      return view('logged.votes.index',compact('voteCheckId','usersGroups','round','auth', 'button1','button2'));
    }
  }

  public function sedeShowGroups($id){
    $round = Round::find(4); // valore del round
    $button1 = Button::find(1); // attivazione votazione
    $button2 = Button::find(2); // stop votazione
    $idAuth = Auth::user()->id; // mi prendo l'id dell'utente autenticato

    // Prendo gli ID dei ruoli
    $idAdmin = (Role::where('name', 'Admin')->first())->id;
    $idSede = (Role::where('name', 'Sede')->first())->id;
    $idDM = (Role::where('name', 'DM')->first())->id;
    $idDMjunior = (Role::where('name', 'DM Junior')->first())->id;
    $idOsservatore = (Role::where('name', 'Osservatore')->first())->id;
    $idMedico = (Role::where('name', 'Medico')->first())->id;
    $idISF = (Role::where('name', 'ISF')->first())->id;

    // Salvo in un array tutti gli id degli Admin
    $idAdmins = GroupRoleRoundUser::where('role_id',$idAdmin)->get();
    foreach ($idAdmins as $key => $admin) {
      $idAdminsArray[] = $admin->user_id;
    }

      // Controllo se l'utente loggato è un Admin
      if(in_array($idAuth, $idAdminsArray)) {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first();
      } else {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
      }

      // Filtro per ruolo  ( Sede:2, Admin:1)
      if ($auth -> role_id == $idSede || $auth -> role_id == $idAdmin) {
        $usersGroups = GroupRoleRoundUser::where('round_id',$round -> name)->whereIn('role_id',[$idMedico,$idISF])->where('group_id',$id)->get()->groupBy(['group_id','team_id']);
      } else {
        // Filtro autenticato giocatore
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
        $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',$round -> name)->get();
        foreach ($userrow as $user) {
          $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',$round -> name)->where('role_id','!=',$idDM)->where('role_id','!=',$DMjunior)->where('role_id','!=',$Osservatore)->get()->groupBy(['group_id','team_id']);
        }
      }

    // Variabili necessarie per il controllo "Hai già votato"
    $voteCheck = Vote::where('info_voter_id',$auth->id)->first();
    if(!is_null($voteCheck)){
      $voteCheckId = $voteCheck -> info_voter_id;
      return view('logged.votes.sedeshowgroups',compact('voteCheck','voteCheckId','usersGroups','round','auth', 'button1','button2'));
    }else {
      $voteCheckId = 0;
      return view('logged.votes.sedeshowgroups',compact('voteCheckId','usersGroups','round','auth', 'button1','button2'));
    }
  }

  /**
  * Forms
  **/

  public function createVoteTeam($id)
  {
    $round = Round::find(4); // valore round attuale
    $button1 = Button::find(1); // attivazione votazione
    $button2 = Button::find(2); // stop votazione
    $team_exist = GroupRoleRoundUser::where('team_id',$id)->where('round_id',$round->name)->first();

    // Prendo gli ID dei ruoli
    $idAdmin = (Role::where('name', 'Admin')->first())->id;
    $idSede = (Role::where('name', 'Sede')->first())->id;
    $idDM = (Role::where('name', 'DM')->first())->id;
    $idDMjunior = (Role::where('name', 'DM Junior')->first())->id;
    $idOsservatore = (Role::where('name', 'Osservatore')->first())->id;
    $idMedico = (Role::where('name', 'Medico')->first())->id;
    $idISF = (Role::where('name', 'ISF')->first())->id;

    // Salvo in un array tutti gli id degli Admin
    $idAdmins = GroupRoleRoundUser::where('role_id',$idAdmin)->get();
    foreach ($idAdmins as $key => $admin) {
      $idAdminsArray[] = $admin->user_id;
    }

    // Controllo che il parametro nell'url (ossia l'id del team) esista nella tabella Teams
    if ($team_exist != null) {
      // Se esiste, controllo che l'utente autenticato abbia i permessi per votare quel Team
      $idAuth = Auth::user()->id; // info votante

      // Controllo se l'utente loggato è un Admin
      if(in_array($idAuth, $idAdminsArray)) {
        // Se è Admin ha round NULL
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first();
      } else {
        // Se è Sede
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
      }

      // Controllo se l'utente è un semplice giocatore (né Sede né Admin)
      if($auth->role_id !== $idSede && $auth->role_id !== $idAdmin) {

        // Controllo che il gruppo ID dell'utente autenticato è lo stesso dei membri del Team cliccato
        if(($auth->group_id == $team_exist->group_id) && ($team_exist->role_id != $idOsservatore)) {
          $user = null; // user null per controllo view votes.show
          $team = GroupRoleRoundUser::where('team_id',$id)->where('round_id',$round->name)->get(); //team da visualizzare

          $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first(); //valore riga colonna combo per utente autorizzato

          return view('logged.votes.create',compact('team','user','id','comboAuth', 'button1','button2'));

        } else {
          // Se il team non è votabile (non è nel Round dell'utente loggato) esce un 403
          abort(403);
        }

      } else {
        // #CASO "ELSE": l'utente autenticato è Sede o Admin
        // Se l'utente cliccato non è Sede lo puoi votare
        $user = null; // user null per controllo view votes.show
        $team = GroupRoleRoundUser::where('team_id',$id)->where('round_id',$round->name)->get(); //team da visualizzare

        // Controllo se l'utente loggato è un Admin
        if(in_array($idAuth, $idAdminsArray)) {
          // Se è Admin ha round NULL
          $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->first();
        } else {
          // Se è Sede
          $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first(); //valore riga colonna combo per utente autorizzato
        }

        return view('logged.votes.create',compact('team','user','id','comboAuth', 'round','button1','button2'));
      }
    } else {
      // Se l'id non esiste l'errore è un 404
      abort(404);
    }
  }

  public function teamStore(Request $request)
  {
    // Storing all form data received
    $data = $request->all();
    $round = Round::find(4);
    $teamMembers = GroupRoleRoundUser::where('team_id',$data['team_id'])->where('round_id',$round->name)->get();
    // membri del team che si sta votando

    // Controllo se il valore del voto della Categoria 1 non è nullo (è stata votata)
    if($request->voteTeam1) {
      // per ogni membro del team creo il voto della Categoria 1
      foreach ($teamMembers as $i => $member) {
        $newVote1 = new Vote();
        $newVote1-> info_voter_id = $data['info_voter_id'];
        $newVote1-> info_voted_id = $member -> id;
        $newVote1-> category_id = $data['category1_id'];
        $newVote1-> value = $data['voteTeam1'];
        if($request->comment1) {
          $newVote1-> comment = $data['comment1'];
        };
        $newVote1-> team_vote = 1;  // è stato votato il team
        $newVote1-> team_id = $data['team_id']; // team_id del team votato

        $newVote1->save();
      }
    }

    // Controllo se il valore del voto della Categoria 2 non è nullo (è stata votata)
    if($request->voteTeam2) {
      // per ogni membro del team creo il voto della Categoria 2
      foreach ($teamMembers as $i => $member) {
        $newVote2 = new Vote();
        $newVote2-> info_voter_id = $data['info_voter_id'];
        $newVote2-> info_voted_id = $member -> id;
        $newVote2-> category_id = $data['category2_id'];
        $newVote2-> value = $data['voteTeam2'];
        if($request->comment2) {
          $newVote2-> comment = $data['comment2'];
        };
        $newVote2-> team_vote = 1; // è stato votato il team
        $newVote2-> team_id = $data['team_id']; // team_id del team votato

        $newVote2->save();
      }
    }

    // Controllo se il valore del voto della Categoria 3 non è nullo (è stata votata)
    if($request->voteTeam3) {
      // per ogni membro del team creo il voto della Categoria 3
      foreach ($teamMembers as $i => $member) {
        $newVote3 = new Vote();
        $newVote3-> info_voter_id = $data['info_voter_id'];
        $newVote3-> info_voted_id = $member -> id;
        $newVote3-> category_id = $data['category3_id'];
        $newVote3-> value = $data['voteTeam3'];
        if($request->comment3) {
          $newVote3-> comment = $data['comment3'];
        };
        $newVote3-> team_vote = 1; // è stato votato il team
        $newVote3-> team_id = $data['team_id']; // team_id del team votato

        $newVote3->save();
      }
    }

    // Controllo se il valore del voto della Categoria 4 non è nullo (è stata votata)
    if($request->voteTeam4) {
      // per ogni membro del team creo il voto della Categoria 4
      foreach ($teamMembers as $i => $member) {
        $newVote4 = new Vote();
        $newVote4-> info_voter_id = $data['info_voter_id'];
        $newVote4-> info_voted_id = $member -> id;
        $newVote4-> category_id = $data['category4_id'];
        $newVote4-> value = $data['voteTeam4'];
        if($request->comment4) {
          $newVote4-> comment = $data['comment4'];
        };
        $newVote4-> team_vote = 1; // è stato votato il team
        $newVote4-> team_id = $data['team_id']; // team_id del team votato

        $newVote4->save();
      }
    }

    // Queste 4 istanze sono necessarie per la QUERY per la Classifica per Team

    // Controllo se il valore del voto della Categoria 1 non è nullo (è stata votata)
    if($request->voteTeam1) {
      // Categoria 1
      $newVote1 = new Vote();
      $newVote1-> info_voter_id = $data['info_voter_id'];
      $newVote1-> info_voted_id = null;
      $newVote1-> category_id = $data['category1_id'];
      $newVote1-> value = $data['voteTeam1'];
      if($request->comment1) {
        $newVote1-> comment = $data['comment1'];
      };
      $newVote1-> team_vote = 2;  // è stato votato il team
      $newVote1-> team_id = $data['team_id']; // team_id del team votato

      $newVote1->save();
    }

    // Categoria 2
    if($request->voteTeam2) {
      $newVote2 = new Vote();
      $newVote2-> info_voter_id = $data['info_voter_id'];
      $newVote2-> info_voted_id = null;
      $newVote2-> category_id = $data['category2_id'];
      $newVote2-> value = $data['voteTeam2'];
      if($request->comment2) {
        $newVote2-> comment = $data['comment2'];
      };
      $newVote2-> team_vote = 2;  // è stato votato il team
      $newVote2-> team_id = $data['team_id']; // team_id del team votato

      $newVote2->save();
    }

    // Categoria 3
    if($request->voteTeam3) {
      $newVote3 = new Vote();
      $newVote3-> info_voter_id = $data['info_voter_id'];
      $newVote3-> info_voted_id = null;
      $newVote3-> category_id = $data['category3_id'];
      $newVote3-> value = $data['voteTeam3'];
      if($request->comment3) {
        $newVote3-> comment = $data['comment3'];
      };
      $newVote3-> team_vote = 2;  // è stato votato il team
      $newVote3-> team_id = $data['team_id']; // team_id del team votato

      $newVote3->save();
    }

    // Categoria 4
    if($request->voteTeam4) {
      $newVote4 = new Vote();
      $newVote4-> info_voter_id = $data['info_voter_id'];
      $newVote4-> info_voted_id = null;
      $newVote4-> category_id = $data['category4_id'];
      $newVote4-> value = $data['voteTeam4'];
      if($request->comment4) {
        $newVote4-> comment = $data['comment4'];
      };
      $newVote4-> team_vote = 2;  // è stato votato il team
      $newVote4-> team_id = $data['team_id']; // team_id del team votato

      $newVote4->save();
    }

    return Redirect::route('logged.votes.index');
  }

  public function showVoteTeam($id)
  {
    $round = Round::find(4); // valore round attuale
    $button1 = Button::find(1); // attivazione votazione
    $button2 = Button::find(2); // stop votazione
    $team_exist = GroupRoleRoundUser::where('team_id',$id)->where('round_id',$round->name)->first();

    // Prendo gli ID dei ruoli
    $idAdmin = (Role::where('name', 'Admin')->first())->id;
    $idSede = (Role::where('name', 'Sede')->first())->id;
    $idDM = (Role::where('name', 'DM')->first())->id;
    $idDMjunior = (Role::where('name', 'DM Junior')->first())->id;
    $idOsservatore = (Role::where('name', 'Osservatore')->first())->id;
    $idMedico = (Role::where('name', 'Medico')->first())->id;
    $idISF = (Role::where('name', 'ISF')->first())->id;

    // Salvo in un array tutti gli id degli Admin
    $idAdmins = GroupRoleRoundUser::where('role_id',$idAdmin)->get();
    foreach ($idAdmins as $key => $admin) {
      $idAdminsArray[] = $admin->user_id;
    }

    // Controllo che il parametro nell'url (ossia l'id del team) esista nella tabella Teams
    if ($team_exist != null) {
      // Se esiste, controllo che l'utente autenticato abbia i permessi per visualizzare quel Team
      $idAuth = Auth::user()->id; // info votante

      // Controllo se l'utente loggato è un Admin
      if(in_array($idAuth, $idAdminsArray)) {
        // Se è Admin ha round NULL
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first();
        $currentVotes = Vote::where('team_vote', 2)->where('team_id', $id)->where('info_voter_id', $auth->id)->get();
      } else {
        // Se è Sede
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
        $currentVotes = Vote::where('team_vote', 2)->where('team_id', $id)->where('info_voter_id', $auth->id)->get();
      }

      // Controllo se l'utente è un semplice giocatore (né Sede né Admin)
      if($auth->role_id !== $idSede && $auth->role_id !== $idAdmin) {

        // Controllo che il gruppo ID dell'utente autenticato è lo stesso dei membri del Team cliccato
        if(($auth->group_id == $team_exist->group_id) && ($team_exist->role_id != $idOsservatore)) {
          $user = null; // user null per controllo view votes.show
          $team = GroupRoleRoundUser::where('team_id',$id)->where('round_id',$round->name)->get(); //team da visualizzare

          $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first(); //valore riga colonna combo per utente autorizzato

          $currentVotes = Vote::where('team_vote', 2)->where('team_id', $id)->where('info_voter_id', $comboAuth->id)->get();

          return view('logged.votes.show',compact('team','user','id','comboAuth', 'button1','button2', 'currentVotes'));

        } else {
          // Se il team non è visualizzabile (non è nel Round dell'utente loggato) esce un 403
          abort(403);
        }

      } else {
        // #CASO "ELSE": l'utente autenticato è Sede o Admin
        // Se l'utente cliccato non è Sede lo può visualizzare
        $user = null; // user null per controllo view votes.show
        $team = GroupRoleRoundUser::where('team_id',$id)->where('round_id',$round->name)->get(); //team da visualizzare

        // Controllo se l'utente loggato è un Admin
        if(in_array($idAuth, $idAdminsArray)) {
          // Se è Admin ha round NULL
          $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->first();
          $currentVotes = Vote::where('team_vote', 2)->where('team_id', $id)->where('info_voter_id', $comboAuth->id)->get();
        } else {
          // Se è Sede
          $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first(); //valore riga colonna combo per utente autorizzato
          $currentVotes = Vote::where('team_vote', 2)->where('team_id', $id)->where('info_voter_id', $comboAuth->id)->get();
        }

        return view('logged.votes.show',compact('team','user','id','comboAuth', 'round','button1','button2', 'currentVotes'));
      }
    } else {
      // Se l'id non esiste l'errore è un 404
      abort(404);
    }
  }
}
