@extends('layouts.app')

@section('content')
  <section class="wrapper-bottom-sec">
    <div class="p-30">
      <h2 class="page-title">Department</h2>
    </div>
    <div class="p-30 p-t-none p-b-none">
      @if (session()->get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          {{ session()->get('success') }}
        </div>
      @endif
      <div class="row">
        <div class="col-lg-4">
          <div class="panel">
            <div class="panel-body">
              {{ Form::open(array('url' => route('admin.department.store'), 'autocomplete' => 'off')) }}
                <div class="panel-heading">
                  <h3 class="panel-title">Add Department</h3>
                </div>
                <div class="form-group">
                  <label>Department Name</label>
                  <span class="help">e.g. "Account Department"</span>
                  <input type="text" class="form-control" name="department_name" autofocus required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add </button>
              {{ Form::close() }}
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">All Departments</h3>
            </div>
            <div class="panel-body p-none">
              <table class="table data-table table-hover table-ultra-responsive">
                <thead>
                  <tr>
                    <th style="width: 70%;">Department</th>
                    <th class="no-sort" style="width: 30%;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(App\Department::all() as $department)
                    <tr>
                      <td data-label="Department"><p>{{ $department->department_name }}</p></td>
                      <td>
                        <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target=".modal_edit_department_{{ $department->id }}"><i class="fa fa-edit"></i> Edit</a>
                        {{ Form::open(['url' => route('admin.department.destroy', $department->id), 'method' => 'DELETE', 'class' => 'inline-form', 'onsubmit' => "return confirm('Are you sure you want to delete {$department->department_name}?')"]) }}
                          <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                        {{ Form::close() }}
                        <div class="modal fade modal_edit_department_{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
                              </div>
                              {{ Form::open(array('url' => route('admin.department.update', $department->id), 'method' => 'PUT', 'class' => 'form-some-up form-block', 'autocomplete' => 'off')) }}
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label>Department name:</label>
                                    <input type="text" class="form-control" name="department_name" value="{{ $department->department_name }}" required>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                              {{ Form::close() }}
                            </div>
                          </div>
                        </div>
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
    $(document).ready(function(){
      $('.data-table').DataTable();
    });
  </script>
@endsection