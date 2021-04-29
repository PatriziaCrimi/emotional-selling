@extends('layouts.app')

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
            <span>
              {{str_pad($round -> name, 2, "0", STR_PAD_LEFT)}}
            </span>
            <span>in corso</span>
          </h1>
        </div>
        {{-- Showing Sede or DM memeber details --}}
        @if ($auth->role->name == 'Sede' || $auth->role->name == 'DM' || $auth->role->name == 'DM Junior')
          <div class="col-12">
            <div class="sede-info text-center">
              <span> {{$auth -> user -> name}}</span>
              <span> {{$auth -> user -> lastname}}:</span>
              <span> {{$auth -> role -> name}}</span>
            </div>
          </div>
        @endif
      </div>
      {{-- Groups List --}}
      <div class="row">
        <div class="col-12">
          <div class="groups-wrapper {{$auth->role->name == 'Sede' || $auth->role->name == 'Admin' ? 'sede' : ''}}">
            @if ($auth->role->name == 'Sede')
              <p class="text-center">Clicca sulle Stanze per vedere Team e giocatori</p>
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
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Team {{$team -> name}}</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Ruolo</th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach ($user as $n => $player)
                        <tr>
                          @if ($player -> user -> id == Auth::user() -> id)
                            <th scope="row" class="active">{{$n+1}}</th>
                            <td class="active">{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
                            <td class="active">{{ $player -> role -> name}}</td>
                          @else
                            <th scope="row">{{$n+1}}</th>
                            <td>{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
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
              <p>Attendi per procedere</p>
            @else
              {{-- Se sono ISF o MEDICI  --}}
              @if ($auth->role->name == 'ISF' || $auth->role->name == 'Medico')
                <p>Possono votare solo gli Osservatori</p>
                <a class="btn" href="{{route('logged.home')}}">
                  Home
                </a>
              @else
              {{-- Se sono OSSERVATORI o SEDE  --}}
                <a class="btn btn-dark" href="{{route('logged.votes.index')}}">
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
