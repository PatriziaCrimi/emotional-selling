@extends('layouts.app')

@section('scripts')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection

@section('content')
  <section id="votes-forms">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="content" style="height:500px;">

            @if (!is_null($user))
              {{-- VOTAZIONE AL GIOCATORE --}}
              <h3>
                Stai votando l'utente {{$user -> user -> name}} {{$user -> user -> lastname}}
              </h3>

              <form @submit="alertVoted()" @change="isFormEmpty()" id="form" class="form" action="{{ route('logged.user.voted')}}" method="post">
                @csrf
                @method('post')

                <div class="d-none form-group">
                  <label for="info_voter_id">
                  </label>
                  <input type="hidden" name="info_voter_id" value="{{$comboAuth->id}}" class="form-control">
                </div>

                <div class="d-none form-group">
                  <label for="info_voted_id"></label>
                  <input type="hidden" name="info_voted_id" value="{{$user->id}}" class="form-control">
                </div>

                {{-- Voto UTENTE Categoria 1 --}}

                <h3>Come valuti la categoria 1?</h3>
                <div class="d-none form-group">
                  <label for="category1_id"></label>
                  <input type="hidden" name="category1_id" value="1" class="form-control">
                </div>

                <div class="form-group">
                  <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                    <input :id="'radio'+index" type="radio" name="voteUser1" :value="index" @click="checkVoteComment1(index)" v-model="radio1">
                    <label class="radio-label" :for="'radio'+index">
                      @{{index}}
                    </label>
                  </div>
                </div>

                <div v-if="showComment1" class="form-group">
                  <p style="color: red">
                    @{{commentMessage}}
                  </p>
                  <label for="comment1"></label>
                  <textarea :required="showComment1 ? true : false" v-model="textarea1" name="comment1" rows="8" cols="80" maxlength="255" placeholder="Inserisci qui la tua motivazione" class="form-control">{{ old('comment1')}}</textarea><br>
                </div>

                {{-- Voto UTENTE Categoria 2 --}}

                <h3>Come valuti la categoria 2?</h3>
                <div class="d-none form-group">
                  <label for="category2_id"></label>
                  <input type="hidden" name="category2_id" value="2" class="form-control">
                </div>

                <div class="form-group">
                  <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                    <input :id="'radio2'+index" type="radio" name="voteUser2" :value="index" @click="checkVoteComment2(index)" v-model="radio2">
                    <label class="radio-label" :for="'radio2'+index">
                      @{{index}}
                    </label>
                  </div>
                </div>

                <div v-if="showComment2" class="form-group">
                  <p style="color: red">
                    @{{commentMessage}}
                  </p>
                  <label for="comment2"></label>
                  <textarea :required="showComment1 ? true : false" v-model="textarea2" name="comment2" rows="8" cols="80" maxlength="255" placeholder="Inserisci qui la tua motivazione" class="form-control">{{ old('comment2')}}</textarea><br>
                </div>

                {{-- Voto UTENTE Categoria 3 --}}

                <h3>Come valuti la categoria 3?</h3>
                <div class="d-none form-group">
                  <label for="category3_id"></label>
                  <input type="hidden" name="category3_id" value="3" class="form-control">
                </div>

                <div class="form-group">
                  <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                    <input :id="'radio3'+index" type="radio" name="voteUser3" :value="index" @click="checkVoteComment3(index)" v-model="radio3">
                    <label class="radio-label" :for="'radio3'+index">
                      @{{index}}
                    </label>
                  </div>
                </div>

                <div v-if="showComment3" class="form-group">
                  <p style="color: red">
                    @{{commentMessage}}
                  </p>
                  <label for="comment3"></label>
                  <textarea :required="showComment1 ? true : false" v-model="textarea3" name="comment3" rows="4" cols="80" maxlength="255" placeholder="Inserisci qui la tua motivazione" class="form-control">{{ old('comment3')}}</textarea>
                </div>

        <input :disabled="isDisabled ? true : false" style="margin-top:50px;" class="submit" type="submit" name="" value="Salva" @click="alertVoted()">
      </form>
      <a class="btn btn-success" href="{{route('logged.votes.index')}}">Torna indietro</a>
      <button class="btn btn-primary" @click="cancelVotes()">Cancella voti</button>
    {{-- @endforeach --}}
    @else

              {{-- VOTAZIONE AL TEAM --}}

              <h1>Stai votando il Team {{$id}}</h1>
              @foreach ($team as $key => $player)
                <h3>{{$player -> user -> name}} {{$player -> user -> lastname}}</h3>
              @endforeach

      <form  class="form" action="{{ route('logged.team.voted')}}" method="post">
        @csrf
        @method('post')

                <div class="form-group">
                  <label for="info_voter_id"></label>
                  <input type="hidden" name="info_voter_id" value="{{$comboAuth->id}}" class="form-control">
                </div>

                {{-- Voto TEAM Categoria 1 --}}

                <div class="form-group">
                  <label for="category1_id"></label>
                  <input type="hidden" name="category1_id" value="1" class="form-control">
                </div>

                <div class="form-group">
                  <label for="team_id"></label>
                  <input type="hidden" name="team_id" value="{{$id}}">
                </div>

                <h3>Come valuti la categoria 1?</h3>

                <div class="form-group">
                  <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                    <input :id="'radio1'+index" type="radio" name="voteTeam1" :value="index" @click="checkVoteComment1(index)" v-model="radio1">
                    <label class="radio-label" :for="'radio1'+index">
                      @{{index}}
                    </label>
                  </div>
                </div>

                <div v-if="showComment1" class="form-group">
                  <p style="color: red">
                    @{{commentMessage}}
                  </p>
                  <label for="comment1"></label>
                  <textarea :required="showComment1 ? true : false" v-model="textarea1" name="comment1" rows="8" cols="80" maxlength="255" placeholder="Inserisci qui la tua motivazione" class="form-control">{{ old('comment1')}}</textarea><br>
                </div>

                {{-- Voto TEAM Categoria 2 --}}

                <h3>Come valuti la categoria 2?</h3>
                <div class="form-group">
                  <label for="category2_id"></label>
                  <input type="hidden" name="category2_id" value="2" class="form-control">
                </div>

                <div class="form-group">
                  <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                    <input :id="'radio2'+index" type="radio" name="voteTeam2" :value="index" @click="checkVoteComment2(index)" v-model="radio2">
                    <label class="radio-label" :for="'radio2'+index">
                      @{{index}}
                    </label>
                  </div>
                </div>

                <div v-if="showComment2" class="form-group">
                  <p style="color: red">
                    @{{commentMessage}}
                  </p>
                  <label for="comment2"></label>
                  <textarea :required="showComment2 ? true : false" v-model="textarea2" name="comment2" rows="8" cols="80" maxlength="255" placeholder="Inserisci qui la tua motivazione" class="form-control">{{ old('comment2')}}</textarea><br>
                </div>

                {{-- Voto TEAM Categoria 3 --}}

                <h3>Come valuti la categoria 3?</h3>
                <div class="form-group">
                  <label for="category3_id"></label>
                  <input type="hidden" name="category3_id" value="3" class="form-control">
                </div>

                <div class="form-group">
                  <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                    <input :id="'radio3'+index" type="radio" name="voteTeam3" :value="index" @click="checkVoteComment3(index)" v-model="radio3">
                    <label class="radio-label" :for="'radio3'+index">
                      @{{index}}
                    </label>
                  </div>
                </div>

        <input :disabled="isDisabled ? true : false" style="margin-top:50px;"id="submit" type="submit" class="submit" name="" value="Salva" @click="alertVoted()">
      </form>
      <a class="btn btn-success" href="{{route('logged.votes.index')}}">Torna indietro</a>
      <button class="btn btn-primary" @click="cancelVotes()">Cancella voti</button>

                <button :disabled="isDisabled ? true : false" style="margin-top:50px;"id="submit" type="submit" class="submit">Salva</button>
              </form>
              <a class="btn btn-success" href="{{route('logged.votes.index')}}">Torna indietro</a>
              <button class="btn btn-primary" @click="cancelVotes()">Cancella voti</button>

            @endif

          </div>
        </div>
      </div>
    </div>  {{-- Closing Container --}}
  </section>
@endsection
