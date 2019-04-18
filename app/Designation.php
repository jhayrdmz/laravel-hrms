<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model {

  public $timestamps = false;

  protected $fillable = ['department_id', 'designation_name'];

  public function users() {
    return $this->hasMany(User::class);
  }

  public function department() {
    return $this->belongsTo(Department::class);
  }

}
