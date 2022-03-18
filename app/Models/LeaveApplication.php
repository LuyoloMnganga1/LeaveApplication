<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    use HasFactory;
    protected $table ="applications";
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
        'department',
        'leavetype',
        'startDate',
        'endDate',
        'comments',
        'status',
        'Rejected'
    ];
}
