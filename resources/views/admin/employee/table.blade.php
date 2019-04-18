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
              <div class="col-xs-6"><h3 class="panel-title">Employees</h3></div>
              <div class="col-xs-6 text-right">
                <a href="{{ route('admin.employee.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Employee</a>
              </div>
            </div>
            <div class="panel-body p-none">
              <table class="table data-table table-hover table-ultra-responsive">
                <thead>
                  <tr>
                    <th style="width:15%;">ID</th>
                    <th style="width:20%;">Name</th>
                    <th style="width:15%;">Department</th>
                    <th style="width:15%;">Designation</th>
                    <th style="width:15%;">Status</th>
                    <th class="no-sort" style="width: 20%;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($employees as $employee)
                    <tr>
                      <td data-label="ID">{{ $employee->id }}</td>
                      <td data-label="Name">{{ $employee->name }}</td>
                      <td data-label="Department">{{ $employee->designation ? $employee->designation->department->department_name : '' }}</td>
                      <td data-label="Designation">{{ $employee->designation ? $employee->designation->designation_name : '' }}</td>
                      <td data-label="Status">{{ ucwords($employee->profile->employment_status) }}</td>
                      <td data-label="Actions">
                        <a href="{{ route('admin.employee.edit', $employee->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                        {{ Form::open(array('url' => route('admin.employee.destroy', $employee->id), 'method' => 'PUT', 'class' => 'inline-form', 'onsubmit' => "return confirm('Are you sure you want to delete {$employee->name}?')")) }}
                          <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                        {{ Form::close() }}
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