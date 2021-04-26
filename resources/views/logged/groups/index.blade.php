@extends('layouts.app')

{{-- Controllo se l'utente loggato è Sede o Admin per attivare funzione jQuery per visualizzare i gruppi solo al click --}}
@if (($auth->role_id == 2) || ($auth->role_id == 1))
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
            Round {{$round -> name}} in corso
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
          <div class="groups-wrapper">
            @foreach ($usersGroups as $userGroup => $users)
              <h2 class="show text-center">
                Room {{ $userGroup }}
              </h2>
              <div class="content watch">
                @foreach ($users as $key => $user)
                  <div class="table-wrapper">
                    <table class="table table-dark">
                      <thead>

                        <tr>
                          <th scope="col">Team {{$key}}</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Ruolo</th>
                        </tr>

                      </thead>
                      @foreach ($user as $n => $player)
                        <tbody>

                          @if ($player -> user -> id == Auth::user() -> id)
                            <th scope="row" style="color:yellow;">{{$n+1}}</th>
                            <td style="color:yellow;">{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
                            <td style="color:yellow;">{{ $player -> role -> name}}</td>
                          @else
                            <th scope="row">{{$n+1}}</th>
                            <td>{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
                            <td>{{ $player -> role -> name}}</td>
                          @endif

                        </tbody>

                      @endforeach

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
          <div class="text-center">
            {{-- Se sono ISF o MEDICI  --}}
            @if (($auth -> role_id == 4) || ($auth -> role_id == 5))

              @if ($button1 -> status == 0)
                <h2>Attendi per procedere</h2>
              @else
                  <a class="btn btn-dark" href="{{route('logged.votes.index')}}">
                    Continua
                  </a>
              @endif

            @else

              @if ($button1 -> status == 0)
                <h2>Attendi per procedere alla votazione</h2>
              @else
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
