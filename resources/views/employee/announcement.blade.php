@extends('layouts.app')

@section('content')
  <section class="wrapper-bottom-sec">
    <div class="p-30 p-b-none">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel">
            <div class="panel-heading row">
              <div class="col-xs-6"><h3 class="panel-title">Announcements</h3></div>
            </div>
            <div class="panel-body p-none">
              <table class="table data-table table-hover table-ultra-responsive">
                <thead>
                  <tr>
                    <th style="width: 15%;">Date</th>
                    <th style="width: 65%;">Title</th>
                    <th class="no-sort" style="width: 20%;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($announcements as $announcement)
                    <tr>
                      <td>{{ $announcement->created_at->format('d/m/Y') }}</td>
                      <td>{{ $announcement->title }}</td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#announcement-modal-{{ $announcement->id }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View</a>
                        <div id="announcement-modal-{{ $announcement->id }}" class="modal fade" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Announcement</h4>
                              </div>
                              <div class="modal-body">
                                <h2 class="title">{{ $announcement->title }}</h2>
                                <h6 class="date">{{ $announcement->created_at->format('F d, Y') }}</h6>
                                <div class="content">{!! $announcement->content !!}</div>
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
      $('.data-table').DataTable();
    });
  </script>
@endsection