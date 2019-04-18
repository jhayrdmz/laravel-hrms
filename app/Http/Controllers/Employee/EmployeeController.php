<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;

class EmployeeController extends Controller {

  public function index() {
    $announcements = Announcement::all();
    return view('employee.dashboard', compact('announcements'));
  }

}
