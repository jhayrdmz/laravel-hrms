<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\UserProfile;
use App\Designation;

class UserTableSeeder extends Seeder {

  public function run() {
    $role_admin = Role::where('name', 'Admin')->first();
    $role_hr = Role::where('name', 'HR')->first();
    $role_employee = Role::where('name', 'Employee')->first();

    // Admin User
    $admin = new User();
    $admin->designation_id = 0;
    $admin->is_active = 1;
    $admin->name = 'Admin Name';
    $admin->email = 'admin@hrms.com';
    $admin->password = bcrypt('password');
    $admin->save();
    $admin->roles()->attach($role_admin);

    // HR User
    $hr_manager = Designation::where('designation_name', 'HR Manager')->first();
    $hr = new User();
    $hr->designation_id = $hr_manager->id;
    $hr->is_active = 1;
    $hr->name = 'HR Name';
    $hr->email = 'hr@hrms.com';
    $hr->password = bcrypt('password');
    $hr->save();
    $hr->roles()->attach($role_hr);

    $hr->profile()->save(
      new UserProfile([
        'first_name' => 'HR',
        'last_name' => 'Name',
        'employment_status' => 'regular'
      ])
    );

    // Employee User
    $production_staff = Designation::where('designation_name', 'Staff')->first();
    $employee = new User();
    $employee->designation_id = $production_staff->id;
    $employee->is_active = 1;
    $employee->name = 'Employee Name';
    $employee->email = 'employee@hrms.com';
    $employee->password = bcrypt('password');
    $employee->save();
    $employee->roles()->attach($role_employee);

    $employee->profile()->save(
      new UserProfile([
        'first_name' => 'Employee',
        'last_name' => 'Name',
        'gender' => 'male',
        'birthdate' => date('d/m/y'),
        'address' => 'Sample Address',
        'phone' => '12345678',
        'date_hired' => date('d/m/y'),
        'tin_id' => '123456',
        'sss_id' => '123456',
        'pagibig_id' => '123456',
        'employment_status' => 'regular'
      ])
    );
  }

}
