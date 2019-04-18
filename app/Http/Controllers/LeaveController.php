<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LeaveRequest;
use App\User;
use App\Leave;
use App\LeaveType;

class LeaveController extends Controller {

  function index() {
    $leaves = Leave::with(['user', 'leaveType'])->get();
    return view('admin.leave.table', compact('leaves'));
  }

  public function create() {
    $employees = User::whereHas('roles', function($query) {
      $query->where('roles.id', '<>', 1);
    })->with(['designation', 'designation.department'])
      ->pluck('name', 'id');

    return view('admin.leave.add', compact('employees'));
  }

  public function store(LeaveRequest $request) {
    Leave::create($request->all());

    return redirect('admin/leave')
      ->with('success', 'Leave Added Successfully');
  }

  public function edit($id) {
    $leave = Leave::with(['user', 'leaveType'])->findOrFail($id);
    return view('admin.leave.edit', compact('leave'));
  }

  public function update(Request $request, $id) {
    Leave::findOrFail($id)->fill($request->all())->save();

    return redirect()->back()
      ->with('success', 'Leave Updated Successfully');
  }

}
