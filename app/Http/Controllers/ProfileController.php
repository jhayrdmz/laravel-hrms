<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller {

  public function index() {
    $user_info = User::with(['designation', 'designation.department'])->findOrFail(Auth::user()->id);
    return view('profile', compact('user_info'));
  }

}
