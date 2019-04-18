<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementRequest;
use App\Announcement;
use Auth;

class AnnouncementController extends Controller {

  public function index() {
    $announcements = Announcement::authorized()->get();
    return view('admin.announcement.index', compact('announcements'));
  }

  public function create() {
    return view('admin.announcement.create');
  }

  public function store(AnnouncementRequest $request) {
    $announcement = Auth::user()->announcements()->create($request->all());

    return redirect()
      ->route('admin.announcement.edit', $announcement)
      ->with('success', 'Announcement successfully created');
  }

  public function edit($id) {
    $announcement = Announcement::authorized()->findOrFail($id);
    return view('admin.announcement.edit', compact('announcement'));
  }

  public function update(AnnouncementRequest $request, $id) {
    Announcement::authorized()
      ->findOrFail($id)
      ->fill($request->all())
      ->save();
    
    return redirect()
      ->route('admin.announcement.edit', $id)
      ->with('success', 'Announcement successfully updated');
  }

  public function destroy($id) {
    Announcement::authorized()->findOrFail($id)->delete();

    return redirect()
      ->route('admin.announcement.index')
      ->with('success', 'Announcement successfully deleted');
  }

}
