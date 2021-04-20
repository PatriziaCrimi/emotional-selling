@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="text-uppercase">Errore 404</h1>
          <h2>La pagina che si sta tentando di visualizzare non esiste</h2>
          <a class="btn btn-danger" href="{{route('logged.votes.index')}}">
            Torna alla votazione
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
