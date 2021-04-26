@extends('layouts.app')

{{-- Controllo se l'utente loggato è Sede o Admin per attivare funzione jQuery per visualizzare i gruppi solo al click --}}
{{-- @if (($auth->role_id == 2) || ($auth->role_id == 1))
  @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/action.js') }}" type="text/javascript"></script>
  @endsection
@endif --}}

@section('content')
  <section id="votes-index">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          {{-- Controllo se l'utente autenticato è Sede --}}
          @if ($auth -> role_id == 2)
            <h1 class="font-weight-bold text-center">Votazione sede</h1>
            <p class="text-center">
              <span>Round n&deg;</span>
              <span>
                {{str_pad($round -> name, 2, "0", STR_PAD_LEFT)}}
              </span>
              <span>in corso</span>
            </p>
            {{-- Groups List --}}
            <div class="row">
              <div class="col-12">
                <div class="groups-wrapper sede">
                  @foreach ($usersGroups as $userGroup => $users)
                    <div class="d-flex justify-content-center align-items-center">
                      <h2 class="show text-center text-uppercase font-weight-bold">
                        @php
                        $group = \App\Group::find($userGroup);
                        @endphp
                        {{$group -> name}}
                      </h2>
                      <a href="#" class="btn">
                        Vota
                      </a>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          @else
            {{-- Se l'utente autenticato non è Sede --}}
            <h1 class="text-center">
              <span>Stai votando per il Round</span>
              <span>{{$round -> name}}</span>
            </h1>
            {{-- Groups List --}}
            <div class="row">
              <div class="col-12">
                <div class="groups-wrapper">
                  @foreach ($usersGroups as $userGroup => $users)
                    <h2 class="show text-center text-uppercase">
                      @php
                        $group = \App\Group::find($userGroup);
                      @endphp
                      {{$group -> name}}
                    </h2>
                    <div class="content watch">
                      @foreach ($users as $key => $user)
                        {{-- Controllo se l'utente autenticato ha già votato questo Team --}}
                        @php
                        $team = \App\GroupRoleRoundUser::where('team_id',$key)->where('round_id',$round->name)->first();
                        $teamUserId = $team->id;
                        $idTeamVoted = \App\Vote::where('info_voter_id',$voteCheckId)->where('info_voted_id',$teamUserId)->where('team_vote',1)->first();
                        $teamName = \App\Team::find($key);
                        @endphp
                        {{-- Se l'utente ha già votato --}}
                        @if (!is_null($idTeamVoted))
                          <a class="btn voted">
                            Hai votato il Team {{$teamName -> name }}
                          </a>
                        @else
                          <a class="btn to-vote" href="{{route('logged.votes.formTeam', $key)}}">
                            Vota il Team {{$teamName -> name}}
                          </a>
                        @endif
                        <div class="table-wrapper">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Team {{$teamName -> name}}</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Ruolo</th>
                              </tr>
                            </thead>

                            <tbody>
                              @foreach ($user as $n => $player)
                                <tr>
                                  {{-- Controllo se l'utente autenticato ha già votato questo Giocatore --}}
                                  @php
                                  $idUserVoted = \App\Vote::where('info_voter_id',$voteCheckId)->where('info_voted_id',$player->id)->where('team_vote',0)->first();
                                  @endphp

                                  <th scope="row">{{$n+1}}</th>
                                  <td>{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
                                  <td>{{ $player -> role -> name}}</td>
                                  {{-- Se il giocatore non è già stato votato --}}
                                  {{-- @if (is_null($idUserVoted))
                                    <td>
                                      <a href="{{route('logged.votes.formUser', $player->user->id)}}">
                                        Vota
                                      </a>
                                    </td>
                                  @else
                                    <td>Hai già votato</td>
                                  @endif
                                  {{ route('logged.votes.formUser',$player -> user -> id)}} --}}
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      @endforeach
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="buttons-wrapper text-center">
            @if ($button2 -> status == 0)
              <p>Attendi per procedere</p>
            @else
              <div class="buttons-wrapper">
                {{-- Se è l'ultimo round termina il gioco --}}
                {{-- @if ($round -> name == 3)
                  <a class="btn" href="{{ route('logged.final')}}">
                    Termina il gioco
                  </a>
                @else --}}
                  {{-- Se l'utente loggato è Admin --}}
                  @if ($auth -> role_id == 1)
                    <a class="btn" href="{{ route('logged.rankings')}}">
                      Guarda la classifica provvisoria
                    </a>
                  @else
                    <a href="{{route('logged.home')}}" class="btn btn-dark">
                      Torna alla home
                    </a>
                  @endif
                {{-- @endif --}}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div> {{-- Closing Container --}}
  </section>
@endsection
