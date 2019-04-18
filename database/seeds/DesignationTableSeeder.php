<?php

use Illuminate\Database\Seeder;
use App\Department;
use App\Designation;

class DesignationTableSeeder extends Seeder {
  
  public function run() {

    $hr = Department::where('department_name', 'Human Resources')->first();
    $production = Department::where('department_name', 'Production')->first();
    
    $hr_staff = new Designation();
    $hr_staff->designation_name = 'HR Staff';
    $hr_staff->department_id = $hr->id;
    $hr_staff->save();

    $hr_intern = new Designation();
    $hr_intern->designation_name = 'HR Intern';
    $hr_intern->department_id = $hr->id;
    $hr_intern->save();

    $hr_manager = new Designation();
    $hr_manager->designation_name = 'HR Manager';
    $hr_manager->department_id = $hr->id;
    $hr_manager->save();
    
    $production_staff = new Designation();
    $production_staff->designation_name = 'Staff';
    $production_staff->department_id = $production->id;
    $production_staff->save();
  }

}
