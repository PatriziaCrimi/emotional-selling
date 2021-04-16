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

              <form action="{{ route('logged.votes.formTeam',$key)}}" style="margin:30px;">
                <input type="submit" value="Vota il Team {{$key}}" />
              </form>

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


                              @if ($player -> user -> id == Auth::user() -> id)
                                <th scope="row" style="color:yellow;">{{$n+1}}</th>
                                <td style="color:yellow;">{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
                                <td style="color:yellow;">{{ $player -> role -> name}}</td>
                                <td><a href="#">Vota</a></td>
                              @else
                                <th scope="row">{{$n+1}}</th>
                                <td>{{ $player -> user -> name}} {{$player -> user -> lastname}}</td>
                                <td>{{ $player -> role -> name}}</td>
                                <td><a href="{{ route('logged.votes.formUser',$player -> user -> id)}}">Vota</a></td>
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
      <a class="btn btn-dark" href="#">Continua</a>

    </div>

  @endif

{{-- </div> --}}
@endsection
