<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillsMaster extends Model
{
    use HasFactory;

    /**
     * Get all of the employees that are assigned this skill.
     */
    public function employees()
    {
        return $this->morphedByMany(EmployeeMaster::class, 'skillable');
    }

}
