<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\EmployeeMaster;
use App\Models\SubsctiptionPlan;
use Datatables;

class RequisitionController extends Controller {
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        if ($request->ajax()) {
            // select('*')->
            $data = EmployeeMaster::get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="#add-permission" class="item padding-left-custom" title="Add Permission">
                        <i class="fas fa-plus" style="padding: 0 4px;"></i>
                    </a>
                    <a href="#edit-employee" class="item padding-left-custom" title="Edit User">
                        <i class="fas fa-user-edit" style="padding: 0 4px;"></i>
                    </a>
                    <a href="#more-details-employee" class="item padding-left-custom delete-student" title="Delete User" onclick="return confirm(\'Are you sure to remove this employee ?\')">
                        <i class="fas fa-eye" style="padding: 0 4px;"></i>
                    </a>
                    <a href="#delete-employee" class="item padding-left-custom delete-student" title="Delete User" onclick="return confirm(\'Are you sure to remove this employee ?\')">
                        <i class="fas fa-trash-alt" style="color: red;"></i>
                    </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.employees.employees-list');
    }

    /**
     * Show the form for creating a new resource.
     * Open add employee form view
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.employee-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/
    public function store(Request $request)
    {   
        // dump($request->all());
        // ---- Validation ---
        // $validated = $request->validate([
        //     'name' => 'required|string',
        //     'designation' => 'required',
        //     'employee_id' => 'required|unique:employee_masters,employee_id',
        //     'phone_no' => 'required|number|min:1',
        //     'alt_phone_no' => 'number',
        //     'doj' => 'required|date',
        //     'dob' => 'required|date',
        //     'personal_email_id' => 'required|unique:employee_masters,personal_email',
        //     'oficial_email_id' => 'required|unique:employee_masters,official_email',
        //     'present_address' => 'required',
        //     'permanent_address' => 'required',
        //     'marital_status' => 'required',
        //     'ctc' => 'required',
        //     'grass_salary' => 'required',
        //     'image' => 'required'
        //     // 'image.*' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // dd($validated);

        // If image available then run this block
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $file_name = $request->employee_id.'_'.time().'.'.$image->extension();      
        //     $path = $image->storeAs('employee_images', $file_name, 'public');
        // } else {
        //     $file_name = '';
        // }

        // $employee = EmployeeMaster::create([
        //     'name' => $request->name,
        //     'image' => $file_name,
        //     'designation' => $request->designation,
        //     'employee_id' => $request->employee_id,
        //     'joining_date' => date('Y-m-d', strtotime($request->doj)),
        //     'date_of_birth' => date('Y-m-d', strtotime($request->dob)),
        //     'phone_no' => $request->phone_no,
        //     'alternative_no' => $request->alt_phone_no,
        //     'personal_email' => $request->personal_email_id,
        //     'official_email' => $request->oficial_email_id,
        //     'present_address' => $request->present_address,
        //     'permanent_address' => $request->permanent_address,
        //     'name_of_guardian' => $request->name_of_guardian,
        //     'emergency_phone_no' => $request->emergency_contact_number,
        //     'father_name' => $request->father_name,
        //     'mother_name' => $request->mother_name,
        //     // 'gender' => $request->grass_salary,
        //     'marital_status' => $request->marital_status,
        //     'pan_number' => $request->pan_number,
        //     'aadhaar_number' => $request->aadhaar_number,
        //     'pf_number' => $request->pf_number,
        //     'uan_number' => $request->uan_number,
        //     'esic_number' => $request->esic_number,
        //     'gross_salery' => $request->grass_salary
        // ]);

        // if($employee) {
        //     $user = User::create([
        //         'name' => $request->name,
        //         'email' => $request->oficial_email_id,
        //         'password' => Hash::make('password'),
        //         'employee_id' => $employee->id
        //     ]);

        // }

        $user = User::where('id',10)->first();
        // event(new \App\Events\EmployeeRegistration($user));
        EmployeeRegistration::dispatch($user);
        // Send Notification also this user.
        // return redirect()->back()->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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