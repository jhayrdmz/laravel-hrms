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
              <div class="col-xs-6"><h3 class="panel-title">Announcements</h3></div>
              <div class="col-xs-6 text-right">
                <a href="{{ route('admin.announcement.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New Announcement</a>
              </div>
            </div>
            <div class="panel-body p-none">
              <table class="table data-table table-hover table-ultra-responsive">
                <thead>
                  <tr>
                    <th style="width: 15%;">Date</th>
                    <th style="width: 50%;">Title</th>
                    <th style="width: 15%;">Status</th>
                    <th class="no-sort" style="width: 20%;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($announcements as $announcement)
                    <tr>
                      <td data-label="Date">{{ $announcement->created_at->format('m/d/Y') }}</td>
                      <td data-label="Title">{{ $announcement->title }}</td>
                      <td data-label="Status">
                         <span class="btn btn-{{ $announcement->status }} btn-xs">
                          {{ ucwords($announcement->status) }}
                        </span>
                      </td>
                      <td data-label="Actions">
                        <a href="{{ route('admin.announcement.edit', $announcement->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                        {{ Form::open(['url' => route('admin.announcement.destroy', ['id' => $announcement->id]), 'method' => 'DELETE', 'class' => 'inline-form', 'onsubmit' => "return confirm('Are you sure you want to delete {$announcement->title}?')"]) }}
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