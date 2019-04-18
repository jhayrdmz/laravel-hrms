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
              <div class="col-xs-6"><h3 class="panel-title">Leave</h3></div>
              <div class="col-xs-6 text-right">
                <a href="{{ route('leave.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Apply Leave</a>
              </div>
            </div>
            <div class="panel-body p-none">
              <table class="table data-table table-hover table-ultra-responsive">
                <thead>
                  <tr>
                    <th style="width:20%;">Type</th>
                    <th style="width:15%;">Date From</th>
                    <th style="width:15%;">Date To</th>
                    <th style="width:20%;">Date Applied</th>
                    <th style="width:15%;">Status</th>
                    <th class="no-sort" style="width: 15%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (App\Leave::where('user_id', \Auth::user()->id)->get() as $leave)
                    <tr>
                      <td data-label="Type">{{ $leave->leaveType->name }}</td>
                      <td data-label="Date From">{{ $leave->start_date->format('d/m/Y') }}</td>
                      <td data-label="Date To">{{ $leave->end_date->format('d/m/Y') }}</td>
                      <td data-label="Date Applied">{{ $leave->created_at->format('d/m/Y') }}</td>
                      <td data-label="Status">
                         <span class="btn btn-{{ $leave->status }} btn-xs">
                          {{ ucwords($leave->status) }}
                        </span>
                      </td>
                      <td data-label="Action">
                        <a href="#" data-toggle="modal" data-target=".modal_view_leave_{{ $leave->id }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View</a>
                        <div class="modal fade modal_view_leave_{{ $leave->id }}" role="dialog">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">View Leave</h4>
                              </div>
                              <div class="modal-body">
                                <form class="form-some-up form-block frm-cstm">
                                  <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" value="{{ $leave->leaveType->name }}" class="form-control" readonly="true">
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label>Leave From</label>
                                        <input type="text" value="{{ $leave->start_date->format('d/m/Y') }}" class="form-control" readonly="true">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label>Leave To</label>
                                        <input type="text" value="{{ $leave->end_date->format('d/m/Y') }}" class="form-control" readonly="true">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label>Date Applied</label>
                                        <input type="text" value="{{ $leave->created_at->format('d/m/Y') }}" class="form-control" readonly="true">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" value="{{ $leave->status }}" class="form-control" readonly="true">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Reason</label>
                                    {{ Form::textarea(null, $leave->reason, array('class' => 'form-control', 'readonly' => "true")) }}
                                  </div>
                                  <div class="form-group">
                                    <label>Remarks</label>
                                    {{ Form::textarea(null, $leave->remarks, array('class' => 'form-control', 'readonly' => "true")) }}
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                              </div>
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
    $(document).ready(function() {
      $('.data-table').DataTable({"aaSorting": [3, 'asc']});
    });
  </script>
@endsection