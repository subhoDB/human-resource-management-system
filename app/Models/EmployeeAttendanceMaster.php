<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendanceMaster extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'attendance_date',
        'is_ellc',
        'leave_type',
        'day_avalibulity',
        'assigned_tasks',
        'closed_tasks',
        'total_time_logged',
        'entry_time',
        'exit_time',
        'late_counts',
        'total_office_time'
    ];
}
