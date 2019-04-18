<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaveType;

class LeaveTypeController extends Controller {

  public function index() {
    return view('admin.leave.type');
  }

  public function store(Request $request) {
    LeaveType::create($request->all());

    return redirect('admin/leave-type')
      ->with(['success' => true, 'message' => 'Leave Type Added Successfully']);
  }

  public function update(Request $request, $id) {
    LeaveType::findOrFail($id)->fill($request->all())->save();

    return redirect('admin/leave-type')
      ->with(['success' => true, 'message' => 'Leave Type Updated Successfully']);
  }

  public function destroy($id) {
    LeaveType::findOrFail($id)->delete();

    return redirect('admin/leave-type')
      ->with(['success' => true, 'message' => 'Leave Type Deleted Successfully']);
  }

}
