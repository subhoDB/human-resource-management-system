<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    EmployeeMaster,
    DesignationMaster,
    User,
    Role,
    Permission,
    SubsctiptionPlan
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DesignationMaster::insert([
            ['designation_name'=>'Super Admin','designation_slug' => 'super-admin'],
            ['designation_name'=>'Deaigner','designation_slug' => 'designer'],
            ['designation_name'=>'Software Engineer','designation_slug' => 'software-engineer'],
        ]);

        EmployeeMaster::insert([
            ['name'=>'Super Admin','designation' => 1, 'employee_id' => 'MMT-01', 'joining_date' => date("Y-m-d"), 'personal_email'=>'superadmin@yopmail.com','official_email'=>'superadmin@mmt.com'],
            ['name'=>'Subhodeep Yopmail','designation' => 3, 'employee_id' => 'MMT-02', 'joining_date' => date("Y-m-d"), 'personal_email'=>'subhodeep5@yopmail.com','official_email'=>'subhodeep5@mmt.com'],
            ['name'=>'Subhodeep Gmail','designation' => 3, 'employee_id' => 'MMT-03', 'joining_date' => date("Y-m-d"), 'personal_email'=>'subhodeep307047@gmail.com','official_email'=>'subhodeep307047@mmt.com'],
        ]);
        
        User::insert([
            ['name'=>'Super Admin','email'=>'superadmin@yopmail.com','password'=>bcrypt('password') ],
            ['name'=>'Subhodeep Yopmail','email'=>'subhodeep5@yopmail.com','password'=>bcrypt('password') ],
            ['name'=>'Subhodeep Gmail','email'=>'subhodeep307047@gmail.com','password'=>bcrypt('password') ],
        ]);

        Role::insert([
            ['name'=>'Super Admin','slug'=>'super-admin'],
            ['name'=>'Admin','slug'=>'admin'],
            ['name'=>'CEO','slug'=>'ceo'],
            ['name'=>'HR Manager','slug'=>'hr-manager'],
            ['name'=>'Project Manager','slug'=>'project-manager'],
            ['name'=>'Team Lead','slug'=>'team-lead'],
            ['name'=>'Interviewer','slug'=>'interviewer'],
            ['name'=>'General User','slug'=>'genetal-user'],
        ]);

        Permission::insert([
            ['name'=>'Employee','slug'=>'employee'],
            ['name'=>'Add Employee','slug'=>'add-employee'],
            ['name'=>'Edit Employee','slug'=>'edit-employee'],
            ['name'=>'Delete Employee','slug'=>'delete-employee'],
        ]);

        SubsctiptionPlan::insert([
            ['pack_name'=>'Test 1','actual_price'=> 300, 'pack_validity' => '45' ,'pack_slug' => 'test_1'],
            ['pack_name'=>'Test 2','actual_price'=> 500, 'pack_validity' => '45' ,'pack_slug' => 'test_2'],
            ['pack_name'=>'Test 3','actual_price'=> 800, 'pack_validity' => '45' ,'pack_slug' => 'test_3']
        ]);

    }
}
