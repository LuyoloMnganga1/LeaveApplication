@extends('layouts.main')
@section('content')
            <!-- cards-->
            <div class="main-part">
            <div class="cpanel">
            <div class="icon-part">
            <i class="fa fa-users" aria-hidden="true"></i><br>
            <small>Members</small>
            <p>{{ $user }}</p>
            </div>
            <div class="card-content-part">
            <a href="{{ url ('userList')}}">More Details </a>
            </div>
            </div>
            <div class="cpanel cpanel-blue">
            <div class="icon-part">
            <i class="fa fa-tasks" aria-hidden="true"></i><br>
            <small>Applications</small>
            <p>{{ $app }}</p>
            </div>
            <div class="card-content-part">
            <a href="{{ url('applicationList')}}">More Details </a>
            </div>
            </div>
            
            <div class="cpanel cpanel-orange">
            <div class="icon-part">
            <i class="fa fa-building" aria-hidden="true"></i><br>
            <small>Departments</small>
            <p>{{ $dep }}</p>
            </div>
            <div class="card-content-part">
            <a href="{{ url('department')}}">More Details </a>
            </div>
            </div>
            <div class="cpanel cpanel-red">
            <div class="icon-part">
            <i class="fa fa-bed" aria-hidden="true"></i><br>
            <small>Leaves</small>
            <p>{{ $leaves}}</p>
            </div>
            <div class="card-content-part">
            <a href="{{ url('leaves')}}">More Details </a>
            </div>
            </div>
            <div class="cpanel cpanel-green">
            <div class="icon-part">
            <i class="fas fa-plane" aria-hidden="true"></i><br>
            <small>Public holidays</small>
            <p>{{ $holiday}}</p>
            </div>
            <div class="card-content-part">
            <a href="{{ url('holiday')}}">More Details </a>
            </div>
            </div>
    <!-- end of cards-->
        </div>
        <div style ="margin: 5%">
                <canvas id="myChart"></canvas>
            </div>
        </div>

    </div>
    <script>
    var cData = JSON.parse('<?php echo $chart_data; ?>');
  const data = {
    labels: cData.label,
    datasets: [{
      label: 'Leave Applications Month Wise',
      backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)',
      'Navy',
      'Cyan',
      'Teal',
      'Olive',
      'Green',
      'Magenta',
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)',
      'Navy',
      'Cyan',
      'Teal',
      'Olive',
      'Green',
      'Magenta',
    ],
    borderWidth: 3,
    data:cData.data,
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
      y: {
        beginAtZero: true
      }
    }
    }
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
@stop