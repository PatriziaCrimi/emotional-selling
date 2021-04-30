@extends('layouts.app')

@section('scripts')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection

@section('content')


  <div class="container">

    <div class="row justify-content-center m-4">
      <form v-on:submit.prevent="getVotesLive" method="POSt">

      <div class="form-row">

        <select placeholder="Select a Round" v-model="form2.round_id" name="round_id"class="form-control mr-4 col">
            <option value="" disabled selected>Select a Round</option>
          @foreach ($rounds as $round)
            <option value="{{$round -> id}}">Round {{$round -> name}}</option>
          @endforeach
        </select>

        <button @click="resetTable" type="submit" class="btn btn-primary ">Submit</button>

      </div>

    </form>

    </div>
    <div class="row justify-content-center m-2">
      <div class="row justify-content-center">
        <div class="contact-form-success alert alert-success mt-4" v-if="success">
            <strong>Success!</strong> This is your request.
        </div>

        <div class="contact-form-error alert alert-danger mt-4" v-if="error">
            <strong>Error!</strong> Your request has no results.
        </div>
      </div>
    </div>
    <div class="row justify-content-center m-4">
      <div v-if="liveArray.length" class="table-responsive" style="max-height:400px;">
        <table class="table table-bordered table-striped mb-0">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Cognome</th>
              <th scope="col">Ruolo</th>
              <th scope="col">Voto</th>
              <th scope="col">Vote Time</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(votes,index) in liveArray">
              <th scope="row">@{{index+1}}</th>
              <td>@{{votes.name}}</td>
              <td>@{{votes.lastname}}</td>
              <td>@{{votes.role}}</td>
              <td>@{{votes.vote}}</td>
              <td>@{{votes.vote_time}}</td>
            </tr>

          </tbody>
        </table>
      </div>
      <div v-else>

      </div>

    </div>

  </div>

@endsection
