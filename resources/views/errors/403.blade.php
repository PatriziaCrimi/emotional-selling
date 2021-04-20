@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="text-uppercase">Errore 403</h1>
          <h2>Non hai i permessi per votare questo giocatore.</h2>
          <p>L'utente che stai cercando di votare è un Osservatore oppure la Sede oppure non appartiene al tuo gruppo in questo round.</p>
          <a class="btn btn-danger" href="{{route('logged.votes.index')}}">
            Torna alla votazione
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection