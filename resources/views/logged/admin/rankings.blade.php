@extends('layouts.app')

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.1/dist/chart.min.js"></script>
@endsection

@section('chart')
  <main>
    <section id="rankings">
      <div class="container">
        <div class="row justify-content-center">
          <button onclick="classificaGenerale()" class="btn btn-primary" type="button" name="button">Classifica Generale</button>
          <button onclick="categoriaIsf()" class="btn btn-primary" type="button" name="button">Categoria ISF</button>
          <button onclick="gestioneObiezioni()" class="btn btn-primary" type="button" name="button">Gestione Obiezioni</button>
          <button onclick="callToAction()" class="btn btn-primary" type="button" name="button">Call to Action</button>
          <div class="col-12">
            <h1 class="text-center">Classifica</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            {{-- Grafico --}}
            <canvas id="classificaGenerale" width="400" height="400"></canvas>
            <canvas id="categoriaIsf" width="400" height="400"></canvas>
            <canvas id="gestioneObiezioni" width="400" height="400"></canvas>
            <canvas id="callToAction" width="400" height="400"></canvas>

            {{-- Elenco nomi --}}
            @foreach ($votesRank as $key => $score)
              <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    @php
                    echo($score['name'] . ':' . $score['score']);
                    // echo $score['name'].':'.$result['valore'] ;
                    @endphp
                  </li>
                </ul>
              </div>
            @endforeach

            <div class="text-center">
              <a href="{{route('logged.home')}}" class="btn btn-dark">Torna alla home</a>
            </div>
          </div>
        </div>
      </div>  {{-- Closing Container --}}
    </section>
  </main>
  <script>

  // CLASSIFICA GENERALE CHART

  var ctx = document.getElementById('classificaGenerale').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [@php
      foreach ($votesRank as $key => $score) {
        echo "'".
        $score['name'] .
        "'".
        ',';
      }
      @endphp],
      datasets: [{
        label: 'Voti',
        data: [@php
        foreach ($votesRank as $key => $score) {
          echo $score['score'].
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

  // CATEGORIA ISF CHART

  var ctx2 = document.getElementById('categoriaIsf').getContext('2d');
  var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: [@php
      foreach ($votesRank as $key => $score) {
        echo "'".
        $score['name'] .
        "'".
        ',';
      }
      @endphp],
      datasets: [{
        label: 'Voti',
        data: [@php
        foreach ($votesRank as $key => $score) {
          echo $score['score'].
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

  // GESTIONE OBIEZIONI CHART

  var ctx3 = document.getElementById('gestioneObiezioni').getContext('2d');
  var myChart3 = new Chart(ctx3, {
    type: 'bar',
    data: {
      labels: [@php
      foreach ($votesObiezioni as $key => $score) {
        echo "'".
        $score['name'] .
        "'".
        ',';
      }
      @endphp],
      datasets: [{
        label: 'Voti',
        data: [@php
        foreach ($votesObiezioni as $key => $score) {
          echo $score['scoreObiezioni'].
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

  // CALL TO ACTION CHART

  var ctx4 = document.getElementById('callToAction').getContext('2d');
  var myChart4 = new Chart(ctx4, {
    type: 'bar',
    data: {
      labels: [@php
      foreach ($votesRank as $key => $score) {
        echo "'".
        $score['name'] .
        "'".
        ',';
      }
      @endphp],
      datasets: [{
        label: 'Voti',
        data: [@php
        foreach ($votesRank as $key => $score) {
          echo $score['score'].
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
    myChart2.update();
    myChart3.update();
    myChart4.update();
  }
  setInterval(function() {
    init();
    console.log('chart is updating');
  }, 2000);

  document.getElementById('classificaGenerale').style.display = 'none' ;
  document.getElementById('categoriaIsf').style.display = 'none' ;
  document.getElementById('gestioneObiezioni').style.display = 'none' ;
  document.getElementById('callToAction').style.display = 'none' ;

  function classificaGenerale() {
    document.getElementById('classificaGenerale').style.display = 'block' ;
    document.getElementById('categoriaIsf').style.display = 'none' ;
    document.getElementById('gestioneObiezioni').style.display = 'none' ;
    document.getElementById('callToAction').style.display = 'none' ;
    console.log('classificaGenerale');
  }
  function categoriaIsf() {
    document.getElementById('classificaGenerale').style.display = 'none' ;
    document.getElementById('categoriaIsf').style.display = 'block' ;
    document.getElementById('gestioneObiezioni').style.display = 'none' ;
    document.getElementById('callToAction').style.display = 'none' ;
    console.log('categoriaIsf');
  }
  function gestioneObiezioni() {
    document.getElementById('classificaGenerale').style.display = 'none' ;
    document.getElementById('categoriaIsf').style.display = 'none' ;
    document.getElementById('gestioneObiezioni').style.display = 'block' ;
    document.getElementById('callToAction').style.display = 'none' ;
    console.log('gestioneObiezioni');
  }
  function callToAction() {
    document.getElementById('classificaGenerale').style.display = 'none' ;
    document.getElementById('categoriaIsf').style.display = 'none' ;
    document.getElementById('gestioneObiezioni').style.display = 'none' ;
    document.getElementById('callToAction').style.display = 'block' ;
    console.log('callToAction');
  }

</script>

@endsection
