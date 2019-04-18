<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

  public function run() {
    $this->call(DepartmentTableSeeder::class);
    $this->call(DesignationTableSeeder::class);
    $this->call(RoleTableSeeder::class);
    $this->call(UserTableSeeder::class);
    $this->call(LeaveTypeTableSeeder::class);
  }

}
