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
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="text-center font-weight-bold">Elenco Gruppi</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="groups text-center">
          @foreach ($groups_list as $group)
            <h3>{{$group->name}}
              <span>in Round: {{$group->round_id}}</span>
            </h3>
          @endforeach
        </div>
      </div>
    </div>
  {{-- Roles List --}}
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="text-center font-weight-bold">Elenco Ruoli</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="roles text-center">
          @foreach ($roles_list as $role)
            <h3>{{$role->type}}
              <span>in Round: {{$role->round_id}}</span>
            </h3>
          @endforeach
        </div>
      </div>
    </div>
</div>
@endsection
