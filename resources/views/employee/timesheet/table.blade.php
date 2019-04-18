@extends('layouts.app')

@section('content')
  <section class="wrapper-bottom-sec">
    <div class="p-30">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="page-title">Timelog</h2>
        </div>
        <div class="col-lg-6 text-right">
          <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> File Correction</a>
        </div>
      </div>
    </div>
    <div class="p-30 p-t-none p-b-none">
      @if (session()->get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          {{ session()->get('success') }}
        </div>
      @endif

      <div class="panel">
        <div class="panel-body p-t-30">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label>Date From</label>
                <input type="text" class="form-control datepicker-from" required />
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label>Date To</label>
                <input type="text" class="form-control datepicker-to" required />
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="panel">
            <div class="panel-heading"></div>
            <div class="panel-body p-none">
              <table class="table table-hover table-condensed table-ultra-responsive data-table">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Hours</th>
                    <th width="80px">Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('footer-scripts')
  <script src="{{ asset('public/js/datatables.min.js') }}"></script>
  <script>
    $(document).ready(function() {

      $('.datepicker-from').datetimepicker({
        format: 'YYYY/MM/DD',
        defaultDate: moment().startOf('month')
      });

      $('.datepicker-to').datetimepicker({
        format: 'YYYY/MM/DD',
        defaultDate: moment().endOf('month'),
        minDate: $('.datepicker-from').data("DateTimePicker").viewDate()
      });

      var datatable = $('.data-table').DataTable({
        searching: false,
        paging: false, 
        info: false,
        ordering: false,
        processing: true,
        serverSide: true,
        ajax: {
          url: '{{ route("timesheet.get") }}',
          data: function(d) {
            return $.extend( {}, d, {
              employee_id: $('.selectpicker').find("option:selected").val(),
              from: $('.datepicker-from').val(),
              to: $('.datepicker-to').val()
            });
          },
        },
        columnDefs: [{
          targets: 4,
          render: function(data, type, row, meta) {
            return type === 'display' ? '<a class="btn btn-success btn-xs" href="timesheet/'+row.date+'/edit"><i class="fa fa-edit"></i> Edit</a>' : null;
          }
        }],
        columns: [
          { data: 'date' },
          { data: 'time_in', defaultContent: '---' },
          { data: 'time_out', defaultContent: '---' },
          { data: 'user_id', defaultContent: '---' },
          { data: 'null' }
        ]
      });

      $('.datepicker-to').on('dp.change',function(e) {
        datatable.draw();
      });

      $('.selectpicker').on('changed.bs.select', function() {
        datatable.draw();
      });

      $(".datepicker-from").on("dp.change", function(e) {
        $('.datepicker-to').data("DateTimePicker").minDate(e.date.startOf('day'));
        datatable.draw();
      });
    });
  </script>
@endsection