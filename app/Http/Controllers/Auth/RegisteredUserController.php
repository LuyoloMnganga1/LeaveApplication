<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\leavesPerUser;
use App\Models\Department;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use App\Mail\UserAccount;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $dep= Department::all();
        return view('auth.register')->with('dep',$dep);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'department' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if ($validator->fails()) {
            return redirect('RegisterForm')
                        ->withErrors($validator)
                        ->withInput();
        } 

       

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'email' => $request->email,
            'department' => $request->department,
            'role' => $request->role_id,  
            'password' => Hash::make($request->password),
        ]);
        
        leavesPerUser::create([
            'name' => $request->name ,
            'surname'=> $request->surname, 
            'email' => $request->email, 
            'Annual' => '15', 
            'Vaccation' =>'10',
            'Sick' =>'5',
            'Study' =>'7',
            'Family' =>'4',
            'Maternity' =>'14',
            'TimeOfWithoutPay' =>'',
        ]);

        $data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role_id,
            'department' => $request->department,
        ];    

        $user->attachRole($request->role_id);
        Mail::to($_POST['email'])->send(new UserAccount($data));
        event(new Registered($user));
        
        if (Auth::user()->hasRole('admin')){
            return redirect('/userList')->with('success', 'New user captured successfully');
        }else if(Auth::user()->hasRole('department-head')) {
            return redirect('/userListHod')->with('success', 'New user captured successfully');
        }
    }
  
}
