<?php

namespace App\Http\Requests\API\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'              => ['required' , 'string'],
            'designation'       => ['required'],
            'employee_id'       => ['required' , 'unique:employee_masters,employee_id'],
            
            'joining_date'      => ['required' , 'date'],
            'date_of_birth'     => ['required' , 'date'],
            'confirmation_date' => ['sometimes' , 'date'],
            
            'phone_no'          => ['required' , 'number','min:1'],
            'alt_phone_no'      => ['reruired', 'number', 'min:1'],

            'personal_email'    => ['required' , 'unique:employee_masters,personal_email'],
            'official_email'    => ['required' , 'unique:employee_masters,official_email'],

            'present_address'   => ['required'],
            'permanent_address' => ['required'],
            
            'skills'            => ['sometimes'],
            'name_of_guardian'  => ['sometimes'],
            'emergency_phone_no'=> ['sometimes'],
            'father_name'       => ['sometimes'],
            'mother_name'       => ['sometimes'],

            "gender"            => ['sometimes'],

            'marital_status'    => ['required'],
            'pan_number'        => ['sometimes'],
            'aadhaar_number'    => ['sometimes', 'numetic'],
            'pf_number'         => ['sometimes'],
            'uan_number'        => ['sometimes'],
            'esic_number'       => ['sometimes'],
            // 'ctc'               => ['required'],
            'grass_salary'      => ['required'],
            
            'resignation_date'  => ['sometimes'],
            'last_date'         => ['sometimes'],

            'image'             => ['sometimes']
        ];
    }
}
