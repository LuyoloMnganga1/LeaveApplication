<!doctype html>

<html>

<head>

@include('layouts.header')

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
            <li class="nav-item">
                    <a href="{{ url ('dashboard')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">My Dashboard</span>
                    </a>
                </li>
               @if(Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <a href="{{ route('department')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-building"></i></span>
                        <span class="item">Departments</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{url('leaves')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-bed"></i></span>
                        <span class="item">Leaves</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('holiday')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-plane"></i></span>
                        <span class="item">Holidays</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route ('userList')}}" class="nav-link" >
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="item">Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('auth.create')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-user-plus"></i></span>
                        <span class="item">Add User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('applicationList')}}" class="nav-link" >
                        <span class="icon"><i class="fas fa-list"></i></span>
                        <span class="item">Applications</span>
                    </a>                   
                </li>
              
                @endif
               @if(Auth::user()->hasRole('department-head'))
                <li class="nav-item">
                   <a href="{{ url ('userListHod')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-user-alt"></i></span>
                        <span class="item">Users</span>
                    </a>
                </li>
                <li class="nav-item"> 
                   <a href="{{ url('applicationListHod')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-list"></i></span>
                        <span class="item">Applications</span>
                    </a>
                </li>
                
               @endif
               <li class="nav-item">
                    <a href="{{ route('leave.create')}}"class="nav-link">
                        <span class="icon"><i class="fas fa-plus"></i></span>
                        <span class="item">apply for leave</span>
                    </a>
                </li>
                <li class="nav-item log_out">
                    <a href="{{ url('SignOut')}}" class="nav-link">
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
                        <h1>LEAVE APPLICATION SYSTEM</h1>
                    </a>
                </div>
                
            </div>
                   <div> 
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

            @yield('content')
</div>
</body>
<script>
 var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function(){
        document.querySelector("body").classList.toggle("active");
    })
  </script>
 <script>
  $('.wrapper .sidebar ul li a').on('click', function() {
  $('.wrapper .sidebar ul li a').addClass('.wrapper .sidebar ul li a.active');

});
 </script>
 <script>
      jQuery(function($) {
     var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
     $('.wrapper .sidebar ul li a').each(function() {
      if (this.href === path) {
       $(this).addClass('active');
      }
     });
    });
 </script>
</html>