<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeLeaveRequest;
use App\Http\Controllers\Controller;
use App\Leave;
use Auth;

class LeaveController extends Controller {

  public function index() {
    return view('employee.leave.table');
  }

  public function create() {
    return view('employee.leave.add');
  }

  public function store(EmployeeLeaveRequest $request) {
    $data = $request->all();
    $data['status'] = 'pending';
    Auth::user()->leaves()->create($data);

    return redirect('leave')
      ->with('success', 'Leave application submitted successfully');
  }

}
