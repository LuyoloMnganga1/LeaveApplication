<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leavesPerUser extends Model
{
    use HasFactory;
    protected $table = 'leaves_per_user';
    
    protected $fillable = [
        'name',
        'surname', 
        'email', 
        'Annual', 
        'Vaccation',
        'Sick',
        'Study',
        'Family',
        'Maternity',
        'TimeOfWithoutPay',
    ];
}
