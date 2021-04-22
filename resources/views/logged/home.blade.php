@extends('layouts.app')

@section('content')
  <section id="home">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
              @endif
              <h1 class="text-center">
                Benvenuto
                {{Auth::user()->name}}!
              </h1>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="text-center">
            <p>Clicca il pulsante per iniziare il Round</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="offset-sm-2 col-sm-8">
          <a class="btn btn-dark btn-block" href="{{route('logged.groups.index')}}">
            Start Round
            {{$round->name}}
          </a>
        </div>
      </div>
    </div>  {{-- Closing Container --}}
  </section>
@endsection
