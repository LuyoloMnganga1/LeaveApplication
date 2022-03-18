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
        <h2>Leave Application</h2>
        <p>Please fill this form to update leave status.</p>
        <form  method="post" action="{{ url ('leaveStatus', ['id'=>$data->id, 'name'=>$data->name, 'surname'=>$data->surname, 'email'=>$data->email]) }}">
              @csrf
            {{ method_field('GET') }}
            <div class="form-group" id="TextSize">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $data->name}}" disabled>
            </div>    
            <div class="form-group" id="Textp">
                <label>Surname</label>
                <input type="text" name="surname" class="form-control" value="{{ $data->surname}}" disabled>
            </div> 
            <div class="form-group" id="TextSize">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ $data->email}}" disabled>
            </div> 
            <div class="form-group"  id="Textp" > 
                <label>Department</label>
                <input type="text" name="department" class="form-control" value="{{ $data->department}}" disabled>
            </div>
            <div class="form-group" id="TextSize">
                <label>Leave Type</label>
                <input type="text" name ="leavetype"class="form-control" value="{{ $data->leavetype}}" disabled>
                 </div>
                 <fieldset>
                <legend>Duration</legend>
            <div class="form-group" id="TextSize">
                <label>start Date</label>
                <input type="datetime-local" name="startDate" value = "{{ $data->startDate}}" class="form-control" disabled>
            </div> 
            <div class="form-group" id="Textp">
                <label>End Date</label>
                <input type="datetime-local" name="endDate" value="{{ $data->endDate}}" class="form-control" disabled>
            </div> 
            <legend></legend>
            </fieldset>
            <div class="form-group">
                <label>Comment</label>
                <textarea name="comments"  cols="30" rows="10"  value = "{{ $data->comments}}"class="form-control" disabled></textarea>
            </div> 
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control"  onchange="if (this.value=='Rejected'){$('#Rejected').show();this.form['Rejected'].style.visibility='visible';}else {this.form['Rejected'].style.visibility='hidden'}" required>
                    <option value="">None</option>
                    <option value="Aproved">Aproved</option>
                    <option value="Rejected">Rejected</option>
                </select>
                <div class="form-group" name ="Rejected" style="visibility:hidden;" >
                <label  id= "Rejected" >Reason</label>
                <input type="text" placeHolder="State the reason of rejecting" pattern="[A-Za-z\s]+" name ="Rejected" class="form-control" >
                 </div> 
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>    
    </body>
</html>