<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Events\EmployeeRegistration;
use App\Http\Requests\API\Employee\StoreEmployeeRequest;
use App\Models\EmployeeMaster;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class EmployeeController extends Controller
{   

    // private $employeeRepositery;
    // private $userRepository;

    // public function __construct(EmployeeRepositoryInterface $employeeRepositery, UserRepositoryInterface $userRepository) {
    //     $this->employeeRepositery = $employeeRepositery;
    //     $this->userRepository = $userRepository;
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $data = [];
        $data = $this->employeeRepositery->all();
        return response()->json(['msg' => 'Employees list', 'data' => (object) $data, 'error' => false],200);
    }

    /**
     * Store a newly created employees in storage.
     *
     * @param  \App\Http\Requests\API\Employee\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     **/
    public function store(StoreEmployeeRequest $request)
    {   
        return 'fdsfs';
        dd($request->validated());

        // If image available then run this block
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = $request->employee_id.'_'.time().'.'.$image->extension();      
            $path = $image->storeAs('employee_images', $file_name, 'public');
        } else {
            $file_name = '';
        }

        $data = [
            'name' => $request->name,
            'image' => $file_name,
            'designation' => $request->designation,
            'employee_id' => $request->employee_id,
            'joining_date' => date('Y-m-d', strtotime($request->doj)),
            'date_of_birth' => date('Y-m-d', strtotime($request->dob)),
            'phone_no' => $request->phone_no,
            'alternative_no' => $request->alt_phone_no,
            'personal_email' => $request->personal_email_id,
            'official_email' => $request->oficial_email_id,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'name_of_guardian' => $request->name_of_guardian,
            'emergency_phone_no' => $request->emergency_contact_number,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            // 'gender' => $request->grass_salary,
            'marital_status' => $request->marital_status,
            'pan_number' => $request->pan_number,
            'aadhaar_number' => $request->aadhaar_number,
            'pf_number' => $request->pf_number,
            'uan_number' => $request->uan_number,
            'esic_number' => $request->esic_number,
            'gross_salery' => $request->grass_salary
        ];

        $employee = $this->employeeRepositery->create($data);

        if($employee['error'] == false) 
        {
            $user = $this->userRepository->create($employee['data']);
        }

        EmployeeRegistration::dispatch($user);
        // Send Notification also this user.
        return response()->json(['msg' => 'Employee added successfully!', 'data' => (object) $data, 'error' => false],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeMaster $employee)
    {
        dd($employee);
        return view('admin.employees.employee-add');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
