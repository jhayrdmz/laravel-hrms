@extends('layouts.app')

@section('content')
  <div class="p-30 m-t-30 p-t-none p-b-none">
    <div class="row">
      {{ Form::open(['url' => route('admin.announcement.store'), 'autocomplete' => 'off']) }}
        <div class="col-lg-8">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Create New Announcement</h3>
            </div>
            <div class="panel-body">

              <div class="form-group">
                <label>Title</label>
                {{ Form::text('title', null, array('class' => 'form-control', 'autofocus' => true)) }}
              </div>

              <div class="form-group">
                <label>Content</label>
                {{ Form::textarea('content', null, array('class' => 'tiny-mce')) }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Publish Settings</h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label>Status</label>
                {{ Form::select('status', App\Announcement::postStatus(), null, array(
                  'class' => 'selectpicker form-control'
                )) }}
              </div>

              <div class="form-group" style="position: relative">
                <label>Publish Date</label>
                <input type="text" name="publish_at" class="form-control datepicker-inline">
              </div>

              <div class="row m-t-20">
                <div class="col-xs-12">
                  <a href="{{ url('admin/announcement') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      {{ Form::close() }}
    </div>
  </div>
@endsection

@section('footer-scripts')
  <script src="{{ asset('public/js/tinymce/tinymce.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('.datepicker-inline').datetimepicker({
        defaultDate: new Date(),
      });

      $('.fass').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
        console.log(clickedIndex);
      });

      tinymce.init({
        selector: '.tiny-mce',
        height: 400,
        menubar: false,
        plugins: ['image lists link charmap textcolor media paste fullscreen'],
        toolbar: 'wpgallery,formatselect,bold,italic,underline,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,undo,redo',
        content_css: [
        '//www.tinymce.com/css/codepen.min.css']
      });
    });
  </script>
@endsection