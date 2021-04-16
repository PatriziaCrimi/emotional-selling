@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
  <div class="row justify-content-center">
    <div class="col-12">
      <h1 class="text-center">

        Stai iniziando il Round {{$round -> name}}
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

              <div>

                <div style="margin:50px;">

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
              </div>

          @endforeach
      </div>

   </div>

    @endforeach
    {{-- Se sono ISF o MEDICI  --}}
    @if (($auth -> role_id == 4) || ($auth -> role_id == 5))

      <a class="btn btn-dark" href="{{route('logged.votes.index')}}">Continua</a>

    @else
      <a class="btn btn-dark" href="{{route('logged.votes.index')}}">Vota</a>
    @endif


  </div>

{{-- </div> --}}
@endsection
