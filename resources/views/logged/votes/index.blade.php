@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}

  {{-- Se sono ISF o MEDICI  --}}
  @if (($auth -> role_id == 4) || ($auth -> role_id == 5))

   <h1>NON PUOI VOTARE</h1>

  @else

  {{-- Se SONO SEDE SEDE O OSSERVATORE --}}

    <div class="row justify-content-center">
      <div class="col-12">
        <h1 class="text-center">

          Stai Votando per il Round {{$round -> name}}
          @if ($auth -> role_id == 2)
           <span>

              <p> {{$auth -> user -> name}}</p>
              <p> {{$auth -> user -> lastname}}:</p>
              <p> {{$auth -> role -> name}}</p>

           </span>
          @endif

        </h1>
      </div>
    </div>
    {{-- Groups List --}}
    <div class="">
      <h1>PER MODIFICARE IL FATTO DI HAI VOTATO BISOGNEREBBE AGGIUNGERE 2 COLONNE CHE SE IL VOTO è DI TEAM O SINGOLO E CONTROLLARE I TEAM PERCHE FORSE HO VISTO 2 TEAM UGUALI IN UN ROUND ( TEAM 11 ROUND 2)</h1>
      @foreach ($usersGroups as $userGroup => $users)

        <div  class="container">
          <h2 class="show">Gruppo {{ $userGroup }}</h2>
        <div class="content watch">

            @foreach ($users as $key => $user)
{{-- AGGIUNTO CONTROLLO SE HAI GIA VOTATO!!!!!!!!!!!!!!!!!!!!! --}}
              @php
                $team = \App\GroupRoleRoundUser::where('team_id',$key)->where('round_id',$round->name)->first();
                $teamUserId = $team->id;
                $idTeamVoted = \App\Vote::where('info_voter_id',$voteCheckId)->where('info_voted_id',$teamUserId)->where('team_vote',1)->first();
                // dd($idTeamVoted,$teamUserId,$voteCheckId);
                // dd($player);
              @endphp
              {{-- SE NON é NULL HAI GIA VOTATO ALTRIMENTI NO --}}
              @if (!is_null($idTeamVoted))


                <a class="btn btn-primary" style="margin:30px;"> Hai Votato il Team {{$key}}
                </a>
              @else

                <a class="btn btn-primary" @click="getTeam({{$key}})" style="margin:30px;"> Vota il Team {{$key}}
                </a>

              @endif


                <div>

                  <div style="margin:50px;">

                      <table class="table table-dark">
                          <thead>

                            <tr>
                              <th scope="col">Team {{$key}}</th>
                              <th scope="col">Nome</th>
                              <th scope="col">Ruolo</th>
                              <th scope="col"></th>
                            </tr>

                          </thead>
                          @foreach ($user as $n => $player)
                           <tbody>
{{-- AGGIUNTO CONTROLLO SE HAI GIA VOTATO L'UTENTE SINGOLO --}}
                             @php
                               $idUserVoted = \App\Vote::where('info_voter_id',$voteCheckId)->where('info_voted_id',$player->id)->where('team_vote',0)->first();
                               // dd($player);
                             @endphp


                              @if ($player -> user -> id == Auth::user() -> id)
                                <th scope="row" style="color:yellow;">{{$n+1}}</th>
                                <td style="color:yellow;">{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
                                <td style="color:yellow;">{{ $player -> role -> name}}</td>
                                <td><a href="#">Vota</a></td>
                              @else
                                <th scope="row">{{$n+1}}</th>
                                <td>{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
                                <td>{{ $player -> role -> name}}</td>
{{-- SE é NULL FA IN UN MODO ALTRIMENTI IN UN ALTRO!!!! --}}
                                @if (is_null($idUserVoted))
                                  <td><a @click="getUser({{$player -> user -> id}})">Vota</a></td>
                                @else
                                  <td>Hai già votato</td>
                                @endif

                              @endif
{{-- {{ route('logged.votes.formUser',$player -> user -> id)}} --}}
                           </tbody>

                          @endforeach

                      </table>

                  </div>
                </div>

            @endforeach
            <div class="" v-if="showUserForm" style="    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: orange;">
              <form  id="form" action="{{ route('logged.user.voted')}}" class="form"  method="post">
                @csrf
                @method('post')

                {{-- Voto Categoria 1 --}}
                <p>Stai votando @{{this.userArray.userName.name}} @{{this.userArray.userName.lastname}}</p>

                <label for="votesUser1[]"></label>

                <input type="hidden" name="category1" value="1">
                <input type="hidden" name="info_voted_id" :value="this.userArray.user.id">
                <input type="hidden" name="info_voter_id" :value="this.userArray.comboAuth.id">
                <input type="hidden" class="input" name="votesUser1" value="0">
                <input type="checkbox" class="input" name="votesUser1" value="1">1
                <input type="checkbox" class="input" name="votesUser1" value="2">2
                <input type="checkbox" class="input" name="votesUser1" value="3">3
                <input type="checkbox" class="input" name="votesUser1" value="4">4
                <input type="checkbox" class="input" name="votesUser1" value="5">5
                <input type="checkbox" class="input" name="votesUser1" value="6">6
                <input type="checkbox" class="input" name="votesUser1" value="7">7
                <input type="checkbox" class="input" name="votesUser1" value="8">8
                <input type="checkbox" class="input" name="votesUser1" value="9">9
                <input type="checkbox" class="input" name="votesUser1" value="10">10<br>
                <textarea name="comment1" rows="4" cols="80"></textarea><br>

                <label for="votesUser2[]"></label>

                {{-- Voto Categoria 2 --}}

                <input type="hidden" name="category2" value="2">
                <input type="hidden" class="input" name="votesUser2" value="0">
                <input type="checkbox" class="input" name="votesUser2" value="1">1
                <input type="checkbox" class="input" name="votesUser2" value="2">2
                <input type="checkbox" class="input" name="votesUser2" value="3">3
                <input type="checkbox" class="input" name="votesUser2" value="4">4
                <input type="checkbox" class="input" name="votesUser2" value="5">5
                <input type="checkbox" class="input" name="votesUser2" value="6">6
                <input type="checkbox" class="input" name="votesUser2" value="7">7
                <input type="checkbox" class="input" name="votesUser2" value="8">8
                <input type="checkbox" class="input" name="votesUser2" value="9">9
                <input type="checkbox" class="input" name="votesUser2" value="10">10<br>
                <textarea name="comment2" rows="4" cols="80"></textarea><br>

                <label for="votesUser3[]"></label>

                {{-- Voto Categoria 3 --}}
                <input type="hidden" name="category3" value="3">
                <input type="hidden" class="input" name="votesUser3" value="0">
                <input type="checkbox" class="input" name="votesUser3" value="1">1
                <input type="checkbox" class="input" name="votesUser3" value="2">2
                <input type="checkbox" class="input" name="votesUser3" value="3">3
                <input type="checkbox" class="input" name="votesUser3" value="4">4
                <input type="checkbox" class="input" name="votesUser3" value="5">5
                <input type="checkbox" class="input" name="votesUser3" value="6">6
                <input type="checkbox" class="input" name="votesUser3" value="7">7
                <input type="checkbox" class="input" name="votesUser3" value="8">8
                <input type="checkbox" class="input" name="votesUser3" value="9">9
                <input type="checkbox" class="input" name="votesUser3" value="10">10<br>
                <textarea name="comment3" rows="4" cols="80"></textarea>


                <input style="margin-top:50px;" class="submit" type="submit" name="" value="Salva">
                <input @click="showUserForm = !showUserForm" style="margin-top:50px;" class="submit" type="submit" name="" value="Chiudi">
              </form>

            </div>
            <div class="" v-if="showTeamForm" style="    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: red;">

              <form  class="form" action="{{ route('logged.team.voted')}}" method="post">
                @csrf
                @method('post')
                <label for="votesTeam1[]"></label>

                <h3>Come valuti la domanda 1?</h3>

                <input type="hidden" name="category1" value="1">
                <input type="hidden" name="team_id" :value="this.teamArray.team[0].team_id">
                <input type="hidden" name="info_voter_id" :value="this.teamArray.comboAuth.id">
                {{-- {{$comboAuth->id}} --}}
                <input type="hidden" class="input" name="votesTeam1" value="0">
                <input type="checkbox" class="input" name="votesTeam1" value="1">1
                <input type="checkbox" class="input" name="votesTeam1" value="2">2
                <input type="checkbox" class="input" name="votesTeam1" value="3">3
                <input type="checkbox" class="input" name="votesTeam1" value="4">4
                <input type="checkbox" class="input" name="votesTeam1" value="5">5
                <input type="checkbox" class="input" name="votesTeam1" value="6">6
                <input type="checkbox" class="input" name="votesTeam1" value="7">7
                <input type="checkbox" class="input" name="votesTeam1" value="8">8
                <input type="checkbox" class="input" name="votesTeam1" value="9">9
                <input type="checkbox" class="input" name="votesTeam1" value="10">10<br><br>
                <textarea name="comment1" rows="4" cols="80"></textarea><br>

                <label for="votesTeam2[]"></label>

                <h3>Come valuti la domanda 2?</h3>
                <input type="hidden" name="category2" value="2">

                <input type="hidden" class="input" name="votesTeam2" value="0">
                <input type="checkbox" class="input" name="votesTeam2" value="1">1
                <input type="checkbox" class="input" name="votesTeam2" value="2">2
                <input type="checkbox" class="input" name="votesTeam2" value="3">3
                <input type="checkbox" class="input" name="votesTeam2" value="4">4
                <input type="checkbox" class="input" name="votesTeam2" value="5">5
                <input type="checkbox" class="input" name="votesTeam2" value="6">6
                <input type="checkbox" class="input" name="votesTeam2" value="7">7
                <input type="checkbox" class="input" name="votesTeam2" value="8">8
                <input type="checkbox" class="input" name="votesTeam2" value="9">9
                <input type="checkbox" class="input" name="votesTeam2" value="10">10<br>
                <textarea name="comment2" rows="4" cols="80"></textarea><br>


                <label for="votesTeam3[]"></label>

                <h3>Come valuti la domanda 3?</h3>

                <input type="hidden" name="category3" value="3">

                <input type="hidden" class="input" name="votesTeam3" value="0">
                <input type="checkbox" class="input" name="votesTeam3" value="1">1
                <input type="checkbox" class="input" name="votesTeam3" value="2">2
                <input type="checkbox" class="input" name="votesTeam3" value="3">3
                <input type="checkbox" class="input" name="votesTeam3" value="4">4
                <input type="checkbox" class="input" name="votesTeam3" value="5">5
                <input type="checkbox" class="input" name="votesTeam3" value="6">6
                <input type="checkbox" class="input" name="votesTeam3" value="7">7
                <input type="checkbox" class="input" name="votesTeam3" value="8">8
                <input type="checkbox" class="input" name="votesTeam3" value="9">9
                <input type="checkbox" class="input" name="votesTeam3" value="10">10<br>
                <textarea name="comment3" rows="4" cols="80"></textarea><br>

                <input style="margin-top:50px;" class="submit" type="submit" name="" value="Salva">
                <input @click="showTeamForm = !showTeamForm" style="margin-top:50px;" class="submit" type="submit" name="" value="Chiudi">
              </form>

            </div>
        </div>

     </div>

      @endforeach

      @if ($round -> name == 3)
        <a class="btn btn-dark" href="#">Termina il gioco</a>
      @else
        <a class="btn btn-dark" href="{{ route('logged.rankings')}}">Guarda la classifica parziale</a>
      @endif

    </div>

  @endif

{{-- </div> --}}
@endsection
