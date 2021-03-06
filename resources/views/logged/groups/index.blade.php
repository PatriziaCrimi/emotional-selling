@extends('layouts.app')

@section('links')
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
@endsection

{{-- Controllo se l'utente loggato è Sede o Admin per attivare funzione jQuery per visualizzare i gruppi solo al click --}}
@if ($auth->role->name == 'Admin' || $auth->role->name == 'Sede')
  @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/action.js') }}" type="text/javascript"></script>
  @endsection
@endif

@section('content')
  <section id="groups">
    <div class="container">
      <div class="row justify-content-center">
        {{-- Title --}}
        <div class="col-12">
          <h1 class="text-center">
            <span>Round n&deg;</span>
            <span class="font-weight-bold">
              {{str_pad($round -> name, 2, "0", STR_PAD_LEFT)}}
            </span>
            <span>in corso</span>
          </h1>
        </div>

        <div class="row mt-4">
          <div class="col-12">
            <div class="buttons-wrapper text-center">
              @if ($button1 -> status == 0)
                <p class="font-weight-bold wait">Attendi per procedere</p>
              @else
                {{-- Se sono ISF o MEDICI  --}}
                @if ($auth->role->name == 'ISF' || $auth->role->name == 'Medico')
                  <p class="font-weight-bold">Possono votare solo gli Osservatori</p>
                  <a class="btn btn-lg" href="{{route('logged.home')}}">
                    Home
                  </a>
                @else
                {{-- Se sono OSSERVATORI o SEDE  --}}
                  <a class="btn btn-lg font-weight-bold" href="{{route('logged.votes.index')}}">
                    Vota
                  </a>
                @endif
              @endif
            </div>
          </div>
        </div>
        {{-- Showing Sede or DM memeber details --}}
        @if ($auth->role->name == 'Sede' || $auth->role->name == 'DM')
          <div class="col-12">
            <div class="sede-info text-center">
              {{$auth -> user -> name}}
              {{$auth -> user -> lastname}} -
              {{$auth -> role -> name}}
            </div>
          </div>
        @elseif ($auth->role->name == 'DM Junior')
          <div class="col-12">
            <div class="sede-info text-center">
              {{$auth -> user -> name}}
              {{$auth -> user -> lastname}} -
              DM
            </div>
          </div>
        @endif
      </div>
      {{-- Groups List --}}
      <div class="row">
        <div class="col-12">
          <div class="groups-wrapper {{$auth->role->name == 'Sede' || $auth->role->name == 'Admin' ? 'sede' : ''}}">
            @if ($auth->role->name == 'Sede')
              <p class="text-center">Clicca sulle Stanze per vedere i Team</p>
            @endif
            @foreach ($usersGroups as $userGroup => $users)
              <h2 class="show text-center text-uppercase">
                @php
                  $group = \App\Group::find($userGroup);
                @endphp
                {{$group -> name}}
              </h2>
              <div class="content watch">
                @foreach ($users as $key => $user)

                  @php
                    $team = \App\Team::find($key);
                  @endphp
                  <div class="table-wrapper">
                    <table class="table table_xs">
                      <thead>
                        <tr>
                          <th>Team {{$team -> name}}</th>
                        </tr>
                      </thead>
                    </table>
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="team_xs" scope="col">Team {{$team -> name}}</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Ruolo</th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach ($user as $n => $player)
                        <tr>
                          @if ($player -> user -> id == Auth::user() -> id)
                            <th scope="row" class="active team_xs">{{$n+1}}</th>
                            <td class="active player">{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
                            <td class="active">{{ $player -> role -> name}}</td>
                          @else
                            <th class="team_xs" scope="row">{{$n+1}}</th>
                            <td class="player">{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
                            <td>{{ $player -> role -> name}}</td>
                          @endif
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
            @if ($button1 -> status == 0)
              <p class="font-weight-bold wait">Attendi per procedere</p>
            @else
              {{-- Se sono ISF o MEDICI  --}}
              @if ($auth->role->name == 'ISF' || $auth->role->name == 'Medico')
                <p class="font-weight-bold">Possono votare solo gli Osservatori</p>
                <a class="btn btn-lg" href="{{route('logged.home')}}">
                  Home
                </a>
              @else
              {{-- Se sono OSSERVATORI o SEDE  --}}
                <a class="btn btn-lg font-weight-bold" href="{{route('logged.votes.index')}}">
                  Vota
                </a>
              @endif
            @endif
          </div>
        </div>
      </div>
    </div> {{-- Closing Container --}}
  </section>
@endsection
