<?php

namespace App\Http\Controllers;

use App\Models\LeaveApplication;
use App\Models\User;
use App\Models\leaves;
use App\Models\holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\leaveStatus;
use App\Mail\leaveApp;
use Illuminate\Support\Facades\Auth;

class LeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = LeaveApplication::all();
        $i = 1;
        return view('application')->with('applications',$applications)->with('i',$i);
    }
    public function indexHod()
    {
        $applications = LeaveApplication::where('department','LIKE',"%".Auth::user()->department."%")->get();
        $i = 1;
        return view('application')->with('applications',$applications)->with('i',$i);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaves = leaves::all();
        $holiday = holiday::pluck('date')->toArray();
        return view('auth.leaveApplication')->with('leaves',$leaves)->with('holiday',$holiday);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [ 'string', 'max:255'],
            'surname' => ['string', 'max:255'],
            'email' => [ 'string', 'email', 'max:255', 'unique:users'],
            'department' => [ 'string', 'max:255'],
            'leavetype' => ['required', 'string', 'max:255'],
            'startDate' => ['required', 'string', 'max:255'],
            'endDate' => ['required', 'string', 'max:255'],
            'comments' => ['required', 'string','max:1000'],
        ]);
        if ($validator->fails()) {
            return redirect('leaveForm')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data =  LeaveApplication::create([
            'name' =>Auth::user()->name,
            'surname' => Auth::user()->surname,
            'email' =>Auth::user()->email,
            'department' =>Auth::user()->department,
            'leavetype' => $request->leavetype,
            'startDate' => $request->startDate,
            'endDate' =>$request->endDate,
            'comments' => $request->comments,
            'status'=> 'Pending',
            'Rejected'=>  'N/A'

        ]);
        $user = [
            'name' => Auth::user()->name,
            'surname' =>Auth::user()->surname,
            'department' =>Auth::user()->department,
            'leavetype' => $request->leavetype,
            'startDate' => $request->startDate,
            'endDate' =>$request->endDate,
            'comments' => $request->comments,
        ];    
        $hod = User::where('department',Auth::user()->department)->where('role', 'department-head')->first();
        Mail::to($hod->email)->send(new leaveApp($user,$hod));
        if (Auth::user()->hasRole('user')){
            return redirect('/dashboard');
        }else  if (Auth::user()->hasRole('department-head')){
            return redirect('/applicationListHod')->with('success', 'New application captured successfully');
        }else{
        return redirect('/applicationList')->with('success', 'New application captured successfully');
        }
    }
    public function leaves(){
        $i =1;
        $leaves = leaves::all();
        return view('leaves')->with('leaves',$leaves)->with('i',$i);
    }
    public function leavesAdd(){
        return view('dashboard.leavesAdd');
    }
    public function leavesEdit($id){
        $leaves = leaves::find($id);
        return view('dashboard.leavesEdit')->with('leaves',$leaves);
    }
    public function leavesStore(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:leaves,name'],
            'numOfDays' => ['required', 'numeric', 'min:1', 'max:15' ]
        ]);
        if ($validator->fails()) {
            return redirect('leavesAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        $validated = $validator->validated();
        leaves::create($validated);
        return redirect()->route('leaves')->with('success', 'Leave type is successfully created');
    }
    public function leavesUpdate(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:leaves,name,'.$id],
            'numOfDays' => ['required', 'numeric', 'min:1', 'max:15' ]
        ]);
        if ($validator->fails()) {
            return redirect('leavesEdit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }
        $validated = $validator->validated();
        leaves::whereId($id)->update($validated);
        return redirect()->route('leaves')->with('success', 'Leave type is successfully updated');
    }
    public function holiday(){
        $i =1;
        $holiday = holiday::all();
        return view('holiday')->with('holiday',$holiday)->with('i',$i);
    }
    public function holidayAdd(){
        return view('dashboard.holidayAdd');
    }
    public function holidayEdit($id){
        $holiday = holiday::find($id);
        return view('dashboard.holidayEdit')->with('holiday',$holiday);
    }
    public function holidayStore(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:holiday,name'],
            'date' => ['required', 'string','max:255' ]
        ]);
        if ($validator->fails()) {
            return redirect('holidayAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        $validated = $validator->validated();
        holiday::create([
            'name' =>$request->name,
            'date' =>$request->date,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('holiday')->with('success', 'holiday is successfully created');
    }
    public function holidayUpdate(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:holiday,name,'.$id],
            'date' => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return redirect('holidayEdit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }
        $validated = $validator->validated();
        holiday::whereId($id)->update([
            'name' =>$request->name,
            'date' =>$request->date,
            'updated_at' => now(),
        ]);
        return redirect()->route('holiday')->with('success', 'holiday is successfully updated');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = LeaveApplication::find($id);
      return view('auth.leaveShow')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = LeaveApplication::find($id);
      return view('auth.leaveUpdate')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('auth.leaveUpdate')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $reason = "";
        if(($request->Rejected)=== null){
            $reason = 'None';
        }else{
            $reason =  $request->Rejected;
        }
        $data = [
            'name'=> $request->name,
            'surname'=> $request->surname,
            'email'=> $request->email,
            'status'=>$request->status,
            'Rejected' => $reason,
        ];
        Mail::to($email)->send(new leaveStatus($data));
        LeaveApplication::whereId($id)->update($data);
        if (Auth::user()->hasRole('department-head')){
            return redirect('/applicationListHod')->with('success', 'Application status is successfully updated');
        }else{
            return redirect()->route('applicationList')->with('success', 'Application status is successfully updated');
        }
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LeaveApplication::destroy($id);
        return redirect()->route('applicationList')->with('success', 'Application Data is successfully deleted');
    }
    public function leavesdestroy($id){
        leaves::destroy($id);
        return redirect()->route('leaves')->with('success', 'Leave type successfully deleted');
    }
    public function holidaydestroy($id){
        holiday::destroy($id);
        return redirect()->route('holiday')->with('success', 'Holiday successfully deleted');
    }
}
