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
    <p>{{$groups_list}}}}</p>
  </div>

</div>
@endsection
