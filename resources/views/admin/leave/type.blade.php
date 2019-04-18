@extends('layouts.app')

@section('content')
  <section class="wrapper-bottom-sec">
    <div class="p-30">
      <h2 class="page-title">Leave Type</h2>
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
              {{ Form::open(array('url' => route('leave-type.store'), 'autocomplete' => 'off')) }}
                <div class="panel-heading">
                  <h3 class="panel-title">Add Leave Type</h3>
                </div>
                <div class="form-group">
                  <label>Leave Type</label>
                  <span class="help">e.g. "Sick Leave"</span>
                  <input type="text" class="form-control" name="name" autofocus required>
                </div>
                <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add </button>
              {{ Form::close() }}
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">All Leave Type</h3>
            </div>
            <div class="panel-body p-none">
              <table class="table data-table table-hover table-ultra-responsive">
                <thead>
                  <tr>
                    <th style="width: 70%;">Leave Type</th>
                    <th style="width: 30%;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (App\LeaveType::all() as $leave_type)
                    <tr>
                      <td>{{ $leave_type->name }}</td>
                      <td>
                        <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target=".modal_edit_leave-type_{{ $leave_type->id }}"><i class="fa fa-edit"></i> Edit</a>
                        {{ Form::open(['url' => route('leave-type.destroy', ['id' => $leave_type->id]), 'method' => 'DELETE', 'class' => 'inline-form', 'onsubmit' => "return confirm('Are you sure you want to delete {$leave_type->name}?')"]) }}
                          <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                        {{ Form::close() }}
                        <div class="modal fade modal_edit_leave-type_{{ $leave_type->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Leave Type</h4>
                              </div>
                              {{ Form::open(array('url' => route('leave-type.update', ['id' => $leave_type->id]), 'method' => 'PUT', 'class' => 'form-some-up form-block', 'autocomplete' => 'off')) }}
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label>Leave Type:</label>
                                    <input type="text" class="form-control" name="name" value="{{ $leave_type->name }}" required>
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