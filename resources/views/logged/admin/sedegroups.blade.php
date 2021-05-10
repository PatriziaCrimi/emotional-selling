@extends('layouts.app')

@section('content')
  <section class="admin">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

          @endforeach
        </ul>
      </div>
    @endif

    <div class="container">

      <div class="row">

        <form action="{{ route('logged.sede.options.req')}}" method="POST">

          @csrf
          @method('POST')

          <div class="form-group">
            <select name="user_id"class="form-control">
              @foreach ($users as $user)
                <option value="{{$user -> user -> id}}">{{$user -> user -> name}} {{$user -> user -> lastname}}</option>
              @endforeach
            </select>
          </div>
          @foreach ($groups as $group)
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" value="{{$group -> id}}" name="groups[]">
              <label class="form-check-label" for="exampleCheck1">{{$group -> name}}</label>
            </div>
          @endforeach
          <button type="submit" class="btn btn-primary mt-2">Salva</button>
        </form>

      </div>
      <div class="row mt-4">

        @foreach ($users as $user)

          <div class="card" style="width: 18rem;">
            <div class="card-header">
              @php
              $userCurrent = \App\User::where('id',$user -> user_id)->first();
              // dd($userCurrent);
              @endphp
              {{$userCurrent -> name}} {{$userCurrent -> lastname}}

            </div>
            <ul class="list-group list-group-flush">
              @if (!is_null($userCurrent -> groups))
                @foreach ($userCurrent -> groups as $group)
                  <li class="list-group-item">{{$group -> name}}</li>
                @endforeach
              @else
                <li class="list-group-item">Nessuna associazione</li>
              @endif
            </ul>
          </div>

        @endforeach

      </div>
      <div class="row">
        <!-- Button trigger modal -->
  <button type="button" class="btn btn-danger mt-4" data-toggle="modal" data-target="#exampleModal">
    Cancella Associazioni
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h3 class="modal-title w-100" id="exampleModalLabel"><strong>ATTENZIONE!</strong></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <p>Cliccando su <span class="btn btn-danger btn-sm">Continua</span> disattiverai tutte le associazioni!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Chiudi</button>
   <a class="btn btn-danger"href="{{ route('logged.sede.options.detach')}}">Continua</a>
        </div>
      </div>
    </div>
  </div>
      </div>

    </div>
  </section>
@endsection
