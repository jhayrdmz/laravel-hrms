<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TimelogRequest extends FormRequest {

  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'user_id' => 'required|exists:users,id',
      'date' => ['required', 'date', Rule::unique('timelogs')->where(function ($query) {
        return $query->where('date', $this->date)->where('user_id', $this->user_id);
      })],
      'time_in' => 'required',
      'time_out' => 'required'
    ];
  }

  public function messages() {
    return [
      'date.unique' => 'The date has already been logged'
    ];
  }

  public function all() {
    $input = parent::all();

    $input['date'] = date("Y/m/d", strtotime($input['date']));

    return $input;
  }

}
