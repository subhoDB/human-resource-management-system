<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveMaster extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'privilege_leave',
        'casual_leave',
        'sick_leave',
        'comp_off'
    ];
}
