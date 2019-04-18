<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Timesheet;

class TimesheetController extends Controller {

  public function index() {
    return view('employee.timesheet.table');
  }

  public function create() {
  }

  public function store(Request $request) {
  }

  public function show($id) {
  }

  public function edit($date) {
    return view('employee.timesheet.edit');
  }

  public function update(Request $request, $id) {
  }

  public function destroy($id) {
  }

  public function getTimelog(Request $request) {
    $result = Timesheet::where('user_id', $request->employee_id)
      ->whereBetween('date', [$request->from, $request->to])
      ->get()
      ->keyBy('date')
      ->toArray();

    $dates = $this->getDatesFromRange($request->from, $request->to);
    $timelogs = array_values(array_merge($dates, $result));

    return response()->json(['data' => $timelogs]);
  }

  private function getDatesFromRange($start, $end, $format = 'Y-m-d') {
    $array = array();
    $interval = new \DateInterval('P1D');

    $realEnd = new \DateTime($end);
    $realEnd->add($interval);

    $period = new \DatePeriod(new \DateTime($start), $interval, $realEnd);

    foreach($period as $date) {
      $d = $date->format($format);
      $array[$d]['date'] = $d;
    }

    return $array;
  }

}
