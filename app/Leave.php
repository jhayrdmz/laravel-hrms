<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Leave extends Model {

  use SoftDeletes;

  protected $fillable = [
    'user_id', 'leave_type_id', 'start_date', 'end_date',
    'status', 'reason', 'remarks'
  ];

  protected $dates = ['start_date', 'end_date'];

  public function setStartDateAttribute($value) {
    $this->attributes['start_date'] = Carbon::createFromFormat('m/d/Y', $value);
  }

  public function setEndDateAttribute($value) {
    $this->attributes['end_date'] = Carbon::createFromFormat('m/d/Y', $value);
  }

  public function leaveType() {
    return $this->hasOne(LeaveType::class, 'id', 'leave_type_id');
  }

  public function user() {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }

}
