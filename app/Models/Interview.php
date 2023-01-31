<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    /**
     * Create relation with pivot table employees_intervires
     * @author Subhodeep Bharracharjee <subhodeep307047@gmail.com>
     * @return App/Model/EmployeeMaster::class 
     */
    public function employees() 
    {
        return $this->belongsToMany(EmployeeMaster::class, 'employees_interviews', 'employee_id', 'interview_id');
    }
}
