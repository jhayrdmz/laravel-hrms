@extends('layouts.app')

@section('content')
  <section class="wrapper-bottom-sec">
    <div class="p-30 p-b-none">
      @if (session()->get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          {{ session()->get('success') }}
        </div>
      @endif
      <div class="row">
        <div class="col-lg-12">
          <div class="panel">
            <div class="panel-heading row">
              <div class="col-xs-6"><h3 class="panel-title">Leave Application</h3></div>
              <div class="col-xs-6 text-right">
                <a href="{{ route('admin.leave.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Leave</a>
              </div>
            </div>
            <div class="panel-body p-none">
              <table class="table data-table table-hover table-ultra-responsive">
                <thead>
                  <tr>
                    <th style="width: 25%;">Employee</th>
                    <th style="width: 20%;">Leave Type</th>
                    <th style="width: 20%;">Date Applied</th>
                    <th style="width: 20%;">Status</th>
                    <th class="no-sort" style="width: 15%;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($leaves as $leave)
                    <tr>
                      <td data-label="Employee"><a href="{{ route('admin.employee.edit', $leave->user->id) }}" >{{ $leave->user->name }}</a></td>
                      <td data-label="Leave Type">{{ $leave->leaveType->name }}</td>
                      <td data-label="Date Applied">{{ $leave->created_at->format('d/m/Y') }}</td>
                      <td data-label="Status">
                         <span class="btn btn-{{ $leave->status }} btn-xs">
                          {{ ucwords($leave->status) }}
                        </span>
                      </td>
                      <td data-label="Actions">
                        <a class="btn btn-success btn-xs" href="{{ route('admin.leave.edit', $leave->id) }}"><i class="fa fa-edit"></i> Edit</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
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
      $('.data-table').DataTable();
    });
  </script>
@endsection