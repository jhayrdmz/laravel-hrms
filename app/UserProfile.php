<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

  protected $fillable = [
    'first_name', 'last_name', 'employment_status',
    'gender', 'birthdate', 'address', 'phone',
    'date_hired', 'tin_id', 'sss_id', 'pagibig_id',
    'philhealth', 'emergency_person', 'emergency_phone',
    'emergency_address'
  ];

  function users() {
    return $this->belongsTo(User::class);
  }

}
