<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder {

  public function run() {
    $role_admin = new Role();
    $role_admin->name = 'Admin';
    $role_admin->save();

    $role_hr = new Role();
    $role_hr->name = 'HR';
    $role_hr->save();

    $role_employee = new Role();
    $role_employee->name = 'Employee';
    $role_employee->save();
  }

}
