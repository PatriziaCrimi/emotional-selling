@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <h1 class="text-center">Elenco Dettagli di
        <span class="font-weight-bold">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
      </h1>
    </div>
  </div>
  {{-- Groups List --}}
  <div class="">
    <p>Index dei gruppi - qui si visualizzeranno le informazioni del grupPo dell'utente autenticato O tutti i gruppi se SEDE</p>
    <a class="btn btn-dark" href="{{route('logged.votes.index')}}">Vota</a>
  </div>

</div>
@endsection
