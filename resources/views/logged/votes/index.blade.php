@extends('layouts.app')

@section('links')
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
@endsection

@section('content')

  <section id="votes-index">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          {{-- Controllo se l'utente autenticato è Sede o Admin --}}
          @if ($auth->role->name == 'Sede' || $auth->role->name == 'Admin')
            <h1 class="font-weight-bold text-center sede">Votazione sede</h1>
            <h2 class="text-center sede">
              Round n&deg;
              {{str_pad($round -> name, 2, "0", STR_PAD_LEFT)}}
              in corso
            </h2>
            {{-- Groups List --}}
            <div class="groups-wrapper sede">
              @foreach ($usersGroups as $userGroup => $users)
                <div class="row">
                  <div class="col-6 p-0">
                    <div class="group-col d-flex justify-content-end align-items-center">
                      <h2 class="text-uppercase font-weight-bold">
                        @php
                        $group = \App\Group::find($userGroup);
                        $user = \App\User::where('id',$auth->user_id)->first();
                        @endphp
                        {{$group -> name}}
                      </h2>
                    </div>
                  </div>
                  <div class="col-6 p-0">
                    <div class="group-col d-flex justify-content-start align-items-center">
                      @foreach ($user -> groups as $group)
                        @if ($group -> id == $userGroup)
                          <a href="{{ route('logged.votes.sedeShowGroup',$group->id)}}" class="btn sede">
                            Vota
                          </a>
                        @endif
                      @endforeach
                    </div>
                  </div>

                    {{-- <div v-if="isTeamShown" class="content d-flex justify-content-center">
                      @foreach ($users as $key => $user)

                        @php
                        $team = \App\GroupRoleRoundUser::where('team_id',$key)->where('round_id',$round->name)->first();
                        $teamUserId = $team->id;
                        $idTeamVoted = \App\Vote::where('info_voter_id',$voteCheckId)->where('info_voted_id',$teamUserId)->where('team_vote',1)->first();
                        $teamName = \App\Team::find($key);
                        @endphp

                        @if (!is_null($idTeamVoted))
                          <a class="btn voted" href="#">
                            Hai votato il Team {{$teamName -> name }}
                          </a>
                        @else
                          <a class="btn to-vote" href="{{route('logged.votes.formTeam', $key)}}">
                            Vota il Team {{$teamName -> name}}
                          </a>
                        @endif
                      @endforeach
                    </div> --}}

                </div>
              @endforeach
            </div>
          @else
          {{-- fine sede admin  --}}
          {{-- Se l'utente autenticato non è Sede né Admin --}}
            <h1 class="text-center">
              Stai votando per il Round
              {{str_pad($round -> name, 2, "0", STR_PAD_LEFT)}}
            </h1>
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
                                <th class="team_xs"scope="col">Team {{$teamName -> name}}</th>
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

                                  <th class="team_xs"scope="row">{{$n+1}}</th>
                                  <td class="player">{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
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
              <p class="font-weight-bold wait">Attendi per procedere</p>
            @else
              {{-- Se l'utente loggato è Admin --}}
              @if ($auth->role->name == 'Admin')
                <a class="btn btn-lg" href="{{ route('logged.rankings.index')}}">
                  Guarda la classifica provvisoria
                </a>
              @else
                <a href="{{route('logged.home')}}" class="btn btn-lg">
                  Torna alla home
                </a>
              @endif
            @endif
          </div>
        </div>
      </div>
    </div> {{-- Closing Container --}}
  </section>
@endsection
