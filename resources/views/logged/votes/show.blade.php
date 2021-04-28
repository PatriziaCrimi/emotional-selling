@extends('layouts.app')

@section('scripts')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection

@section('content')
  <section id="votes-show">
    <div class="container">

      {{-- VOTAZIONE AL TEAM --}}

      <div class="row">
        <div class="col-12">
          @php
            $teamName = \App\Team::find($id);
          @endphp
          <h1 class="text-center">
            Stai visualizzando i voti del Team
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

      {{-- SHOW FORM TEAM non editabile --}}
      <div class="row">
        <div class="col-12">
          <div class="form-wrapper">
            <form class="form">

              @foreach ($currentVotes as $key => $vote)

                {{-- Voto TEAM Categoria 1 --}}
                @if ($vote->category_id == 1)
                  <div class="form-group">
                    <h3>Come valuti la categoria 1?</h3>
                    <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                      <input readonly :id="'radio1'+index" type="radio" name="voteTeam1" :value="index" v-model="radio1">
                      <label readonly class="radio-label" :for="'radio1'+index" {{ $vote->value == '@{{index}}' ? 'checked=checked' : ''}}>
                        @{{index}}
                      </label>
                    </div>

                    <div>
                      <p class="comment-message">
                        @{{commentMessage}}
                      </p>
                      <label for="comment1"></label>
                      <textarea readonly v-model="textarea1" name="comment1" rows="8" cols="80" maxlength="255" :placeholder="isRequired1 ? 'Inserisci la motivazione' : 'Inserisci il commento'" class="form-control">{{ old('comment1', $vote->comment)}}</textarea><br>
                    </div>
                  </div>

                {{-- Voto TEAM Categoria 2 --}}
                @elseif($vote->category_id == 2)

                  <div class="form-group">
                    <h3>Come valuti la categoria 2?</h3>
                    <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                      <input readonly :id="'radio2'+index" type="radio" name="voteTeam2" :value="index" @click="checkVoteComment2(index)" v-model="radio2">
                      <label class="radio-label" :for="'radio2'+index">
                        @{{index}}
                      </label>
                    </div>

                    <div v-if="showComment2">
                      <p class="comment-message">
                        @{{commentMessage}}
                      </p>
                      <label for="comment2"></label>
                      <textarea readonly :required="isRequired2 ? true : false" v-model="textarea2" name="comment2" rows="8" cols="80" maxlength="255" :placeholder="isRequired2 ? 'Inserisci la motivazione' : 'Inserisci il commento'" class="form-control">{{ old('comment2', $vote->comment)}}</textarea><br>
                    </div>
                  </div>

                {{-- Voto TEAM Categoria 3 --}}
                @elseif($vote->category_id == 3)

                  <div class="form-group">
                    <h3>Come valuti la categoria 3?</h3>
                    <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                      <input readonly :id="'radio3'+index" type="radio" name="voteTeam3" :value="index" @click="checkVoteComment3(index)" v-model="radio3">
                      <label class="radio-label" :for="'radio3'+index">
                        @{{index}}
                      </label>
                    </div>

                    <div v-if="showComment3">
                      <p class="comment-message">
                        @{{commentMessage}}
                      </p>
                      <label for="comment3"></label>
                      <textarea readonly :required="isRequired3 ? true : false" v-model="textarea3" name="comment3" rows="8" cols="80" maxlength="255" :placeholder="isRequired3 ? 'Inserisci la motivazione' : 'Inserisci il commento'" class="form-control">{{ old('comment3', $vote->comment)}}</textarea><br>
                    </div>
                  </div>

                {{-- Voto TEAM Categoria 4 --}}
                @elseif($vote->category_id == 4)

                  <div class="form-group">
                    <h3>Come valuti la categoria 4?</h3>
                    <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                      <input readonly :id="'radio4'+index" type="radio" name="voteTeam4" :value="index" @click="checkVoteComment4(index)" v-model="radio4">
                      <label class="radio-label" :for="'radio4'+index">
                        @{{index}}
                      </label>
                    </div>

                    <div v-if="showComment4">
                      <p class="comment-message">
                        @{{commentMessage}}
                      </p>
                      <label for="comment4"></label>
                      <textarea readonly :required="isRequired4 ? true : false" v-model="textarea4" name="comment4" rows="8" cols="80" maxlength="255" :placeholder="isRequired4 ? 'Inserisci la motivazione' : 'Inserisci il commento'" class="form-control">{{ old('comment4', $vote->comment)}}</textarea><br>
                    </div>
                  </div>
                @endif
              @endforeach

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
          </div>
        </div>
      </div>
    </div>  {{-- Closing Container --}}
  </section>
@endsection
