<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TimelogRequest;
use App\User;
use App\Timelog;

class TimelogController extends Controller {

  public function index() {
    $employees = $this->getEmployees();
    $employee_id = 100002;

    $result = Timelog::with(['user'])
      ->where('user_id', $employee_id)
      ->get()
      ->keyBy('date')
      ->toArray();

    // $dates = $this->getDaysInMonth('03-2019');
    // $timelogs = array_merge($dates, $result);

    return $this->loadView('admin.timelog.main', compact('employees'));
  }

  public function create() {
    $employees = $this->getEmployees();
    return $this->loadView('admin.timelog.add', compact('employees'));
  }

  public function store(TimelogRequest $request) {
    Timelog::create($request->all());

    return redirect('admin/timelog')
      ->with(['success' => true, 'message' => 'Timelog Added Successfully']);
  }

  public function getTimelog(Request $request) {
    $result = Timelog::where('user_id', $request->employee_id)
      ->whereBetween('date', [$request->from, $request->to])
      ->get()
      ->keyBy('date')
      ->toArray();

    $dates = $this->getDatesFromRange($request->from, $request->to);
    $timelogs = array_values(array_merge($dates, $result));

    return response()->json(['data' => $timelogs]);
  }

  private function getEmployees() {
    return User::whereHas('roles', function($query) {
      $query->where('roles.id', '<>', 1);
    })->pluck('name', 'id');
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
