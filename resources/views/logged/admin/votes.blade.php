@extends('layouts.app')

@section('scripts')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection

@section('content')
  <section class="admin">

    <div class="container">

      <div class="row justify-content-center m-4">
        <form v-on:submit.prevent="getVotes" method="POSt">
          {{-- <form action="{{route('logged.admin.getList')}}" method="POST">
          @csrf
          @method('post') --}}
          @csrf
          @method('post')
          <div class="form-row">
            {{-- <label for="form.user_id">Seleziona un utente</label> --}}
            <select  v-model="form.user_id" name="user_id"class="form-control mr-4 col">

              <option value="" disabled selected>Select a User</option>
              @foreach ($users as $user)
                <option value="{{$user -> id}}">{{$user -> lastname}} {{$user -> name}}</option>
              @endforeach
            </select>

            {{-- <label for="form.round_id">Seleziona un Round</label> --}}
            <select placeholder="Select a Round"v-model="form.round_id" name="round_id"class="form-control mr-4 col">
              <option value="" disabled selected>Select a Round</option>
              @foreach ($rounds as $round)
                <option value="{{$round -> id}}">Round {{$round -> name}}</option>
              @endforeach
            </select>

            <button type="submit" @click="resetTable" class="btn btn-primary ">Submit</button>

          </div>

        </form>

      </div>

      <div class="row justify-content-center">
        <div class="contact-form-success alert alert-success mt-4" v-if="success">
          <strong>Success!</strong> This is your request.
        </div>

        <div class="contact-form-error alert alert-danger mt-4" v-if="error">
          <strong>Error!</strong> Your request has no results.
        </div>
      </div>

      <div class="row justify-content-center">

        <div v-if="votesArray.length" class="table-responsive" style="max-height:400px;">
          <table class="table table-bordered table-striped mb-0">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Ruolo</th>
                <th scope="col">Round</th>
                <th scope="col">Voto</th>
                <th scope="col">Commento</th>
                <th scope="col">Categoria</th>
                <th scope="col">Team</th>
                <th scope="col">Vote Time</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(votes,index) in votesArray">
                <th scope="row">@{{index+1}}</th>
                <td>@{{votes.name}}</td>
                <td>@{{votes.lastname}}</td>
                <td>@{{votes.role}}</td>
                <td>Round @{{votes.round}}</td>
                <td>@{{votes.value}}</td>
                <td v-if="votes.comment">@{{votes.comment}}</td>
                <td v-else>No comment released</td>
                <td>@{{votes.category}}</td>
                <td>@{{votes.team}}</td>
                <td>@{{votes.vote_time}}</td>
              </tr>

            </tbody>
          </table>
        </div>
        <div v-else>

        </div>
      </div>
    </div>
  </section>
@endsection
