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

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
      <div id="app">
        {{-- Heder --}}
        <header>
          {{-- Navbar --}}
          <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
              <div class="img-logo">
                <img src="{{asset('storage/img/logo-emotional-selling.png')}}" alt="Logo Strategic Connections">
              </div>
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

                    {{-- Controllo cambio round Admin --}}

                    @if ( Auth::user()->username == "pucci" ||
                    Auth::user()->username == "crimi" ||
                    Auth::user()->username == "fabrizio" ||
                    Auth::user()->username == "valentini" )

                    <div class="d-flex">
                      <div class="admin-select rankings">
                        <p>Vedi Classifica</p>
                        <a class="btn" href="{{ route('logged.rankings.index')}}">Classifica</a>
                      </div>

                      {{-- Selezione Round --}}
                      <div class="admin-select">
                        <p>Seleziona Round</p>
                        <form class="round" action="{{ route('logged.round.update')}}" method="post">
                          @csrf
                          @method('post')
                          <select class="" name="round">
                            <option  value="1" {{ $round->name == 1 ? 'selected' : '' }}>Round 1</option>
                            <option  value="2"{{ $round->name == 2 ? 'selected' : '' }}>Round 2</option>
                            <option  value="3"{{ $round->name == 3 ? 'selected' : '' }}>Round 3</option>
                          </select>

                          <input type="submit" name="" value="Inizia">
                        </form>
                      </div>

                      {{-- Select Attivazione Votazione --}}
                      <div class="admin-select">
                        <p>Attiva Votazione</p>
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
                      </div>

                      {{-- Select Stop Votazione --}}
                      <div class="admin-select">
                        <p>Disattiva Votazione</p>
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
                      </div>
                    </div>
                  @endif

                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      <span>{{ Auth::user()->name }} - </span>
                      @php
                        $user_id = Auth::user()->id;
                        $id_combo = \App\GroupRoleRoundUser::where('user_id', $user_id)->first();
                      @endphp
                      @if ($id_combo->role->name == 'Sede' ||
                        $id_combo->role->name == 'Admin' ||
                        $id_combo->role->name == 'DM' ||
                        $id_combo->role->name == 'DM Junior')

                        <span class="font-weight-bold">{{$id_combo->role->name}}</span>
                      @else
                        <span class="font-weight-bold">Team {{ Auth::user()->team->name }}</span>
                      @endif
                    </a>

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
        </header>

        {{-- Main --}}
        <main>
          @yield('content')
        </main>
      </div>
      @yield('chart')
  </body>
</html>
