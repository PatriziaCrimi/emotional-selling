@extends('layouts.app')

@section('scripts')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection

@section('content')
  <section id="votes-form">
    <div class="container">

      {{-- VOTAZIONE AL TEAM --}}

      <div class="row">
        <div class="col-12">
          @php
            $teamName = \App\Team::find($id);
          @endphp
          <h1 class="text-center">
            Stai votando il Team
            {{$teamName -> name}}
          </h1>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="players-wrapper text-center">
            @foreach ($team as $key => $player)
              <h3 class="player-name d-inline-block font-weight-normal">
                {{$player -> user -> lastname}}
                <span> {{ $loop->last ? '' : '|' }} </span>
              </h3>
            @endforeach
          </div>
        </div>
      </div>

      {{-- FORM TEAM --}}
      <div class="row">
        <div class="col-12">
          <div class="form-wrapper">
            <form @submit="alertVoted()" @change="isFormEmpty()" class="form" action="{{ route('logged.team.voted')}}" method="post">
              @csrf
              @method('post')

              <div class="d-none form-group">
                <label for="info_voter_id"></label>
                <input type="hidden" name="info_voter_id" value="{{$comboAuth->id}}" class="form-control">
              </div>

              {{-- Voto TEAM Categoria 1 --}}

              <div class="d-none form-group">
                <label for="category1_id"></label>
                <input type="hidden" name="category1_id" value="1" class="form-control">
              </div>

              <div class="d-none form-group">
                <label for="team_id"></label>
                <input type="hidden" name="team_id" value="{{$id}}">
              </div>

              <div class="form-group">
                <h3>Come valuti la categoria 1?</h3>
                <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                  <input :id="'radio1'+index" type="radio" name="voteTeam1" :value="index" @click="checkVoteComment1(index)" v-model="radio1">
                  <label class="radio-label" :for="'radio1'+index">
                    @{{index}}
                  </label>
                </div>

                <div class="text" v-if="showComment1">
                  <p class="comment-message">
                    @{{commentMessage1}}
                  </p>
                  <label for="comment1"></label>
                  <textarea :required="isRequired1 ? true : false" v-model="textarea1" name="comment1" rows="3" cols="80" maxlength="255" :placeholder="isRequired1 ? 'Inserisci la motivazione' : 'Inserisci il commento'" class="form-control">{{ old('comment1')}}</textarea><br>
                </div>
              </div>

              {{-- Voto TEAM Categoria 2 --}}

              <div class="d-none form-group">
                <label for="category2_id"></label>
                <input type="hidden" name="category2_id" value="2" class="form-control">
              </div>

              <div class="form-group">
                <h3>Come valuti la categoria 2?</h3>
                <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                  <input :id="'radio2'+index" type="radio" name="voteTeam2" :value="index" @click="checkVoteComment2(index)" v-model="radio2">
                  <label class="radio-label" :for="'radio2'+index">
                    @{{index}}
                  </label>
                </div>

                <div v-if="showComment2">
                  <p class="comment-message">
                    @{{commentMessage2}}
                  </p>
                  <label for="comment2"></label>
                  <textarea :required="isRequired2 ? true : false" v-model="textarea2" name="comment2" rows="3" cols="80" maxlength="255" :placeholder="isRequired2 ? 'Inserisci la motivazione' : 'Inserisci il commento'" class="form-control">{{ old('comment2')}}</textarea><br>
                </div>
              </div>

              {{-- Voto TEAM Categoria 3 --}}

              <div class="d-none form-group">
                <label for="category3_id"></label>
                <input type="hidden" name="category3_id" value="3" class="form-control">
              </div>

              <div class="form-group">
                <h3>Come valuti la categoria 3?</h3>
                <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                  <input :id="'radio3'+index" type="radio" name="voteTeam3" :value="index" @click="checkVoteComment3(index)" v-model="radio3">
                  <label class="radio-label" :for="'radio3'+index">
                    @{{index}}
                  </label>
                </div>

                <div v-if="showComment3">
                  <p class="comment-message">
                    @{{commentMessage3}}
                  </p>
                  <label for="comment3"></label>
                  <textarea :required="isRequired3 ? true : false" v-model="textarea3" name="comment3" rows="3" cols="80" maxlength="255" :placeholder="isRequired3 ? 'Inserisci la motivazione' : 'Inserisci il commento'" class="form-control">{{ old('comment3')}}</textarea><br>
                </div>
              </div>

              {{-- Voto TEAM Categoria 4 --}}

              <div class="d-none form-group">
                <label for="category4_id"></label>
                <input type="hidden" name="category4_id" value="4" class="form-control">
              </div>

              <div class="form-group">
                <h3>Come valuti la categoria 4?</h3>
                <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                  <input :id="'radio4'+index" type="radio" name="voteTeam4" :value="index" @click="checkVoteComment4(index)" v-model="radio4">
                  <label class="radio-label" :for="'radio4'+index">
                    @{{index}}
                  </label>
                </div>

                <div v-if="showComment4">
                  <p class="comment-message">
                    @{{commentMessage4}}
                  </p>
                  <label for="comment4"></label>
                  <textarea :required="isRequired4 ? true : false" v-model="textarea4" name="comment4" rows="3" cols="80" maxlength="255" :placeholder="isRequired4 ? 'Inserisci la motivazione' : 'Inserisci il commento'" class="form-control">{{ old('comment4')}}</textarea><br>
                </div>
              </div>

              <div class="submit-wrapper text-center">
                <button :disabled="isDisabled ? true : false" id="submit" type="submit" class="btn btn-lg">
                  Invia il voto
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="buttons-wrapper text-center">
            <a class="btn btn-back" href="{{route('logged.votes.index')}}">
              Torna indietro
            </a>
            <a class="btn btn-cancel" @click="cancelVotes()">
              Cancella voti
            </a>
          </div>
        </div>
      </div>
    </div>  {{-- Closing Container --}}
  </section>
@endsection