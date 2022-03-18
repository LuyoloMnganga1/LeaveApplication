<html>
<title>View leave application</title>
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
        <h2>Leave Application</h2>
        <p>Please fill this form to apply for leave.</p>
        <form  method="post" action="{{ url ('applicationList')}}">
              @csrf
            {{ method_field('GET') }}
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $data->name}}" disabled>
            </div>    
            <div class="form-group">
                <label>Surname</label>
                <input type="text" name="surname" class="form-control" value="{{ $data->surname}}" disabled>
            </div> 
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ $data->email}}" disabled>
            </div> 
            <div class="form-group">
                <label>Department</label>
                <input type="text" name="department" class="form-control" value="{{ $data->department}}" disabled>
            </div>
            <div class="form-group">
                <label>Leave Type</label>
                <input type="text" name ="leavetype"class="form-control" value="{{ $data->leavetype}}" disabled>
                 </div>

            <div class="form-group">
                <label>start Date</label>
                <input type="datetime-local" name="startDate" value = "{{ $data->startDate}}" class="form-control" disabled>
            </div> 
            <div class="form-group">
                <label>End Date</label>
                <input type="datetime-local" name="endDate" value="{{ $data->endDate}}" class="form-control" disabled>
            </div> 
            <div class="form-group">
                <label>Comment</label>
                <textarea name="comments"  cols="30" rows="10"  value = "{{ $data->comments}}"class="form-control"></textarea>
            </div> 
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Back">

            </div>
        </form>
    </div>    
    </body>
</html>