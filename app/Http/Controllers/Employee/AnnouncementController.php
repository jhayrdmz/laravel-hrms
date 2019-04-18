<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;

class AnnouncementController extends Controller {

  public function index() {
    $announcements = Announcement::where('status', 'published')
      ->where('publish_at', '<=', date('Y-m-d H:i:s'))
      ->get();

    return view('employee.announcement', compact('announcements'));
  }

}
