@extends('layouts.app')

@section('content')
  <section id="sede-index">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <h1 class="text-center">
            Stai votando per il Round
            {{str_pad($round -> name, 2, "0", STR_PAD_LEFT)}}
          </h1>
        </div>
      </div>
      {{-- Groups List --}}
      <div class="row">
        <div class="col-12">
          <div class="groups-wrapper">
            @foreach ($usersGroups as $userGroup => $users)
              <h2 class="text-center text-uppercase">
                @php
                  $group = \App\Group::find($userGroup);
                @endphp
                {{$group -> name}}
              </h2>
              <div class="content">
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
                    <a class="btn voted" href="{{route('logged.votes.showVoteTeam', $key)}}">
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
                          <th class="team_xs" scope="col">Team {{$teamName -> name}}</th>
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

                            <th class="team_xs" scope="row">{{$n+1}}</th>
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

      <div class="row">
        <div class="col-12">
          <div class="buttons-wrapper text-center">
            {{-- @if ($button2 -> status == 0)
              <p>Attendi per procedere</p>
            @else --}}
              {{-- Se l'utente loggato è Admin --}}
              @if ($comboAuth->role->name == 'Admin')
                <a class="btn" href="{{ route('logged.rankings.index')}}">
                  Guarda la classifica provvisoria
                </a>
              @else
                <a class="btn btn-lg" href="{{route('logged.votes.index')}}">
                  Torna indietro
                </a>
              @endif
            {{-- @endif --}}
          </div>
        </div>
      </div>
    </div> {{-- Closing Container --}}
  </section>
@endsection
