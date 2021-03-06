@extends('layouts.guest')

@section('content')
  <section id="errors">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="text-center">
            <h1 class="text-uppercase">Errore 404</h1>
            <h2>La pagina che si sta tentando di visualizzare non esiste.</h2>
            <a class="btn btn-lg" href="{{route('logged.home')}}">
              Torna alla home
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
