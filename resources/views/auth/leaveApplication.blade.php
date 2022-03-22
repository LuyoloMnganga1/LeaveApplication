<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
    list-style: none;
    text-decoration: none;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
}

body{
    background: #f5f6fa;
}

.wrapper .sidebar{
    background: rgb(5, 68, 104);
    position: fixed;
    top: 0;
    left: 0;
    width: 225px;
    height: 100%;
    padding: 20px 0;
    transition: all 0.5s ease;
}
.wrapper .sidebar .profile{
    margin-bottom: 30px;
    text-align: center;
}

.wrapper .sidebar .profile img{
    display: block;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 0 auto;
}

.wrapper .sidebar .profile h3{
    color: #ffffff;
    margin: 10px 0 5px;
}

.wrapper .sidebar .profile p{
    color: rgb(206, 240, 253);
    font-size: 14px;
}
.wrapper .sidebar ul li a{
    display: block;
    padding: 13px 30px;
    border-bottom: 1px solid #10558d;
    color: rgb(241, 237, 237);
    font-size: 16px;
    position: relative;
}

.wrapper .sidebar ul li a .icon{
    color: #dee4ec;
    width: 30px;
    display: inline-block;
}

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
    color: #0c7db1;

    background:white;
    border-right: 2px solid rgb(5, 68, 104);
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
    color: #0c7db1;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
    display: block;
}
.wrapper .section{
    width: calc(100% - 225px);
    margin-left: 225px;
    transition: all 0.5s ease;
}

.wrapper .section .top_navbar{
    background: rgb(7, 105, 185);
    height: 50px;
    display: flex;
    align-items: center;
    padding: 0 30px;

}

.wrapper .section .top_navbar .hamburger a{
    font-size: 28px;
    color: #f4fbff;
}

.wrapper .section .top_navbar .hamburger a:hover{
    color: #a2ecff;
}

body.active .wrapper .sidebar{
    left: -225px;
}

body.active .wrapper .section{
    margin-left: 0;
    width: 100%;
}
#users {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
    
}
#users12 {
    margin:auto;
    width: 100%;
}
#mesg {
    margin:auto;
    width: 70%;
    padding: 10px;
}

#users td, #users th {
  border: 1px solid #ddd;
  padding: 7px;
}

#users tr:nth-child(even){background-color: #f2f2f2;}

#users tr:hover {background-color: #ddd;}

#users th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0C7DB1;
  color: white;
}
.pull-right{
    margin:auto;
    text-align: left;
    width: 100%;
}
.pull-right2 {
    float: right;
    margin-right: 20px;
}
.form{ 
    margin: 5%  20% ;
    border: 1px solid;
    padding: 10px;
    box-shadow: 5px 10px;
 }
 #TextSize{
     width: 40%;
 }
 #Textp{
     float: right;
     width: 40%;
     margin-top: -7.3%;
     margin-right: 15%;
 }
    </style>
</head>
<body>

   
     
            <div class="form">
            @if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
      <a href="#" class="close" id ="cl" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
        <h2>Leave Application</h2>
        <p>Please fill this form to apply for leave.</p>
        <form  method="post" action=" {{ route('leaveApply')}}">
              @csrf
            {{ method_field('GET') }}
            <div class="form-group" id="TextSize">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}"  disabled>
            </div>    
            <div class="form-group" id ="Textp">
                <label>Surname</label>
                <input type="text" name="surname" class="form-control" value="{{Auth::user()->surname}}" disabled>
            </div> 
            <div class="form-group" id="TextSize">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" disabled>
            </div> 
            <div class="form-group" id ="Textp">
                <label>Department</label>
                <input type="text" name="department" class="form-control" value="{{Auth::user()->department}}" disabled>
            </div>
            <div class="form-group" id="TextSize">
                <label>Leave Type</label>
                <select name ="leavetype"class="form-control" style="width:100%;" required autofucus>
            <option  value ="" selected disabled>None</option>
            @foreach ($leaves as $item)
                   <option value="{{ $item->name }}"> {{$item->name}}</option>
                    @endforeach
                    
        </select>
                 </div>
                 <fieldset>
            <legend>Duration</legend>
            <div class="form-group" id="TextSize">
                <label>start Date</label>
                <input type="date" name="startDate" id = "StartDate" class="form-control" required autofucus>
            </div> 
            <div class="form-group"  id ="Textp">
                <label>End Date</label>
                <input type="date" name="endDate" id = "EndDate" class="form-control" required autofucus>
            </div> 
            <legend></legend>
            </fieldset>
            <div class="form-group">
                <label>Comment</label>
                <textarea name="comments"  cols="30" rows="10" class="form-control" required autofucus></textarea>
            </div> 
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">

            </div>
        </form>
    </div>    

        </div>
        </div>

    </div>

    <script>
        $("#EndDate").change(function () {
    var startDate = document.getElementById("StartDate").value;
    var endDate = document.getElementById("EndDate").value;
   

    if ((Date.parse(startDate) > Date.parse(endDate))) {
        swal({
        title: "Dates!",
         text: "The end date must  be after the start date!",
         icon: "error",
        button: "Okay",
        });
        document.getElementById("EndDate").value = "";
    }
    
    var d1 = new Date(startDate),
        d2 = new Date(endDate), 
        isWeekend = false;

    while (d1 <= d2) {
        var day = d1.getDay();
        isWeekend = (day === 6) || (day === 0); 
        if(isWeekend){
            swal({
        title: "Dates!",
         text: "Did you notice that the duration  of your leave includes weekend!",
         icon: "warning",
        button: "Okay",
        });
        }
        d1.setDate(d1.getDate() + 1);
    }
});
    </script>
    <script>
    $("#EndDate").change(function () {
    var startDate = document.getElementById("StartDate").value;
    var endDate = document.getElementById("EndDate").value;
        var dy1 = new Date(startDate),
        dy2 = new Date(endDate);
        var Dateday = '';
        var  holidays = [];  
        var  holidayZ = [];
        holidayZ.push({!! json_encode($holiday) !!});
        var variable = holidayZ.toString();
        holidays = variable.split(',');
        while (dy1 <= dy2) {
            if ((dy1.getMonth() + 1) < 10){
             Dateday = ((dy1.getFullYear()) +'-'+'0'+(dy1.getMonth() + 1) +'-'+(dy1.getDate())).toString();
            }else {
             Dateday = ((dy1.getFullYear()) +'-'+(dy1.getMonth() + 1) +'-'+(dy1.getDate())).toString();
            }
            for(var i = 0 ; i< holidays.length; i++){
                if(holidays[i].includes(Dateday)){
                    swal({
                    title: "Holiday!",
                    text: "Did you notice that the duration  of your leave includes holidays!",
                    icon: "warning",
                    button: "Okay",
             });
                }
            }
         dy1.setDate(dy1.getDate() + 1);
     }

});
    </script>
<script>
    $("#StartDate").change(function(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today =  yyyy + '/' + mm + '/'+dd;
    var startDate = document.getElementById("StartDate").value;

     if ((Date.parse(startDate)) < Date.parse(today)){
        swal({
        title: "Dates!",
         text: "The start date must  on or after today's date!",
         icon: "error",
        button: "Okay",
        });
        document.getElementById("StartDate").value = "";
    }
    });
</script>

  <script>
 var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function(){
        document.querySelector("body").classList.toggle("active");
    })
  </script>
</body>
</html>