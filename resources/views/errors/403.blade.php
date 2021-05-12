@extends('layouts.guest')

@section('content')
  <section id="errors">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="text-center">
            <div class="img-logo">
              <img style="width:100%;" src="{{asset('storage/img/logo-emotional-selling.png')}}" alt="Logo Strategic Connections">
            </div>
            <h1 class="mt-4 mb-4">Ops, qualcosa è andato storto</h1>
            <a class="btn btn-lg mt-4" href="{{route('logged.home')}}">
              Torna alla home
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
