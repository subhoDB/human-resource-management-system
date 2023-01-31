<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveDetails extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'application_id',
        'leave_type',
        'leave_applied_for',
        'leave_date',
        'leave_reason',
        'reporting_manager',
        'manager_approval',
        'approved_by',
        'approved_date',
        'approval_comment'
    ];
}
