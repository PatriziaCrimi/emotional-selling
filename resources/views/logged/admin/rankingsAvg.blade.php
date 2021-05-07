@extends('layouts.app')

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.1/dist/chart.min.js"></script>
@endsection

@section('chart')
  <main>
    <section id="rankings">
      <div class="container">


        {{-- @if (empty($avg))s --}}
          <div class="row justify-content-center">
            <button onclick="classificaGenerale()" class="btn btn-primary m-2" type="button" name="button">Classifica Generale Avg</button>
            <button onclick="categoriaIsf()" class="btn btn-primary m-2" type="button" name="button">Categoria ISF Avg</button>
            <button onclick="callToAction()" class="btn btn-primary m-2" type="button" name="button">Call to Action Avg</button>
            <button onclick="paroleTossiche()" class="btn btn-primary m-2" type="button" name="button">Parole Tossiche Avg</button>
            <div class="col-12">
              <h1 id="class_gen" class="text-center">Classifica Generale Avg</h1>
              <h1 id="class_isf" class="text-center">Classifica ISF Avg</h1>
              <h1 id="class_cta" class="text-center">Classifica CTA Avg</h1>
              <h1 id="class_tox" class="text-center">Classifica Parole Tossiche Avg</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              {{-- Grafico --}}
              <canvas id="classificaGenerale" width="400" height="400"></canvas>
              <canvas id="categoriaIsf" width="400" height="400"></canvas>
              <canvas id="callToAction" width="400" height="400"></canvas>
              <canvas id="paroleTossiche" width="400" height="400"></canvas>

              {{-- Elenco nomi --}}
              @foreach ($avg as  $score)
                <div class="card" style="width: 18rem;">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">

                      {{$score -> team -> name}} : {{$score->avg}}

                    </li>
                  </ul>
                </div>
              @endforeach

              <div class="text-center">
                <a href="{{route('logged.home')}}" class="btn btn-lg">Torna alla home</a>
              </div>
            </div>
          </div>
          
          {{-- DA IMPLEMENTARE --}}

        {{-- @else
          <div class="row">
            <div class="col-12">
              <div class="card m-2">
                <h2 class="text-center p-2">Non ci sono votazioni.</h2>
              </div>
            </div>
          </div>
        @endif --}}
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
      foreach ($avg as $score) {
        echo "'".
        $score-> team -> name .
        "'".
        ',';
      }
      @endphp],
      datasets: [{
        label: 'Voti',
        data: [@php
        foreach ($avg as $score) {
          echo $score->avg.
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
  var myChartIsf = new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: [@php
      foreach ($avgIsf as  $score) {
        echo "'".
        $score->team->name .
        "'".
        ',';
      }
      @endphp],
      datasets: [{
        label: 'Voti',
        data: [@php
        foreach ($avgIsf as  $score) {
          echo $score->avg.
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

  var ctx3 = document.getElementById('callToAction').getContext('2d');
  var myChartCta = new Chart(ctx3, {
    type: 'bar',
    data: {
      labels: [@php
      foreach ($avgCta as $score) {
        echo "'".
        $score->team->name .
        "'".
        ',';
      }
      @endphp],
      datasets: [{
        label: 'Voti',
        data: [@php
        foreach ($avgCta as $score) {
          echo $score->avg.
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

  // PAROLE TOSSICHE CHART

  var ctx4 = document.getElementById('paroleTossiche').getContext('2d');
  var myChartTox = new Chart(ctx4, {
    type: 'bar',
    data: {
      labels: [@php
      foreach ($avgTox as $score) {
        echo "'".
        $score->team->name .
        "'".
        ',';
      }
      @endphp],
      datasets: [{
        label: 'Voti',
        data: [@php
        foreach ($avgTox as $score) {
          echo $score->avg.
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
    myChartIsf.update();
    myChartCta.update();
    myChartTox.update();
  }
  setInterval(function() {
    init();
    console.log('chart is updating');
  }, 2000);

  document.getElementById('classificaGenerale').style.display = 'none' ;
  document.getElementById('categoriaIsf').style.display = 'none' ;
  document.getElementById('callToAction').style.display = 'none' ;
  document.getElementById('paroleTossiche').style.display = 'none' ;
  document.getElementById('class_gen').style.display = 'none' ;
  document.getElementById('class_isf').style.display = 'none' ;
  document.getElementById('class_cta').style.display = 'none' ;
  document.getElementById('class_tox').style.display = 'none' ;

  function classificaGenerale() {
    document.getElementById('classificaGenerale').style.display = 'block' ;
    document.getElementById('categoriaIsf').style.display = 'none' ;
    document.getElementById('callToAction').style.display = 'none' ;
    document.getElementById('paroleTossiche').style.display = 'none' ;
    document.getElementById('class_gen').style.display = 'block' ;
    document.getElementById('class_isf').style.display = 'none' ;
    document.getElementById('class_cta').style.display = 'none' ;
    document.getElementById('class_tox').style.display = 'none' ;
    console.log('classificaGenerale');
  }
  function categoriaIsf() {
    document.getElementById('classificaGenerale').style.display = 'none' ;
    document.getElementById('categoriaIsf').style.display = 'block' ;
    document.getElementById('callToAction').style.display = 'none' ;
    document.getElementById('paroleTossiche').style.display = 'none' ;
    document.getElementById('class_gen').style.display = 'none' ;
    document.getElementById('class_isf').style.display = 'block' ;
    document.getElementById('class_cta').style.display = 'none' ;
    document.getElementById('class_tox').style.display = 'none' ;
    console.log('categoriaIsf');
  }
  function paroleTossiche() {
    document.getElementById('classificaGenerale').style.display = 'none' ;
    document.getElementById('categoriaIsf').style.display = 'none' ;
    document.getElementById('callToAction').style.display = 'none' ;
    document.getElementById('paroleTossiche').style.display = 'block' ;
    document.getElementById('class_gen').style.display = 'none' ;
    document.getElementById('class_isf').style.display = 'none' ;
    document.getElementById('class_cta').style.display = 'none' ;
    document.getElementById('class_tox').style.display = 'block' ;
    console.log('paroleTossiche');
  }
  function callToAction() {
    document.getElementById('classificaGenerale').style.display = 'none' ;
    document.getElementById('categoriaIsf').style.display = 'none' ;
    document.getElementById('callToAction').style.display = 'block' ;
    document.getElementById('paroleTossiche').style.display = 'none' ;
    document.getElementById('class_gen').style.display = 'none' ;
    document.getElementById('class_isf').style.display = 'none' ;
    document.getElementById('class_cta').style.display = 'block' ;
    document.getElementById('class_tox').style.display = 'none' ;
    console.log('callToAction');
  }

</script>

@endsection
