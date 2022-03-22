@extends('layouts.main')
@section('content')
<br></br>
         
                <!-- Buttons-->
                
               
                <div >
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="pull-right"> Holiday List</h2>
            </div>
            <div class="pull-right2">
                <a href="{{ url('holidayAdd')}}" class = "btn btn-success" ><i class="fa fa-plus"></i></a>  
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
            <th>Leave Name</th>
            <th>Date</th>
            <th >Action</th>
        </tr>
        @foreach ($holiday as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->date }}</td>
            <td>
                <form action="{{ url('holidaydestroy', $item->id) }}" method="POST">
   
    
                    <a class="btn bg-transparent btn-outline-info" href="{{ route('holidayEdit',$item->id) }}"> <i class="fa fa-pen"></i></a>
                    @csrf
                    {{ method_field('GET') }}
                
                    <button type="submit" name="archive" onclick="archiveFunction()" class="btn bg-transparent btn-outline-danger"><i class="fa fa-trash"></i></button>
               </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    <!-- end of cards-->
        </div>
        </div>

    </div>
    
<script>
   function archiveFunction() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you sure?",
  text: "Do you want to delete the holiday.",
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
    swal("Cancelled", "Holiday infromation is safe", "error");
  }
});
}
</script>
@stop