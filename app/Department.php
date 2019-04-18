<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

  public $timestamps = false;

  protected $fillable = ['department_name'];

  public function designations() {
    return $this->hasMany(Designation::class);
  }

}
