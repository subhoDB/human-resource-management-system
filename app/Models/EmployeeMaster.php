<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeMaster extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $fillable = [
        'name',
        'image',
        'designation',
        'employee_id',
        'joining_date',
        'date_of_birth',
        'confirmation_date',
        'phone_no',
        'alternative_no',
        'personal_email',
        'official_email',
        'present_address',
        'skills',
        'permanent_address',
        'name_of_guardian',
        'emergency_phone_no',
        'father_name',
        'mother_name',
        'gender',
        'marital_status',
        'pan_number',
        'aadhaar_number',
        'pf_number',
        'uan_number',
        'esic_number',
        'gross_salery',
        'status',
        'resignation_date',
        'last_date'
    ];

    /**
     * Set `name` column ot attribute customization
     * 
     * @param string name column in database
     * @return string
     * @todo database name column should be show first word upper case and other lower
     * @example SUBHODEEP BHATTACHARJEE is name then convert this to Subhodeep Bhattacharjee before insert data in database
     */
    public function setNameAttribute($value)
    {
        $name = strtolower($value);
        $this->attributes['name'] = ucwords($name);
    }

    /**
     * Get the user's name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        $name = strtolower($value);
        return ucwords($name);
    }

    /**
     * Set `name_of_guardian` column ot attribute customization
     * 
     * @param string name_of_guardian column in database
     * @return string
     * @todo database name_of_guardian column should be show first word upper case and other lower
     * @example SUBHODEEP BHATTACHARJEE is name_of_guardian then convert this to Subhodeep Bhattacharjee before insert data in database
     */
    public function setNameOfGuardianAttribute($value)
    {
        $name = strtolower($value);
        $this->attributes['name_of_guardian'] = ucwords($name);
    }

    /**
     * Set `father_name` column ot attribute customization
     * 
     * @param string father_name column in database
     * @return string
     * @todo database father_name column should be show first word upper case and other lower
     * @example SUBHODEEP BHATTACHARJEE is father_name then convert this to Subhodeep Bhattacharjee before insert data in database
     */
    public function setFatherNameAttribute($value)
    {
        $name = strtolower($value);
        $this->attributes['father_name'] = ucwords($name);
    }

    /**
     * Set `mother_name` column ot attribute customization
     * 
     * @param string mother_name column in database
     * @return string
     * @todo database mother_name column should be show first word upper case and other lower
     * @example SUBHODEEP BHATTACHARJEE is mother_name then convert this to Subhodeep Bhattacharjee before insert data in database
     */
    public function setMotherNameAttribute($value)
    {
        $name = strtolower($value);
        $this->attributes['mother_name'] = ucwords($name);
    }

    /**
     * Set `personal_email` column ot attribute customization
     * 
     * @param string personal_email column in database
     * @return string
     * @todo database name column should be show small letter
     * @example SUBHODEEP@XXX.COM is name then convert this to subhodeep@xxx.com before insert data in database
     */
    public function setPersonalEmailAttribute($value)
    {
        $this->attributes['personal_email'] = strtolower($value);
    }

    /**
     * Set `official_email` column ot attribute customization
     * 
     * @param string official_email column in database
     * @return string
     * @todo database name column should be show small letter
     * @example SUBHODEEP@XXX.COM is name then convert this to subhodeep@xxx.com before insert data in database
     */
    public function setOfficialEmailAttribute($value)
    {
        $this->attributes['official_email'] = strtolower($value);
    }
    
    /**
     * @todo Define all relations EmployeeMaster model to all
     */
    public function user() 
    {
        return $this->hasOne(User::class,'id','employee_id');
    }

    public function enployee_resignation() 
    {
        return $this->hasOne(EmployeeResignationDetails::class,'id','employee_id');
    }

    public function employee_attendance() 
    {
        return $this->hasMany(EmployeeAttendanceMaster::class,'id','employee_id');
    }

    public function employee_leaves() 
    {
        return $this->hasOne(EmployeeLeaveMaster::class,'id','employee_id');
    }
    
    public function leave_details() 
    {
        return $this->hasMany(EmployeeLeaveDetails::class,'id','employee_id');
    }

    public function employee_designation() {
        
    }
}