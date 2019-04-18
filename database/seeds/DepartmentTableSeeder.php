<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentTableSeeder extends Seeder {
  
  public function run() {

    $hr = new Department();
    $hr->department_name = 'Human Resources';
    $hr->save();

    $production = new Department();
    $production->department_name = 'Production';
    $production->save();

  }

}
