<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    /**
     * Get the employee that owns the attendance.
     */
    public function employee() 
    {
        return $this->belongsTo(EmployeeMaster::class, 'employee_id', 'id');
    }
}
