<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\UserProfile;
use App\Designation;
use App\Department;
use App\User;
use App\Role;
use Auth;

class EmployeeController extends Controller {

  public function index(Request $request) {
    $employees = User::employees()
      ->with(['designation', 'designation.department'])
      ->get();

    return view('admin.employee.table', compact('employees'));
  }

  public function create() {
    $roles = Auth::user()->hasRole('admin') 
      ? Role::pluck('name', 'id') 
      : Role::where('id', '<>', 1)->pluck('name', 'id');

    return view('admin.employee.add', compact('roles'));
  }

  public function store(EmployeeRequest $request) {
    $data = $request->all();
    $data['name'] = $request->first_name . ' ' . $request->last_name;
    $data['password'] = bcrypt($request->password);
    $user = User::create($data);
    $user->roles()->attach(Role::where('id', $request->role)->first());
    $user->profile()->save(new UserProfile($data));

    return redirect('admin/employee')
      ->with('success', 'Employee Added Successfully');
  }

  public function edit($id) {
    $user_info = User::employees()
      ->with(['designation', 'designation.department'])
      ->findOrFail($id);

    $roles = Auth::user()->hasRole('admin') 
      ? Role::pluck('name', 'id') 
      : Role::where('id', '<>', 1)->pluck('name', 'id');

    return view('admin.employee.edit', compact('user_info', 'roles'));
  }

  public function update(UpdateEmployeeRequest $request, $id) {
    $data = $request->all();
    $data['name'] = $request->first_name . ' ' . $request->last_name;

    User::findOrFail($id)->fill($data)->save();
    UserProfile::where('user_id', $id)->first()->fill($data)->save();

    return redirect()->back()
      ->with('success', 'Employee Updated Successfully');
  }

  public function destroy($id) {
    $employee = User::findOrFail($id)->delete();

    return redirect('admin/employee')
      ->with('success', 'Employee Deleted Successfully');
  }

  public function getDesignation(Request $request) {
    $html = '';

    foreach(Designation::where('department_id', $request->department_id)->get() as $designation) {
      $html .= '<option value="'. $designation->id .'">'. $designation->designation_name .'</option>';
    }

    return response()->json(array('success' => true, 'html' => $html));
  }

}
