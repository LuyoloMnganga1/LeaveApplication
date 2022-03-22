<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\holiday;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UpdateHolidays;

class HomeController extends Controller
{
   public function index(){

        $current = Carbon::now();
        $updated = holiday::where('id', 1)->value('updated_at');
        $updated_date = new Carbon($updated);
        $email = User::where('role','admin')->value('email');
        $name = User::where('email',$email)->value('name');
        $surname = User::where('email',$email)->value('surname');
        $year = $current->year;
        $tagertDate = Carbon::create($year, 1, 16, 8);
     
        if($current == $tagertDate){
            Mail::to($email)->send(new UpdateHolidays($name,$surname));
        }

       return  view('welcome');
   }
}
