@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <h1 class="text-center">Voti di
        <span class="font-weight-bold">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
      </h1>
    </div>
  </div>
  {{-- Groups List --}}
  <div class="">
    <p>Index dei voti - visualizzazione del proprio gruppo SOLO ruoli ISF  e MEDICO se voti sennò visualizzi NON PUOI VOTARE</p>
    <a class="btn btn-dark" href="#">Vota</a>
  </div>

</div>
@endsection
