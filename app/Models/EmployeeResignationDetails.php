<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeResignationDetails extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'resignation_status',
        'resignation_date',
        'last_working_date',
        'notice_period',
        'notice_exact_days',
        'resignation_mail',
        'is_approved',
        'updated_by'
    ];

}
