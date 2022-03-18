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
                    <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item1">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">My Dashboard</span><i class="bi small bi-caret-down-fill"></i>
                    </a>
                    <ul id="menu_item1" class="submenu collapse" data-bs-parent="#nav_accordion">
                    <li>
                    <a href="{{ url('department')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-building"></i></span>
                        <span class="item">Departments</span>
                    </a>
                    </li>
                    <li>
                    <a href="{{url('leaves')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-bed"></i></span>
                        <span class="item">List of Leaves</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('holiday')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-plane"></i></span>
                        <span class="item">List of Holidays</span>
                    </a>
                </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item2" >
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="item">People</span><i class="bi small bi-caret-down-fill"></i>
                    </a>
                    <ul id="menu_item2" class="submenu collapse" data-bs-parent="#nav_accordion">
                    <li>
                    <a href="{{ url ('userList')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">List of People</span>
                    </a>
                    </li>
                    <li>
                    <a href="{{route('auth.create')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-user-plus"></i></span>
                        <span class="item">Add People</span>
                    </a>
                </li>
                    </ul>
                </li>
            
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item3">
                        <span class="icon"><i class="fas fa-list"></i></span>
                        <span class="item">Application</span><i class="bi small bi-caret-down-fill"></i>
                    </a>
                    <ul id="menu_item3" class="submenu collapse" data-bs-parent="#nav_accordion">
                    <li>
                    <a href="{{ url('applicationList')}}" class="nav-link">
                        <span class="icon"><i class="fas fa-list-alt"></i></span>
                        <span class="item">Application List</span>
                    </a>
                    </li>
                    <li>
                    <a href="{{ route('leave.create')}}"class="nav-link">
                        <span class="icon"><i class="fas fa-plus"></i></span>
                        <span class="item">apply for leave</span>
                    </a>
                </li>
                    </ul>
                    
                </li>
                <li>
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
</html>