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
          <h1 class="text-center">Stai votando il Team {{$teamName -> name}}</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="players-wrapper text-center">
            @foreach ($team as $key => $player)
              <h3>{{$player -> user -> name}} {{$player -> user -> lastname}}</h3>
            @endforeach
          </div>
        </div>
      </div>

      {{-- FORM TEAM --}}
      <div class="row">
        <div class="col-12">
          <div class="form-wrapper text-center">
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
              <div class="d-none form-group">
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
              <div class="d-none form-group">
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

              <div v-if="showComment3" class="form-group">
                <p style="color: red">
                  @{{commentMessage}}
                </p>
                <label for="comment3"></label>
                <textarea :required="showComment3 ? true : false" v-model="textarea3" name="comment3" rows="8" cols="80" maxlength="255" placeholder="Inserisci qui la tua motivazione" class="form-control">{{ old('comment3')}}</textarea><br>
              </div>

              {{-- Voto TEAM Categoria 4 --}}

              <h3>Come valuti la categoria 4?</h3>
              <div class="d-none form-group">
                <label for="category4_id"></label>
                <input type="hidden" name="category4_id" value="4" class="form-control">
              </div>

              <div class="form-group">
                <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                  <input :id="'radio4'+index" type="radio" name="voteTeam4" :value="index" @click="checkVoteComment4(index)" v-model="radio4">
                  <label class="radio-label" :for="'radio4'+index">
                    @{{index}}
                  </label>
                </div>
              </div>

              <div v-if="showComment4" class="form-group">
                <p style="color: red">
                  @{{commentMessage}}
                </p>
                <label for="comment4"></label>
                <textarea :required="showComment4 ? true : false" v-model="textarea4" name="comment4" rows="8" cols="80" maxlength="255" placeholder="Inserisci qui la tua motivazione" class="form-control">{{ old('comment4')}}</textarea><br>
              </div>

              <button :disabled="isDisabled ? true : false" style="margin-top:50px;"id="submit" type="submit" class="submit">Salva</button>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="buttons-wrapper text-center">
            <a class="btn btn-success" href="{{route('logged.votes.index')}}">
              Torna indietro
            </a>
            <a class="btn btn-primary" @click="cancelVotes()">
              Cancella voti
            </a>
          </div>
        </div>
      </div>
    </div>  {{-- Closing Container --}}
  </section>
@endsection
