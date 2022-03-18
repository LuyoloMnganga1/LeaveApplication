<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\leaves;
use App\Models\Department;
use App\Models\holiday;
use App\Models\LeaveApplication;
use App\Mail\RoleStatus;
use App\Jobs\sendMailYearly;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
Use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')){

            $record = LeaveApplication::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"), \DB::raw("MONTH(created_at) as month"))
            ->groupBy('month_name','month')
            ->orderBy('month')
            ->get();
  
            $data = [];
        
            foreach($record as $row) {
                $data['label'][] = $row->month_name;
                $data['data'][] = (int) $row->count;
            }
        
            $data['chart_data'] = json_encode($data);
            $user = User::all()->count();
            $app = LeaveApplication::all()->count();
            $dep = Department::all()->count();
            $leaves = leaves::all()->count();
            $holiday = holiday::all()->count();
            return view('admindashboard',$data)->with('holiday',$holiday)->with('user',$user)->with('app',$app)->with('leaves',$leaves)->with('dep',$dep);
        } else  if (Auth::user()->hasRole('department-head')){
            $user = User::where('department',Auth::user()->department)->count();
            $app = LeaveApplication::where('department',Auth::user()->department)->count();
            $record = LeaveApplication::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"), \DB::raw("MONTH(created_at) as month"))
            ->where('department',Auth::user()->department)
            ->groupBy('month_name','month')
            ->orderBy('month')
            ->get();
  
            $data = [];
        
            foreach($record as $row) {
                $data['label'][] = $row->month_name;
                $data['data'][] = (int) $row->count;
            }
        
            $data['chart_data'] = json_encode($data);
            return view('departmentheaddashboard',$data)->with('user',$user)->with('app',$app);
        }else if (Auth::user()->hasRole('user')){

            $record = LeaveApplication::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"), \DB::raw("MONTH(created_at) as month"))
            ->where('email',Auth::user()->email)
            ->groupBy('month_name','month')
            ->orderBy('month')
            ->get();
  
            $data = [];
        
            foreach($record as $row) {
                $data['label'][] = $row->month_name;
                $data['data'][] = (int) $row->count;
            }
        
            $data['chart_data'] = json_encode($data);
            $num = leaves::all()->count();
            $leaves = leaves::all();
            $app = LeaveApplication::where('email',Auth::user()->email)->count();
            $list = LeaveApplication::where('email',Auth::user()->email)->get();
            $i = 1;
            $j = 1;
            return view('userdashboard',$data)->with('leaves',$leaves)->with('num',$num)->with('list',$list)->with('app',$app)->with('i',$i)->with('j',$j);
        } 


    }
    public function userList()
    {
        $data = User::all();
        $i = 1;
        return view('users')->with('data',$data)->with('i',$i);;
    }
    public function userListHod(){
        $data = User::where('department','LIKE',"%".Auth::user()->department."%")->get();
        $i=1;
        return view('usersHod')->with('data',$data)->with('i',$i);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function  department()
    {
        $i =1;
        $dep = Department::all();
        return view('department')->with('dep',$dep)->with('i',$i);
    }
    public function  departmentAdd()
    {
    
        return view('auth.departmentForm');
    }
    public function  departmentStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:department,name'],
        ]);
        if ($validator->fails()) {
            return redirect('departmentAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $validator->validated();
        Department::create($data);
        $dep = Department::all();
        $i=1;
        return view('department')->with('success','Department suceessfully add')->with('dep',$dep)->with('i',$i);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= User::findOrFail($id);
        return view('auth.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= User::findOrFail($id);
        return view('auth.edit')->with('data', $data);
    }

    public function editDepartment($id){
        $dep = Department::findOrFail($id);
        return view('dashboard.editDepartment')->with('dep',$dep);
    }

    public function updateDepartment(Request $request, $id,$name){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:department,name,'.$id]
        ]);
        if ($validator->fails()) {
            return redirect('editDepartment/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $validator->validated();
        Department::whereId($id)->update($data);
        return redirect()->route('department')->with('success', 'Department Data is successfully updated');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10'],
            'email' => ['required', 'max:255', 'unique:users,email,'.$id],
            'department' => ['required', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('userEdit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $validator->validated();
        $user = User::find($id);
        $b = $user->role; 
        $user->detachRole($b); 
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->department = $data['department'];
        $user->role = $data['role'];
        $user->save();        
        $user->attachRole($user->role);
        Mail::to($user['email'])->send(new RoleStatus($user));    
        return redirect()->route('userList')->with('success', 'User Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('userList')->with('success', 'User Data is successfully deleted');
    }
    public function departmentdestroy($id)
    {
            Department::destroy($id);
        return redirect()->route('department')->with('success', 'Department is successfully deleted');
    }
    public function sendEmail(Request $request){
        $data = User::where('role', 'admin')->get();
        foreach($data as $admin){
            $email = $admin->email;
            sendMailYearly::dispatch($admin,$email);
        }
        return redirect()->with('success');
    }
}
