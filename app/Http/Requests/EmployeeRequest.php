<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest {

  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:8',
      'confirm_password' => 'required|same:password',
      'employment_status' => 'required',
      'department' => 'required|exists:departments,id',
      'designation_id' => 'required|exists:designations,id',
      'role' => 'required|exists:roles,id'
    ];
  }

}
