@extends('layouts.main')
@section('content')
<br></br>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">People ></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">List of Users<span class="sr-only">(current)</span></a>
             
                </ul>
            </div>
            </nav>
                <!-- Buttons-->
                <br></br>
                <div >
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="pull-right"> User Records Table</h2>
            </div>
        
        </div>
    </div>
    <br></br>
            <!-- users table-->
            <br>
   <div id="users12">
    <table id="users">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Department</th>
            <th>Role</th>
            <th >Action</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->surname }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->department }}</td>
            <td><button type="button" class="btn btn-outline-warning">{{ $item->role }}</button></td>
            <td>
                <form action="{{ url('destroy', $item->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('users.show',$item->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('users.edit',$item->id) }}">Edit</a>
                    @csrf
                    {{ method_field('GET') }}
                
                    <button type="submit" name="archive" onclick="archiveFunction()" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>

        </div>
        </div>

    </div>

 
<script>
   function archiveFunction() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you sure?",
  text: "Do you want to delete the user.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes",
  cancelButtonText: "No",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    form.submit();          // submitting the form when user press yes
  } else {
    swal("Cancelled", "User infromation is safe", "error");
  }
});
}
</script>
@stop