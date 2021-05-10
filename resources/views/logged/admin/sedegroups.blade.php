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
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
      <div class="row">

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
    </div>
  </section>
@endsection
