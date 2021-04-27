@extends('layouts.guest')

@section('content')
  <section id="errors">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="text-center">
            <h1 class="text-uppercase">Errore 403</h1>
            <h2>Non hai i permessi per navigare questa pagina.</h2>
            <a class="btn btn-danger" href="{{route('logged.home')}}">
              Torna alla home
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
