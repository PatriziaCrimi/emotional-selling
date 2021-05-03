@extends('layouts.guest')

@section('content')
  <section id="errors">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="text-center">
            <h1 class="text-uppercase">Errore 405</h1>
            <h2>Ops, qualcosa è andato storto!</h2>
            <a class="btn btn-lg" href="{{route('logged.home')}}">
              Torna alla home
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
