@extends('layouts.app')

@section('content')
  <section class="wrapper-bottom-sec">
    <div class="p-30">
      <h2 class="page-title">Edit Leave Application</h2>
    </div>
    <div class="p-30 p-t-none p-b-none">
      @if (session()->get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          {{ session()->get('success') }}
        </div>
      @endif
      <div class="row">
        <div class="col-lg-6">
          <div class="panel">
            <div class="panel-heading">
              <a href="{{ url('admin/leave') }}" class="btn btn-sm"><i class="fa fa-chevron-left"></i> Back to list</a>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label>Employee Name</label>
                <p><a href="{{ route('admin.employee.edit', $leave->user->id) }}">{{ $leave->user->name }} ({{ $leave->user->id }})</a></p>
              </div>
              <div class="form-group">
                <label>Leave Type</label>
                {{ Form::text(null, $leave->leaveType->name, array('class' => 'form-control', 'readonly' => true)) }}
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>From</label>
                    {{ Form::text(null, $leave->start_date, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>To</label>
                    {{ Form::text(null, $leave->end_date, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Date Applied</label>
                    {{ Form::text(null, $leave->created_at->format('d/m/Y'), array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Current Status</label>
                    {{ Form::text(null, ucwords($leave->status), array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Reason</label>
                {{ Form::textarea(null, $leave->reason, array('class' => 'form-control', 'readonly' => true)) }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="panel">
            {{ Form::open(['url' => url(sprintf('admin/leave/%d', $leave->id)), 'method' => 'PUT']) }}
              <div class="panel-heading clearfix">
                <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-save"></i> Update</button>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label>Change Status</label>
                  {{ Form::select('status', array('approved' => 'Approved', 'pending' => 'Pending', 'rejected' => 'Rejected'),  $leave->status, array('class' => 'form-control selectpicker', 'data-live-search' => 'true')) }}
                </div>
                <div class="form-group">
                  <label>Remarks</label>
                  {{ Form::textarea('remarks', $leave->remarks, array('class' => 'form-control')) }}
                </div>
              </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection