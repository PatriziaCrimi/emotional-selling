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

                <a class="btn btn-primary" href="{{route('logged.votes.formTeam', $key)}}" style="margin:30px;"> Vota il Team {{$key}}
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
                                  <td><a href="{{route('logged.votes.formUser', $player->user->id)}}">Vota</a></td>
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
