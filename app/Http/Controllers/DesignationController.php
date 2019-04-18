<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Designation;

class DesignationController extends Controller {

  public function index() {
    $departments = DB::table('departments')
      ->get()->mapWithKeys(function ($item) {
        return [$item->id => $item->department_name];
      });

    $designations = DB::table('designations')
      ->select(
        'designations.id as designation_id',
        'designations.designation_name',
        'departments.id as department_id',
        'departments.department_name')
      ->leftJoin('departments', 'departments.id', '=', 'designations.department_id')
      ->get();

    return view('admin.designation', compact('departments', 'designations'));
  }

  public function store(Request $request) {
    Designation::create($request->all());

    return redirect('admin/designation')
      ->with('success', 'Designation Added Successfully');
  }

  public function update(Request $request, $id) {
    Designation::findOrFail($id)->fill($request->all())->save();

    return redirect('admin/designation')
      ->with('success', 'Designation Updated Successfully');
  }

  public function destroy($id) {
    Designation::findOrFail($id)->delete();

    return redirect('admin/designation')
      ->with('success', 'Designation Deleted Successfully');
  }

}
