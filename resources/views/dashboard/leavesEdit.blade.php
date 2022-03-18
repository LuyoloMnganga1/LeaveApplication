<html>
<title>Edit Leave</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
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
     margin-top: -10%;
     margin-right: 15%;
 }
</style>
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
        <h2>Leave</h2>
        <p>Please fill this form to edit leave.</p>
        <form  method="post" action="{{ route('leavesUpdate', $leaves->id) }}">
              @csrf
            {{ method_field('GET') }}
            <div class="form-group" id ="TextSize">
                <label>Leave Name</label>
                <input type="text" name="name" class="form-control" value="{{ $leaves->name}}"  required>
            </div>    
            <div class="form-group" id ="Textp">
                <label>Duration</label>
                <input type="number" name="numOfDays" min="1" class="form-control" value="{{ $leaves->numOfDays}}"  required>
            </div>  
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">

            </div>
        </form>
    </div>    
    </body>
</html>