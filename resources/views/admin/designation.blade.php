@extends('layouts.app')

@section('content')
  <section class="wrapper-bottom-sec">
    <div class="p-30">
      <h2 class="page-title">Designation</h2>
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
              {{ Form::open(array('url' => route('admin.designation.store'), 'autocomplete' => 'off')) }}
                <div class="panel-heading">
                  <h3 class="panel-title">Add Designation</h3>
                </div>
                <div class="form-group">
                  <label>Designation Name</label>
                  <span class="help">e.g. "Software Engineer"</span>
                  <input type="text" class="form-control" name="designation_name" autofocus required>
                </div>
                <div class="form-group">
                  <label>Department</label>
                  {{ Form::select('department_id', $departments, null, array(
                    'class' => 'selectpicker form-control',
                    'data-live-search' => 'true'
                  )) }}
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
                    <th style="width: 35%;">Designation</th>
                    <th style="width: 35%;">Department</th>
                    <th class="no-sort" style="width: 30%;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($designations as $data)
                    <tr>
                      <td data-label="Designation"><p>{{ $data->designation_name }}</p></td>
                      <td data-label="Department"><p>{{ $data->department_name }}</p></td>
                      <td data-label="Actionss">
                        <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target=".modal_edit_designations_{{ $data->designation_id }}"><i class="fa fa-edit"></i> Edit</a>
                        {{ Form::open(['url' => route('admin.designation.destroy', $data->designation_id), 'method' => 'DELETE', 'class' => 'inline-form', 'onsubmit' => "return confirm('Are you sure you want to delete {$data->designation_name}?')"]) }}
                          <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                        {{ Form::close() }}
                        <div class="modal fade modal_edit_designations_{{ $data->designation_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
                              </div>
                              {{ Form::open(array('url' => route('admin.designation.update', $data->designation_id), 'method' => 'PUT', 'class' => 'form-some-up form-block', 'autocomplete' => 'off')) }}
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label>Designation name:</label>
                                    <input type="text" class="form-control" name="designation_name" value="{{ $data->designation_name }}" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Department</label>
                                    {{ Form::select('department_id', $departments, $data->department_id, array(
                                      'class' => 'selectpicker form-control',
                                      'data-live-search' => 'true'
                                    )) }}
                                    </select>
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