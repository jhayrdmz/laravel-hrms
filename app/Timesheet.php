<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model {

  protected $fillable = [
    'user_id', 'date', 'time_in', 'time_out'
  ];

  public function setDateAttribute($value) {
    $this->attributes['date'] = date_create($value);
  }

  public function user() {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }

}
