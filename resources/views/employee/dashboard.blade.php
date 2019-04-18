@extends('layouts.app')

@section('content')
  <section class="wrapper-bottom-sec">
    <div class="row p-20">
      <div class="col-lg-4">
        <div class="panel panel-30 p-t-30">
          <div class="panel-body">
            <div class="text-center">
              <div class="thumbnail m-b-none">
                <img class="initial-image img-responsive" id="photo" data-name="TE" width="280px" height="280px">
              </div>
            </div>
            <div class="m-t-20">
              <h3 class="bold font-color-1 text-center m-b-20">Test Test</h3>
              <ul class="info-list">
                <li><span class="info-list-title">Employee ID</span><span class="info-list-des">BCTPH00001</span></li>
                <li><span class="info-list-title">Email</span><span class="info-list-des">BCTPH00001</span></li>
                <li><span class="info-list-title">Department</span><span class="info-list-des">BCTPH00001</span></li>
                <li><span class="info-list-title">Designation</span><span class="info-list-des">BCTPH00001</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="row">
          <div class="col-lg-6">
            <div class="bg-primary text-white p-30 clearfix text-center m-b-10">
              <?php echo date('l, F d Y'); ?> <br> <?php echo date('h:i A'); ?>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="bg-primary text-white p-30 clearfix text-center">
              <div class="row">
                <div class="col-xs-6"><strong>Sick Leave</strong> <br> 1/12</div>
                <div class="col-xs-6"><strong>Vacation Leave</strong> <br> 2/12</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row m-t-20">
          <div class="col-xs-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation"class="active"><a href="#notice_board" aria-controls="notice_board" role="tab" data-toggle="tab">Notice Board</a></li>
              <li role="presentation"><a href="#calendar" aria-controls="calendar" role="tab" data-toggle="tab">Calendar</a></li>
            </ul>

            <div class="tab-content panel p-20">

              <!-- Announcement -->
              <div role="tabpanel" class="tab-pane active" id="notice_board">
                <div class="list-group">
                  @foreach($announcements as $announcement)
                    <a href="#" data-toggle="modal" data-target="#notice-modal-{{ $announcement->id }}" class="list-group-item notice-list">
                      <h4 class="list-group-item-heading">{{ $announcement->title }}</h4>
                      <h6>{{ $announcement->created_at->format('M d, Y') }}</h6>
                    </a>
                    <div id="notice-modal-{{ $announcement->id }}" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Notice Board</h4>
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
                </div>
                <a href="{{ url('#') }}" class="btn btn-primary text-uppercase">View All</a>
              </div>

              <!-- Calendar -->
              <div role="tabpanel" class="tab-pane" id="calendar">
                <div id="calendar"></div>
              </div>
            </div>
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