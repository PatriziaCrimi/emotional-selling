@extends('layouts.app')

@section('content')
  <section id="home">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-10">
          <div class="card">
            <div class="card-body">
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
              @endif
              <div class="text-left">
                <h1>Benvenuto,</h1>
                <h2>
                  <span>{{Auth::user()->name}}</span>
                  {{-- <span>{{Auth::user()->lastname}}</span> --}}
                </h2>
              </div>

              @if ($button2 -> status == 0)

              <div class="text-center">
                <p>Sei in attesa che tutti i giocatori finiscano di votare <br> Clicca su aggiorna per controllare</p>
                {{-- <p>Clicca su aggiorna per controllare</p> --}}
              </div>
              <div>
                <a class="btn btn-block" href="{{route('logged.home')}}">
                  Aggiorna
                </a>
              </div>

              @else

              <div class="text-center">
                <p>Clicca il pulsante per vedere il Round in corso</p>
              </div>
              <div>
                <a class="btn btn-block" href="{{route('logged.groups.index')}}">
                  Vedi Round in corso
                </a>
              </div>

              @endif

            </div>
          </div>
        </div>
      </div>
    </div>  {{-- Closing Container --}}
  </section>
@endsection
