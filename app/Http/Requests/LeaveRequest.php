<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest {

  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'user_id' => 'required|exists:users,id',
      'leave_type_id' => 'required|exists:leave_types,id',
      'start_date' => 'required',
      'end_date' => 'required|after_or_equal:start_date',
      'status' => 'required|in:approved,pending,rejected',
      'reason' => 'nullable|max:255'
    ];
  }

}
