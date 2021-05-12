@extends('layouts.app')

@section('content')
  <section class="admin">
    <div class="center">
      {!! $data->links()!!}
    </div>
    <table class="table table-dark"style="width:80%;margin:auto">
      <thead>

        <tr>
          <th>Nome Votante</th>
          <th>Cognome Votante</th>
          <th>Voto</th>
          <th>Categoria</th>
          <th>Team votato</th>
          <th>Commento</th>
        </tr>

      </thead>

      @foreach ($data as $vote)
        {{-- @foreach ($vote as $value) --}}

        <tbody>

          <th>
            @php
            $userVoterName = \App\GroupRoleRoundUser::where('id',$vote -> info_voter_id)->first();
            echo $userVoterName -> user -> name;
            @endphp
          </th>
          <td>
            @php
            $userVoterLastName = \App\GroupRoleRoundUser::where('id',$vote -> info_voter_id)->first();
            echo $userVoterLastName -> user -> lastname;
            @endphp
          </td>
          <td>
            {{$vote -> value}}
          </td>
          <td>
            {{$vote -> category -> question }}
          </td>
          <td>
            {{$vote -> team -> name}}
          </td>
          <td>
            @if ($vote -> comment == null)
              Nessun commento dato
            @endif
            {{$vote -> comment }}
          </td>
        </tbody>

        {{-- @endforeach --}}
      @endforeach

    </table>
    <div class="container">
      <div class="row m-4">
        <a class="btn btn-primary"href="{{ route('logged.export2')}}">Export CSV</a>
      </div>
    </div>
    {{-- <a href="{{ route('logged.export')}}">Export CSV</a> --}}

  </section>
@endsection
