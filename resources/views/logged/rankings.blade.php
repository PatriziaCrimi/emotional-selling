@extends('layouts.app')

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.1/dist/chart.min.js"></script>
@endsection

@section('chart')
  <main>
    <section id="rankings">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <h1 class="text-center">Classifica Provvisoria</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            {{-- Grafico --}}
            <canvas id="myChart" width="400" height="400"></canvas>
            {{-- Elenco nomi --}}
            @foreach ($votesRank as $key => $value)
              <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    @php
                    echo $value['name'].':'.$value['valore'] ;
                    @endphp
                  </li>
                </ul>
              </div>
            @endforeach

            <div class="text-center">
              @if ($round->name == 3)
                <a href="{{route('logged.final')}}" class="btn btn-dark">Clicca per uscire</a>
              @else
                <a href="{{route('logged.index')}}" class="btn btn-dark">Vai al prossimo round</a>
              @endif
            </div>
          </div>
        </div>
      </div>  {{-- Closing Container --}}
    </section>
  </main>
  <script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [@php
      foreach ($votesRank as $key => $value) {
        echo "'".
        $value['name'].
        "'".
        ',';
      }
      @endphp],
      datasets: [{
        label: 'Voti',
        data: [@php
        foreach ($votesRank as $key => $value) {
          echo $value['valore'].
          ',';
        }
        @endphp],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      indexAxis: 'y',
    }
  });
  function init() {
    myChart.update();
  }
  setInterval(function() {
    init();
    console.log('chart is updating');
  }, 2000);
</script>

@endsection
