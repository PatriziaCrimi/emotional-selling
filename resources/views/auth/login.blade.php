@extends('layouts.guest')

@section('content')
  <section id="login">
    @php
    $button3 = App\Button::find(3);
    @endphp

    @if ($button3->status == 0)
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="disabled-login">
              <div class="logo-lg text-center">
                <img class="img-fluid" src="{{asset('storage/img/logo-emotional-selling.png')}}" alt="Logo Strategic Connections">
              </div>
              <h2 class="text-center">
                Siamo spiacenti,
                <span class="font-weight-bold d-block">l'app verrà abilitata il giorno del Workshop.</span>
              </h2>
            </div>
          </div>
        </div>
      </div>
    @else
      <div class="container d-flex align-items-center justify-content-center">
        <div class="row">
          <div class="offset-md-2 col-md-8">
            <div class="logo-wrapper text-center">
              <img class="img-fluid" src="{{asset('storage/img/logo-emotional-selling.png')}}" alt="Logo Strategic Connections">
            </div>

            <div class="card">
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="form-group row d-block">
                    <label for="username" class="col-md-4 col-form-label text-left">
                      {{ __('Username') }}
                    </label>

                    <div class="col-12">
                      <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('username')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row d-block">
                      <label for="password" class="col-md-4 col-form-label text-left">
                        {{ __('Password') }}
                      </label>

                      <div class="col-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                          @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-12 col-sm-6">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                              {{ __('Ricordami') }}
                            </label>
                          </div>
                        </div>
                        <div class="col-12 col-sm-6">
                          <div class="d-flex justify-content-end">
                            <button type="submit" class="btn">
                              {{ __('Accedi') }}
                            </button>
                          </div>

                          {{-- @if (Route::has('password.request'))
                          <a class="btn btn-link" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                        </a>
                      @endif --}}
                    </div>
                  </div>
                </form>
              </div>
            </div>  {{-- Closing Card --}}
          </div>
        </div>
      </div>   {{-- Closing Container --}}
    @endif
  </section>
@endsection
