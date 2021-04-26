@extends('layouts.app')

@section('content')
  <section id="login">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="logo text-center">
            <img class="img-fluid" src="{{asset('storage/img/logo-emotional-selling.png')}}" alt="Logo Strategic Connections">
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
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
    </div>
  </section>
@endsection
