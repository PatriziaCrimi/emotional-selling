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
            Stai visualizzando i tuoi voti dati al
            <span class="font-weight-bold">
              Team
              {{$teamName -> name}}
            </span>
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
              @php
                $categories_quantity = App\Category::all();
              @endphp
              @if(count($currentVotes) != count($categories_quantity))
                  <h2 class="text-center">Non hai votato una o più categorie.</h2>
              @endif

              @foreach ($currentVotes as $key => $vote)
                <div class="category-wrapper">
                  <h3> Come valuti
                    @php
                    $category = \App\Category::find($vote->category_id);
                    @endphp
                    {{$category->name}}
                  </h3>
                  <div v-for="index in 10" :key="index" class="radio-toolbar d-inline-block">
                    <input disabled="disabled" class="d-none" :id="'radio{{$vote->category_id}}'+index" type="radio" name="voteTeam{{$vote->category_id}}" :value="index" v-model="{{$vote->value}}">
                    <label class="radio-label-disabled" :for="'radio{{$vote->category_id}}'+index">
                      @{{index}}
                    </label>
                  </div>
                  @if ($vote->comment)
                    @if ($vote->value <= 5)
                      <p class="comment-message">
                        @{{lowGradeMessage}}
                      </p>
                    @elseif ($vote->value >= 9)
                      <p class="comment-message">
                        @{{highGradeMessage}}
                      </p>
                    @else
                      <p class="comment-message">
                        @{{normalGradeMessage}}
                      </p>
                    @endif
                    <textarea readonly rows="3" cols="80" class="form-control readonly">{{ $vote->comment }}</textarea>
                  @else
                    <p>Non hai aggiunto alcun commento.</p>
                  @endif
                </div>
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
