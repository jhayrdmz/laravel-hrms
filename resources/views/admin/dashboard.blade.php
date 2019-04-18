@extends('layouts.app')

@section('content')
  <section class="wrapper-bottom-sec">
    <div class="row p-t-20">
      <div class="col-lg-12">
        <div class="panel-body">
          <div class="row text-center">

            <div class="col-sm-6 m-b-15">
              <div class="z-shad-1">
                <div class="bg-complete-darker text-white p-15 clearfix">
                  <span class="pull-left font-45 m-l-10"><i class="fa fa-users"></i></span>
                  <div class="pull-right text-right m-t-15">
                    <span class="small m-b-5 font-15">
                      {{ App\User::whereHas('roles', function($query) {
                        $query->where('roles.id', '<>', 1);
                      })->count() }} Employees
                    </span>
                    <br>
                    <a href="{{ route('admin.employee.create') }}" class="btn btn-xs text-uppercase">Add New</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 m-b-15">
              <div class="z-shad-1">
                <div class="bg-complete-darker text-white p-15 clearfix">
                  <span class="pull-left font-45 m-l-10"><i class="fa fa-bed"></i></span>
                  <div class="pull-right text-right m-t-15">
                    <span class="small m-b-5 font-15">{{ App\Leave::where('status', 'pending')->get()->count() }} Pending Leave</span>
                    <br>
                    <a href="{{ route('admin.leave.index') }}" class="btn btn-xs text-uppercase">View All</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row p-20 p-t-none p-b-none">
      <div class="col-lg-6">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Announcements</h3>
          </div>
          <div class="panel-body">
            <div class="list-group">
              @foreach($announcements as $announcement)
                <a href="#" data-toggle="modal" data-target="#announcement-modal-{{ $announcement->id }}" class="list-group-item">
                  <h4 class="list-group-item-heading">{{ $announcement->title }}</h4>
                  <h6>{{ $announcement->created_at->format('M d, Y') }}</h6>
                </a>
                <div id="announcement-modal-{{ $announcement->id }}" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Announcement</h4>
                      </div>
                      <div class="modal-body">
                        <h2 class="title">{{ $announcement->title }}</h2>
                        <h6 class="date">{{ $announcement->created_at->format('M d, Y') }}</h6>
                        <div class="content">{!! $announcement->content !!}</div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              @if(count($announcements) < 1)
                <p>No Announcement</p>
              @endif
            </div>
            <a href="{{ route('admin.announcement.index') }}" class="btn btn-primary text-uppercase">View All</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Recent Leave Application</h3>
          </div>
          <div class="panel-body p-none">
            <table class="table table-hover table-ultra-responsive">
              <thead>
                <tr>
                  <th style="width: 30%;">Employee</th>
                  <th style="width: 30%;">Type</th>
                  <th style="width: 20%;">Status</th>
                  <th class="no-sort" style="width: 20%;">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach (App\Leave::with(['user', 'leaveType'])->orderBy('created_at', 'desc')->take(5)->get() as $leave)
                  <tr>
                    <td data-label="Name">
                      <p><a href="#">{{ $leave->user->name }}</a></p>
                    </td>
                    <td data-label="Leave Type">{{ $leave->leaveType->name }}</td>
                    <td data-label="Status">
                      <span class="btn btn-{{ $leave->status }} btn-xs">
                        {{ ucwords($leave->status) }}
                      </span>
                    </td>
                    <td data-label="Action">
                      <a href="{{ route('admin.leave.edit', $leave->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row p-20 p-t-none p-b-none">
      <div class="col-lg-12">
        <div class="panel">
          <div class="panel-heading"></div>
          <div class="panel-body">
            <div id="calendar"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('css-styles')
  <link href="{{ asset('public/css/fullcalendar.min.css') }}" rel="stylesheet">
@endsection

@section('footer-scripts')
  <script src="{{ asset('public/js/fullcalendar.min.js') }}"></script>
  <script>
    $("#calendar").fullCalendar({
      themeSystem: 'bootstrap3',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek'
      },
      // events: baseUrl + 'calendar',
      eventRender: function(eventObj, $el) {
        $el.popover({
          title: eventObj.title,
          content: eventObj.description,
          trigger: 'hover',
          placement: 'top',
          container: 'body'
        });
      }
    });
  </script>
@endsection