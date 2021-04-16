@extends('layouts.app')

@section('content')
  <div id="app" class="content" style="height:500px;">
                  <div class="">
                  <a href="#">indietro</a>
                  </div>
                  <div class="title m-b-md">
                      Laravel
                  </div>

                  @if (!is_null($user))

                      <h3>Stai votando l'utente {{$user -> user -> name}} {{$user -> user -> lastname}}</h3>

                    <form id="form" class="form" action="{{ route('logged.user.voted')}}" method="post">
                      @csrf
                      @method('post')

                      {{-- Voto Categoria 1 --}}

                      <label for="votesUser1[]"></label>

                      <input type="hidden" name="category1" value="1">
                      <input type="hidden" name="info_voted_id" value="{{$user->id}}">
                      <input type="hidden" name="info_voter_id" value="{{$comboAuth->id}}">
                      <input type="hidden" class="input" name="votesUser1" value="0">
                      <input type="checkbox" class="input" name="votesUser1" value="1">1
                      <input type="checkbox" class="input" name="votesUser1" value="2">2
                      <input type="checkbox" class="input" name="votesUser1" value="3">3
                      <input type="checkbox" class="input" name="votesUser1" value="4">4
                      <input type="checkbox" class="input" name="votesUser1" value="5">5
                      <input type="checkbox" class="input" name="votesUser1" value="6">6
                      <input type="checkbox" class="input" name="votesUser1" value="7">7
                      <input type="checkbox" class="input" name="votesUser1" value="8">8
                      <input type="checkbox" class="input" name="votesUser1" value="9">9
                      <input type="checkbox" class="input" name="votesUser1" value="10">10<br>
                      <textarea name="comment1" rows="8" cols="80"></textarea><br>

                      <label for="votesUser2[]"></label>

                      {{-- Voto Categoria 2 --}}

                      <input type="hidden" name="category2" value="2">
                      <input type="hidden" class="input" name="votesUser2" value="0">
                      <input type="checkbox" class="input" name="votesUser2" value="1">1
                      <input type="checkbox" class="input" name="votesUser2" value="2">2
                      <input type="checkbox" class="input" name="votesUser2" value="3">3
                      <input type="checkbox" class="input" name="votesUser2" value="4">4
                      <input type="checkbox" class="input" name="votesUser2" value="5">5
                      <input type="checkbox" class="input" name="votesUser2" value="6">6
                      <input type="checkbox" class="input" name="votesUser2" value="7">7
                      <input type="checkbox" class="input" name="votesUser2" value="8">8
                      <input type="checkbox" class="input" name="votesUser2" value="9">9
                      <input type="checkbox" class="input" name="votesUser2" value="10">10<br>
                      <textarea name="comment2" rows="8" cols="80"></textarea><br>


                      <label for="votesUser3[]"></label>

                      {{-- Voto Categoria 3 --}}
                      <input type="hidden" name="category3" value="3">
                      <input type="hidden" class="input" name="votesUser3" value="0">
                      <input type="checkbox" class="input" name="votesUser3" value="1">1
                      <input type="checkbox" class="input" name="votesUser3" value="2">2
                      <input type="checkbox" class="input" name="votesUser3" value="3">3
                      <input type="checkbox" class="input" name="votesUser3" value="4">4
                      <input type="checkbox" class="input" name="votesUser3" value="5">5
                      <input type="checkbox" class="input" name="votesUser3" value="6">6
                      <input type="checkbox" class="input" name="votesUser3" value="7">7
                      <input type="checkbox" class="input" name="votesUser3" value="8">8
                      <input type="checkbox" class="input" name="votesUser3" value="9">9
                      <input type="checkbox" class="input" name="votesUser3" value="10">10<br>
                      <textarea name="comment3" rows="8" cols="80"></textarea>

                      <input style="margin-top:50px;" class="submit" type="submit" name="" value="Salva">
                    </form>
                  {{-- @endforeach --}}
                  @else
                      <h1>Stai votando il Team {{$id}}</h1>
                    @foreach ($team as $key => $player)
                      <h3>{{$player -> user -> name}} {{$player -> user -> lastname}}</h3>
                    @endforeach

                    <form  class="form" action="{{ route('logged.team.voted')}}" method="post">
                      @csrf
                      @method('post')
                      <label for="votesTeam1[]"></label>

                      <h3>Come valuti la domanda 1?</h3>

                       <input type="hidden" name="prova1" value="1">
                      <input type="hidden" class="input" name="votesTeam1[{{$id}}]" value="0">
                      <input type="checkbox" class="input" name="votesTeam1[{{$id}}]" value="1">1
                      <input type="checkbox" class="input" name="votesTeam1[{{$id}}]" value="2">2
                      <input type="checkbox" class="input" name="votesTeam1[{{$id}}]" value="3">3
                      <input type="checkbox" class="input" name="votesTeam1[{{$id}}]" value="4">4
                      <input type="checkbox" class="input" name="votesTeam1[{{$id}}]" value="5">5
                      <input type="checkbox" class="input" name="votesTeam1[{{$id}}]" value="6">6
                      <input type="checkbox" class="input" name="votesTeam1[{{$id}}]" value="7">7
                      <input type="checkbox" class="input" name="votesTeam1[{{$id}}]" value="8">8
                      <input type="checkbox" class="input" name="votesTeam1[{{$id}}]" value="9">9
                      <input type="checkbox" class="input" name="votesTeam1[{{$id}}]" value="10">10<br><br>
                      <textarea name="textarea1" rows="8" cols="80">Inserisci una motivazione</textarea>

                      <label for="votesTeam2[]"></label>

                      <h3>Come valuti la domanda 2?</h3>
                      <input type="hidden" name="prova2" value="2">
                      <input type="hidden" class="input" name="votesTeam2[{{$id}}]" value="0">
                      <input type="checkbox" class="input" name="votesTeam2[{{$id}}]" value="1">1
                      <input type="checkbox" class="input" name="votesTeam2[{{$id}}]" value="2">2
                      <input type="checkbox" class="input" name="votesTeam2[{{$id}}]" value="3">3
                      <input type="checkbox" class="input" name="votesTeam2[{{$id}}]" value="4">4
                      <input type="checkbox" class="input" name="votesTeam2[{{$id}}]" value="5">5
                      <input type="checkbox" class="input" name="votesTeam2[{{$id}}]" value="6">6
                      <input type="checkbox" class="input" name="votesTeam2[{{$id}}]" value="7">7
                      <input type="checkbox" class="input" name="votesTeam2[{{$id}}]" value="8">8
                      <input type="checkbox" class="input" name="votesTeam2[{{$id}}]" value="9">9
                      <input type="checkbox" class="input" name="votesTeam2[{{$id}}]" value="10">10<br>
                      <textarea name="textarea2" rows="8" cols="80">Inserisci una motivazione</textarea>


                      <label for="votesTeam3[]"></label>

                      <h3>Come valuti la domanda 3?</h3>

                       <input type="hidden" name="prova3" value="3">
                      <input type="hidden" class="input" name="votesTeam3[{{$id}}]" value="0">
                      <input type="checkbox" class="input" name="votesTeam3[{{$id}}]" value="1">1
                      <input type="checkbox" class="input" name="votesTeam3[{{$id}}]" value="2">2
                      <input type="checkbox" class="input" name="votesTeam3[{{$id}}]" value="3">3
                      <input type="checkbox" class="input" name="votesTeam3[{{$id}}]" value="4">4
                      <input type="checkbox" class="input" name="votesTeam3[{{$id}}]" value="5">5
                      <input type="checkbox" class="input" name="votesTeam3[{{$id}}]" value="6">6
                      <input type="checkbox" class="input" name="votesTeam3[{{$id}}]" value="7">7
                      <input type="checkbox" class="input" name="votesTeam3[{{$id}}]" value="8">8
                      <input type="checkbox" class="input" name="votesTeam3[{{$id}}]" value="9">9
                      <input type="checkbox" class="input" name="votesTeam3[{{$id}}]" value="10">10<br>
                      <textarea name="textarea3" rows="8" cols="80">Inserisci una motivazione</textarea>


                      <input style="margin-top:50px;"id="submit" type="submit" class="submit" name="" value="Salva">
                    </form>

                  @endif

              </div>
  {{-- Groups List --}}
  <div class="">
    <a href="{{route('logged.rankings')}}">Vai alla classifica provvisoria</a>
  </div>

</div>
@endsection
