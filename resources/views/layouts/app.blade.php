<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>Emotional Selling</title>

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      @yield('scripts')

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
      <div id="app">
          <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
              <div class="container">
                  <h2>Emotional Selling</h2>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->
                      <ul class="navbar-nav mr-auto">

                      </ul>

                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ml-auto">
                          <!-- Authentication Links -->
                          @guest
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                              {{-- @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                  </li>
                              @endif --}}
                          @else
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->name }}
                                  </a>

                                  {{-- Controllo cambio round Admin --}}

                                  @if ( (Auth::user()->username == "pucci") ||
                                        (Auth::user()->username == "crimi") ||
                                        (Auth::user()->username == "fabrizio") ||
                                        (Auth::user()->username == "valentini") )

                                  {{-- Selezione Round --}}

                                    <form class="" action="{{ route('logged.round.update')}}" method="post">
                                      @csrf
                                      @method('post')
                                      <select class="" name="round">
                                        <option  value="1" {{ $round->name == 1 ? 'selected' : '' }}>Round 1</option>
                                        <option  value="2"{{ $round->name == 2 ? 'selected' : '' }}>Round 2</option>
                                        <option  value="3"{{ $round->name == 3 ? 'selected' : '' }}>Round 3</option>
                                      </select>

                                      <input type="submit" name="" value="Inizia">
                                    </form>
                                  {{-- Bottone Attivazione Votazione --}}
                                    <form class="" action="{{ route('logged.button.updateStartVote')}}" method="post">
                                      @csrf
                                      @method('post')
                                      <select class="" name="button1">
                                        <span>Attivazione Votazione</span>
                                        <option  value="0" {{ $button1->status == 0 ? 'selected' : '' }}>Non visibile</option>
                                        <option  value="1"{{ $button1->status == 1 ? 'selected' : '' }}>Visibile</option>
                                      </select>

                                      <input type="submit" name="" value="Salva">
                                    </form>

                                    {{-- Bottone Stop Botazione --}}
                                    <form class="" action="{{ route('logged.button.updateStopVote')}}" method="post">
                                      @csrf
                                      @method('post')
                                      <select class="" name="button2">
                                        <span>Stop votazione</span>
                                        <option  value="0" {{ $button2->status == 0 ? 'selected' : '' }}>Non visibile</option>
                                        <option  value="1"{{ $button2->status == 1 ? 'selected' : '' }}>Visibile</option>
                                      </select>

                                      <input type="submit" name="" value="Salva">
                                    </form>

                                  @endif

                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                                  </div>
                              </li>
                          @endguest
                      </ul>
                  </div>
              </div>
          </nav>

          <main class="py-4">
              @yield('content')
          </main>
      </div>
      @yield('chart')
  </body>
</html>
