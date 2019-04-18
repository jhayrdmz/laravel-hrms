<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller {

  public function index() {
    return view('admin.department');
  }

  public function store(Request $request) {
    Department::create($request->all());

    return redirect('admin/department')
      ->with('success', 'Department Added Successfully');
  }

  public function update(Request $request, $id) {
    Department::findOrFail($id)->fill($request->all())->save();

    return redirect('admin/department')
      ->with('success', 'Department Updated Successfully');
  }

  public function destroy($id) {
    Department::findOrFail($id)->delete();

    return redirect('admin/department')
      ->with('success', 'Department Deleted Successfully');
  }

}
