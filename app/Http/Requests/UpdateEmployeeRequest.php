<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateEmployeeRequest extends FormRequest {

  public function authorize() {
    return !User::find($this->route('employee'))->hasAnyRole(['Admin']);
  }

  public function rules() {
    return [
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => 'required|email|unique:users,email,' . $this->route('employee'),
      'password' => 'nullable|min:8',
      'confirm_password' => 'nullable|same:password',
      'employment_status' => 'required',
      'department' => 'required|exists:departments,id',
      'designation_id' => 'required|exists:designations,id',
      'role' => 'required|exists:roles,id'
    ];
  }

}
