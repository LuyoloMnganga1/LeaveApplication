<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.header')
<style>
    /* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  
  /* Set a style for all buttons */
  button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }
  
  button:hover {
    opacity: 0.8;
  }
  
  /* Extra styles for the cancel button */
  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }
  
  /* Center the image and position the close button */
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
  }
  
  img.avatar {
    width: 40%;
    border-radius: 50%;
  }
  
  .container {
    padding: 16px;
  }
  
  span.psw {
    float: right;
    padding-top: 16px;
  }
  
  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
  }
  
  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
  }
  
  /* The Close Button (x) */
  .close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
  }
  
  .close:hover,
  .close:focus {
    color: red;
    cursor: pointer;
  }
  
  /* Add Zoom Animation */
  .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
  }
  
  @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
  }
    
  @keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
  }
  
  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
  }
</style>
</head>
<body>

    <div class="wrapper">
        <!--Top menu -->
        <div class="sidebar">
           <!--profile image & text-->
           <div class="profile">
           <a href="{{ url ('dashboard')}}"><img  src="{{ url('/images/logo.png') }}" /></a>
                <h3>{{ Auth::user()->name}} {{ Auth::user()->surname}} </h3>
                <p>{{ Auth::user()->department }} <br> {{ Auth::user()->role }} </p>
            </div>
            <!--menu item-->
            <ul>
               
                <li>
                    <a href="#" class="active nav-link">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">My Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('leave.create')}}"  class="nav-link">
                        <span class="icon"><i class="fas fa-plus"></i></span>
                        <span class="item">apply for leave</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('SignOut')}}"  class="nav-link">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="item">Log Out</span>
                    </a>
                </li>
              
            </ul>
        </div>
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
              <!-- alert message-->  
              @if ($message = Session::get('success'))
                <br></br>
                <div id="mesg">
                <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p>{{ $message }}</p>
                        </div>
                        </div>
                @endif
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
        </div>

    </div>
  <script>
 var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function(){
        document.querySelector("body").classList.toggle("active");
    })
  </script>  
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

</body>
</html>