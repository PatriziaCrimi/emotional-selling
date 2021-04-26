<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\GroupRoleRoundUser;
use App\Round;
use App\User;
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

    // Salvo in un array tutti gli id degli Admin
    $idAdmins = GroupRoleRoundUser::where('role_id',1)->get();
    foreach ($idAdmins as $key => $admin) {
      $idAdminsArray[] = $admin->user_id;
    }

    // Filtro per round

    // ------------------------- ROUND 1 -------------------------
    if ($round -> name == 1) {

      // Controllo se l'utente loggato è un Admin
      if(in_array($idAuth, $idAdminsArray)) {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first();
      } else {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
      }

      // Filtro per ruolo  ( Sede:2, Admin:1)
      if ($auth -> role_id == 2 || $auth -> role_id == 1) {
        $usersGroups = GroupRoleRoundUser::where('round_id',1)->where('role_id','!=',2)->where('role_id','!=',1)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);
      } else {
        // Filtro autenticato giocatore
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
        $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',1)->get();
        foreach ($userrow as $user) {
          $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',1)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);
        }
      }
    }

    // ------------------------- ROUND 2 -------------------------
    if ($round -> name == 2) {
      // Controllo se l'utente loggato è un Admin
      if(in_array($idAuth, $idAdminsArray)) {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first();
      } else {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first();
      }

      // Filtro per ruolo  ( Sede:2, Admin:1)
      if ($auth -> role_id == 2 || $auth -> role_id == 1) {
          $usersGroups = GroupRoleRoundUser::where('round_id',2)->where('role_id','!=',2)->where('role_id','!=',1)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);
      } else {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
        $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',2)->get();
        foreach ($userrow as $user) {
          $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',2)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);
        }
      }
    }

    // ------------------------- ROUND 3 -------------------------
    if ($round -> name == 3) {
      // Controllo se l'utente loggato è un Admin
      if(in_array($idAuth, $idAdminsArray)) {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first();
      } else {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first();
      }

      // Filtro per ruolo  ( Sede:2, Admin:1)
      if ($auth -> role_id == 2 || $auth -> role_id == 1) {
          $usersGroups = GroupRoleRoundUser::where('round_id',3)->where('role_id','!=',2)->where('role_id','!=',1)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);
      } else {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
        $userrow = GroupRoleRoundUser::where('user_id','=',$idAuth)->where('round_id',3)->get();
        foreach ($userrow as $user) {
          $usersGroups = GroupRoleRoundUser::where('group_id',$user -> group_id)->where('round_id',3)->where('role_id','!=',3)->get()->groupBy(['group_id','team_id']);
        }
      }
    }

    ///// AGGIUNTO QUESTO PEZZO PER PORTARMI AL CONTROLLO HAI GIA VOTATO
    $voteCheck = Vote::where('info_voter_id',$auth->id)->first();
    // dd($voteCheck,$auth->id);
    if(!is_null($voteCheck)){
      $voteCheckId = $voteCheck -> info_voter_id;
      return view('logged.votes.index',compact('voteCheck','voteCheckId','usersGroups','round','auth','button1','button2'));
    }else {
      $voteCheckId = 0;
      return view('logged.votes.index',compact('voteCheckId','usersGroups','round','auth','button1','button2'));
    }
  }

  /**
  * Forms
  **/
  public function formUser($id)
  {
    $round = Round::find(4); // valore round attuale
    $button1 = Button::find(1); // attivazione votazione
    $button2 = Button::find(2); // stop votazione
    $user = GroupRoleRoundUser::where('user_id',$id)->where('round_id',$round->name)->first(); // info utente votato

    // Salvo in un array tutti gli id degli Admin
    $idAdmins = GroupRoleRoundUser::where('role_id',1)->get();
    foreach ($idAdmins as $key => $admin) {
      $idAdminsArray[] = $admin->user_id;
    }

    // Controllo che il parametro nell'url (ossia l'id dello user) esista nella tabella Users
    if ($user != null) {
      // Se esiste, controllo che l'utente autenticato abbia i permessi per votare quel giocatore
      $idAuth = Auth::user()->id; // info votante

      // Controllo se l'utente loggato è un Admin
      if(in_array($idAuth, $idAdminsArray)) {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->first();
      } else {
        $auth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round -> name)->first();
      }

      // Controllo se l'utente è un semplice giocatore (né Sede né Admin)
      if($auth->role_id !== 2 && $auth->role_id !== 1) {

        // Controllo che il gruppo ID dell'utente autenticato è lo stesso del gruppo ID dell'utente cliccato
        if(($auth->group_id == $user->group_id) && ($user->role_id != 3)) {
          // Se è lo stesso procedo
          $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first();
          $userName = User::where('id',$id)->first();

          return view('logged.votes.show',compact('user','comboAuth','button1','button2'));

        } else {
          // Se l'utente non è votabile (non è del mio gruppo o è un Osservatore o è Sede) esce un 403
          abort(403);
        }

      } else if(($user->role_id !== 2)) {
        // Se l'utente cliccato non è Sede lo puoi votare

        // Controllo se l'utente loggato è un Admin
        if(in_array($idAuth, $idAdminsArray)) {
          // Se è Admin ha round NULL
          $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->first();
        } else {
          // Se è Sede
          $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first();
        }

        $userName = User::where('id',$id)->first();
        return view('logged.votes.show',compact('user','comboAuth', 'round', 'button1','button2'));
      } else {
        // Se l'utente non è votabile (è un altro membro della Sede) esce un 403
        abort(403);
      }

    } else {
      // Se l'id non esiste l'errore è un 404
      abort(404);
    }
  }

  public function formTeam($id)
  {
    $round = Round::find(4); // valore round attuale
    $button1 = Button::find(1); // attivazione votazione
    $button2 = Button::find(2); // stop votazione
    $team_exist = GroupRoleRoundUser::where('team_id',$id)->where('round_id',$round->name)->first();

    // Salvo in un array tutti gli id degli Admin
    $idAdmins = GroupRoleRoundUser::where('role_id',1)->get();
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
      if($auth->role_id !== 2 && $auth->role_id !== 1) {

        // Controllo che il gruppo ID dell'utente autenticato è lo stesso dei membri del Team cliccato
        if(($auth->group_id == $team_exist->group_id) && ($team_exist->role_id != 3)) {
          $user = null; // user null per controllo view votes.show
          $team = GroupRoleRoundUser::where('team_id',$id)->where('round_id',$round->name)->get(); //team da visualizzare

          $comboAuth = GroupRoleRoundUser::where('user_id',$idAuth)->where('round_id',$round->name)->first(); //valore riga colonna combo per utente autorizzato

          return view('logged.votes.show',compact('team','user','id','comboAuth', 'button1','button2'));

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

        return view('logged.votes.show',compact('team','user','id','comboAuth', 'round','button1','button2'));
      }
    } else {
      // Se l'id non esiste l'errore è un 404
      abort(404);
    }
  }

  public function userStore(Request $request)
  {
    // Storing all form data received
    $data = $request->all();
    $userCombo = GroupRoleRoundUser::where('id',$data['info_voted_id'])->first();
    // Controllo se il valore del voto della Categoria 1 non è nullo (è stata votata)
    if($request->voteUser1) {
      // New Instance: voto domanda 1
      $newVote1 = new Vote();
      $newVote1-> info_voter_id = $data['info_voter_id'];
      $newVote1-> info_voted_id = $data['info_voted_id'];
      $newVote1-> category_id = $data['category1_id'];
      $newVote1-> value = $data['voteUser1'];
      if($request->comment1) {
        $newVote1-> comment = $data['comment1'];
      };
      $newVote1-> team_vote = 0;  // è stato votato lo user
      $newVote1-> team_id = $userCombo -> team_id; // team_id utente votato

      $newVote1->save();
    };

    // Controllo se il valore del voto della Categoria 2 non è nullo (è stata votata)
    if($request->voteUser2) {
      // New Instance: voto domanda 2
      $newVote2 = new Vote();
      $newVote2-> info_voter_id = $data['info_voter_id'];
      $newVote2-> info_voted_id = $data['info_voted_id'];
      $newVote2-> category_id = $data['category2_id'];
      $newVote2-> value = $data['voteUser2'];
      if($request->comment2) {
        $newVote2-> comment = $data['comment2'];
      };
      $newVote2-> team_vote = 0; // è stato votato lo user
      $newVote2-> team_id = $userCombo -> team_id; // team_id utente votato

      $newVote2->save();
    }

    // Controllo se il valore del voto della Categoria 3 non è nullo (è stata votata)
    if($request->voteUser3) {
      // New Instance: voto domanda 3
      $newVote3 = new Vote();
      $newVote3-> info_voter_id = $data['info_voter_id'];
      $newVote3-> info_voted_id = $data['info_voted_id'];
      $newVote3-> category_id = $data['category3_id'];
      $newVote3-> value = $data['voteUser3'];
      if($request->comment3) {
        $newVote3-> comment = $data['comment3'];
      };
      $newVote3-> team_vote = 0; // è stato votato lo user
      $newVote3-> team_id = $userCombo -> team_id; // team_id utente votato

      $newVote3->save();
    }

    return Redirect::route('logged.votes.index');
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
      // per ogni membro del team creo il voto della Categoria 1
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

    return Redirect::route('logged.votes.index');
  }
}
