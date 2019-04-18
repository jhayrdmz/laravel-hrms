@extends('layouts.app')

@section('content')
  <div class="p-30 m-t-30 p-t-none p-b-none">
    <div class="row">
      <div class="col-lg-6">
        <div class="panel">
          <div class="panel-body">
            {{ Form::open(['url' => route('timesheet.update', ['date' => '']), 'autocomplete' => 'off']) }}
              <div class="panel-heading p-l-none">
                <h3 class="panel-title">Add Leave</h3>
              </div>

              @if (count($errors) > 0)
                @foreach ($errors->all() as $message)
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {{ $message }}
                  </div>
                @endforeach
              @endif

              <div class="form-group">
                <label>Date</label>
                {{ Form::text('date', null, array('class' => 'form-control datepicker-inline')) }}
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Time In</label>
                    {{ Form::text('time_in', null, array('class' => 'form-control timepicker-inline')) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Time Out</label>
                    {{ Form::text('time_out', null, array('class' => 'form-control timepicker-inline')) }}
                  </div>
                </div>
              </div>

              <div class="row m-t-20">
                <div class="col-xs-12">
                  <a href="{{ route('timesheet.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Add Timelog</button>
                </div>
              </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer-scripts')
  <script>
    $(document).ready(function() {
      $('.datepicker-inline').datetimepicker({
        inline: true,
        format: 'MM/DD/YYYY',
        defaultDate: new Date()
      });

      $('.timepicker-inline').datetimepicker({
        inline: true,
        format: 'LT',
        debug: true
      });

      $(".datepicker-from").on("dp.change", function(e) {
        $('.datepicker-to').data("DateTimePicker").minDate(e.date.startOf('day'));
      });
    });
  </script>
@endsection