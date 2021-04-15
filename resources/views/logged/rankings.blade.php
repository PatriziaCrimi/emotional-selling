@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <h1 class="text-center">Classifica Provvisoria</h1>
    </div>
  </div>
  <div class="">
    <p>classifica visualizzabile da tutti</p>
    <a class="btn btn-dark" href="{{route('logged.final')}}">Clicca per uscire</a>
  </div>

</div>
@endsection
