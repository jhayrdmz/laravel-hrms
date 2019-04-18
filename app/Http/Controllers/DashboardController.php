<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class DashboardController extends Controller {

  public function index() {
    $announcements = Announcement::published()->take(5)->get();
    return view('admin.dashboard', compact('announcements'));
  }

}
