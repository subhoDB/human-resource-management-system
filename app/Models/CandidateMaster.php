<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateMaster extends Model
{
    use HasFactory;
    public $timestamps = true;
    
    protected $fillable = [
        'name',
        'phone_no',
        'email_id',
        'total_experience',
        'relevant_experience',
        'gender',
        'skills',
        'present_salary',
        'expected_salary',
        'notice_period',
        'comment',
        'created_by',
        'updated_by',
        'deleted_by',
        'candidate_status'
    ];
}