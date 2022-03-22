@extends('layouts.main')
@section('content')
<br></br>
         

                <!-- Buttons-->
                <br></br>
                <div >
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="pull-right"> Leave Application Records Table</h2>
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
            <th>Email</th>
            <th>Department</th>
            <th>Leave Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Status Reason</th>
            <th >Action</th>
        </tr>
        @foreach ($applications as $item)
        <tr>
            <td>{{ $i++ }}</td>
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
            <td>
                <form action="{{ url('deleteApplication', $item->id) }}" method="POST">
   
                    <a class="btn bg-transparent btn-outline-primary" href="{{ route('leave.show',$item->id) }}"><i class="fa fa-eye"></i> </a>
    
                    <a class="btn bg-transparent btn-outline-info" id = "edit" href="{{ route('leave.edit',$item->id) }}"><i class="fa fa-pen"></i> </a>
                    @csrf
                    {{ method_field('GET') }}
                
                    <button type="submit" name="archive" onclick="archiveFunction()" class="btn bg-transparent btn-outline-danger"> <i class="fa fa-trash"></i> </button>
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
  text: "Do you want to delete the application.",
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
    swal("Cancelled", "Application infromation is safe", "error");
  }
});
}
</script>
@stop