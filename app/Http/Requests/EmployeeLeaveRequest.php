<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeLeaveRequest extends FormRequest {

  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'leave_type_id' => 'required|exists:leave_types,id',
      'start_date' => 'required',
      'end_date' => 'required|after_or_equal:start_date',
      'reason' => 'nullable|max:255'
    ];
  }

}
