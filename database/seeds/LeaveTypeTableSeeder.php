<?php

use Illuminate\Database\Seeder;
use App\LeaveType;

class LeaveTypeTableSeeder extends Seeder {

  public function run() {
    $sick_leave = new LeaveType();
    $sick_leave->name = 'Sick Leave';
    $sick_leave->save();

    $vacation_leave = new LeaveType();
    $vacation_leave->name = 'Vacation Leave';
    $vacation_leave->save();
  }

}
