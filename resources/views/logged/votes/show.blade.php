@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <h1 class="text-center">SHOW di Votes</h1>
    </div>
  </div>
  {{-- Groups List --}}
  <div class="">
    <p>qui si voteranno gli utenti o i team - compilano i form</p>
    <a href="{{route('logged.rankings')}}">Vai alla classifica provvisoria</a>
  </div>

</div>
@endsection
