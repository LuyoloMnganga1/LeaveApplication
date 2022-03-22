@extends('layouts.main')
@section('content')
@if(Auth::user()->hasRole('admin'))
            <!-- cards-->
            <div class="main-part">
            <div class="cpanel">
            <div class="icon-part">
            <i class="fa fa-users" aria-hidden="true"></i><br>
            <small>Users</small>
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
            @endif
             @if(Auth::user()->hasRole('department-head'))
                <!-- cards-->
            <div class="main-part">
            <div class="cpanel">
            <div class="icon-part">
            <i class="fa fa-users" aria-hidden="true"></i><br>
            <small>Users</small>
            <p>{{ $user }}</p>
            </div>
            <div class="card-content-part">
            <a href="{{ url ('userListHod')}}">More Details </a>
            </div>
            </div>
            <div class="cpanel cpanel-blue">
            <div class="icon-part">
            <i class="fa fa-tasks" aria-hidden="true"></i><br>
            <small>Applications</small>
            <p>{{ $app }}</p>
            </div>
            <div class="card-content-part">
            <a href="{{ url('applicationListHod')}}">More Details </a>
            </div>
            </div>
            
             @endif
             @if(Auth::user()->hasRole('user'))
             <link rel="stylesheet" href="css/userstyle.css">
                    <!-- cards-->
                    <div class="main-part">
            <div class="cpanel">
            <div class="icon-part">
            <i class="fa fa-list" aria-hidden="true"></i><br>
            <small>Leave Types</small>
            <p>{{$num}}</p>
            </div>
            <div class="card-content-part">
            <a  role = "button" onclick="document.getElementById('id01').style.display='block'">More Details </a>
            </div>
            </div>
            <div class="cpanel cpanel-blue">
            <div class="icon-part">
            <i class="fa fa-tasks" aria-hidden="true"></i><br>
            <small>Applications</small>
            <p>{{ $app }}</p>
            </div>
            <div class="card-content-part" >
            <a  role = "button" onclick="document.getElementById('id011').style.display='block'">More Details </a>
            </div>
            </div>
            </div>
    <!-- end of cards-->
    <div style ="margin: 5%;">
    <canvas id="myChart"></canvas>
            </div>
        </div>
        
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
  <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <div class="container" style ="width:100%;">
             <h1>List of Leave types</h1>
                <table class="table table-hover table-striped">
                <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Leave Name</th>
                <th scope="col">Duration(in Days)</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($leaves as $item)
                <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->numOfDays}}</td>
                </tr>
            @endforeach
                </tbody>
            </table>
           
  </form>
</div>
</div>
<div id="id011" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
  <div class="imgcontainer">
      <span onclick="document.getElementById('id011').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <div class="container" style ="width:100%;">
                <h1>List of your leave applications</h1>
                <table class="table table-hover table-striped">
                <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Department</th>
                <th scope="col">Leave Type</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Comment</th>
                <th scope="col">Status</th>
                <th scope="col">Status Reason</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($list as $item)
                <tr>
                <th scope="row">{{$j++}}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->surname }}</td>           
                <td>{{ $item->email }}</td>
                <td>{{ $item->department }}</td>
                <td>{{ $item->leavetype }}</td>
                <td>{{ $item->startDate }}</td>
                <td>{{ $item->endDate }}</td>
                <td>{{ $item->comments }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->Rejected }}</td>
                </tr>
            @endforeach
                </tbody>
            </table>
           
  </form>
</div>
</div>
             @endif

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
<script>
// Get the modal
var modal = document.getElementById('id011');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};
</script>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};
</script>
@stop