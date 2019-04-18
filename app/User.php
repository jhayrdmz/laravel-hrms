<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {

  use Notifiable;
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable = [
    'name', 'email', 'password',
    'designation_id', 'is_active'
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  public function announcements() {
    return $this->hasMany(Announcement::class);
  }

  public function roles() {
    return $this->belongsToMany(Role::class);
  }

  public function profile() {
    return $this->hasOne(UserProfile::class);
  }

  public function designation() {
    return $this->belongsTo(Designation::class);
  }

  public function leaves() {
    return $this->hasMany(Leave::class);
  }

  public function scopeEmployees($query) {
    return $query->whereHas('roles', function($q) {
      $q->where('roles.id', '<>', 1);
    });
  }

  public function authorizeRoles($roles) {
    if(is_array($roles)) {
      return $this->hasAnyRole($roles) ||
        abort(401, 'This action is unauthorized.');
    }

    return $this->hasRole($roles) ||
      abort(401, 'This action is unauthorized.');
  }

  public function hasAnyRole($roles) {
    return null !== $this->roles()->whereIn('name', $roles)->first();
  }

  public function hasRole($role) {
    return null !== $this->roles()->where('name', $role)->first();
  }

}
