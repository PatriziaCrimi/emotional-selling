@extends('layouts.app')

{{-- Controllo se l'utente loggato è Sede o Admin per attivare funzione jQuery per visualizzare i gruppi solo al click --}}
@if (($auth->role_id == 2) || ($auth->role_id == 1))
  @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/action.js') }}" type="text/javascript"></script>
  @endsection
@endif

@section('content')
  <section id="votes-index">
    <div class="container">

      {{-- Se sono ISF o MEDICI  --}}
      @if (($auth -> role_id == 4) || ($auth -> role_id == 5))
        <div class="row">
          <div class="col-12">
            <h1 class="text-center">NON PUOI VOTARE</h1>
          </div>
        </div>
      @else

      {{-- Se SONO SEDE SEDE O OSSERVATORE --}}

        <div class="row justify-content-center">
          <div class="col-12">
            <h1 class="text-center">
              Stai Votando per il Round {{$round -> name}}
              @if ($auth -> role_id == 2)
               <div>
                  <span> {{$auth -> user -> name}}</span>
                  <span> {{$auth -> user -> lastname}}:</span>
                  <span> {{$auth -> role -> name}}</span>
               </div>
              @endif
            </h1>
          </div>
        </div>
        {{-- Groups List --}}
        <div class="row">
          <div class="col-12">
            @foreach ($usersGroups as $userGroup => $users)
              <h2 class="show text-center">
                Gruppo {{ $userGroup }}
              </h2>
              <div class="content watch">
                @foreach ($users as $key => $user)
                  {{-- Controllo se l'utente autenticato ha già votato questo Team --}}
                  @php
                  $team = \App\GroupRoleRoundUser::where('team_id',$key)->where('round_id',$round->name)->first();
                  $teamUserId = $team->id;
                  $idTeamVoted = \App\Vote::where('info_voter_id',$voteCheckId)->where('info_voted_id',$teamUserId)->where('team_vote',1)->first();
                  @endphp
                  {{-- SE NON è NULL HAI GIA VOTATO ALTRIMENTI NO --}}
                  @if (!is_null($idTeamVoted))
                    <a class="btn btn-primary" style="margin:30px;">
                      Hai Votato il Team {{$key}}
                    </a>
                  @else
                    <a class="btn btn-primary" href="{{route('logged.votes.formTeam', $key)}}" style="margin:30px;">
                      Vota il Team {{$key}}
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
                            {{-- <th scope="col"></th> --}}
                          </tr>
                        </thead>
                        @foreach ($user as $n => $player)
                          <tbody>
                            {{-- Controllo se l'utente autenticato ha già votato questo Giocatore --}}
                            @php
                            $idUserVoted = \App\Vote::where('info_voter_id',$voteCheckId)->where('info_voted_id',$player->id)->where('team_vote',0)->first();
                            @endphp

                            @if ($player -> user -> id == Auth::user() -> id)
                              <th scope="row" style="color:yellow;">{{$n+1}}</th>
                              <td style="color:yellow;">{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
                              {{-- <td style="color:yellow;">
                                {{ $player -> role -> name}}
                              </td>
                              <td>
                                <a href="#">Vota</a>
                              </td> --}}
                            @else
                              <th scope="row">{{$n+1}}</th>
                              <td>{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
                              <td>{{ $player -> role -> name}}</td>
                              {{-- SE è NULL FA IN UN MODO ALTRIMENTI IN UN ALTRO!!!! --}}
                              @if (is_null($idUserVoted))
                                {{-- <td>
                                  <a href="{{route('logged.votes.formUser', $player->user->id)}}">
                                    Vota
                                  </a>
                                </td> --}}
                              @else
                                {{-- <td>Hai già votato</td> --}}
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
            @endforeach
          </div>
        </div>
      @endif

      <div class="row">
        <div class="col-12">
          <div class="text-center">
            @if ($button2 -> status == 0)
              <h2>Attendi per procedere</h2>
            @else
              <div class="buttons-wrapper">
                @if ($round -> name == 3)
                  <a class="btn btn-dark" href="{{ route('logged.final')}}">Termina il gioco</a>
                @else
                  @if ($auth -> role_id == 1)
                    <a class="btn btn-dark" href="{{ route('logged.rankings')}}">Guarda la classifica provvisoria</a>
                  @else
                    <a href="{{route('logged.index')}}" class="btn btn-dark">Vai al prossimo round</a>
                  @endif
                @endif
              </div>

            @endif
          </div>
        </div>
      </div>

    </div> {{-- Closing Container --}}
  </section>
@endsection
