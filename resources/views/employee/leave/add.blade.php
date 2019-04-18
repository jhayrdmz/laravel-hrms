@extends('layouts.app')

@section('content')
  <div class="p-30 m-t-30 p-t-none p-b-none">
    <div class="row">
      <div class="col-lg-6">
        <div class="panel">
          <div class="panel-body">
            {{ Form::open(['url' => route('leave.store'), 'autocomplete' => 'off']) }}
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
                <label>Leave Type:</label>
                {{ Form::select('leave_type_id', App\LeaveType::all()->pluck('name', 'id'), null, array('class' => 'form-control selectpicker', 'data-live-search' => 'true')) }}
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Leave From</label>
                    {{ Form::text('start_date', null, array('class' => 'form-control datepicker-from')) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Leave To</label>
                    {{ Form::text('end_date', null, array('class' => 'form-control datepicker-to')) }}
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Reason</label>
                {{ Form::textarea('reason', null, array('class' => 'form-control')) }}
              </div>

              <div class="row m-t-20">
                <div class="col-xs-12">
                  <a href="{{ route('leave.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Add Leave</button>
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
      $('.datepicker-from').datetimepicker({
        format: 'DD/MM/YYYY',
        defaultDate: new Date()
      });

      $('.datepicker-to').datetimepicker({
        format: 'DD/MM/YYYY',
        defaultDate: new Date(),
        minDate: moment().startOf('day')
      });

      $(".datepicker-from").on("dp.change", function(e) {
        $('.datepicker-to').data("DateTimePicker").minDate(e.date.startOf('day'));
      });
    });
  </script>
@endsection