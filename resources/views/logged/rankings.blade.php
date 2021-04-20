@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-12">
      <h1 class="text-center">Classifica Provvisoria</h1>
    </div>

  </div>
  ​​​@foreach ($votesRank as $key => $value)

    <div class="card" style="width: 18rem;">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          @php
            echo $value['name'].' '.$value['lastname'].':'.$value['valore'];
          @endphp
        </li>
      </ul>
    </div>

  @endforeach
  {{-- <canvas id="myChart" width="400" height="400"></canvas> --}}
  <div class="">

    <p>classifica visualizzabile da tutti</p>

    @if ($round->name == 3)
     <a class="btn btn-dark" href="{​​​​​​​{​​​​​​​route('logged.final')}​​​​​​​}​​​​​​">Clicca per uscire</a>
    @else
     <a class="btn btn-dark" href="{​​​​​​​{​​​​​​​route('logged.index')}​​​​​​​}​​​​​​​">Vai al prossimo round</a>
    @endif

  </div>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script> --}}

</div>
{{--
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {​​​​​​​
  type: 'bar',
  data: {​​​​​​​
      labels: [@php
        foreach ($votesRank as $key => $value) {​​​​​​​
          echo "'".
          $value['name'].
          " ".
          $value['lastname'].
          "'".
          ',';
        }​​​​​​​
      @endphp],
      datasets: [{​​​​​​​
          label: 'Voti',
          data: [@php
            foreach ($votesRank as $key => $value) {​​​​​​​
              echo
              $value['valore'].


              ',';
            }​​​​​​​
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
      }​​​​​​​]
  }​​​​​​​,
  options: {​​​​​​​
      indexAxis: 'y',
  }​​​​​​​
}​​​​​​​);
function init(){​​​​​​​
myChart.update();
}​​​​​​​
setInterval(function(){​​​​​​​
init();
console.log('chart is updatig');
}​​​​​​​,2000);
</script> --}}

@endsection
