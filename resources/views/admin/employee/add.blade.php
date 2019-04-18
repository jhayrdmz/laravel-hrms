@extends('layouts.app')

@section('content')
  <div class="p-30 m-t-30 p-t-none p-b-none">
    <div class="row">
      <div class="col-lg-6">
        <div class="panel">
          <div class="panel-body">
            {{ Form::open(['url' => route('admin.employee.store'), 'autocomplete' => 'off']) }}
              <div class="panel-heading p-l-none">
                <h3 class="panel-title">Add Employee</h3>
              </div>

              @if (count($errors) > 0)
                @foreach ($errors->all() as $message)
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {{ $message }}
                  </div>
                @endforeach
              @endif

              <div class="form-group">
                <label for="first_name">First name</label>
                {{ Form::text('first_name', null, ['id' => 'first_name', 'class' => 'form-control', 'required' => true, 'autofocus' => true]) }}
              </div>

              <div class="form-group">
                <label for="last_name">Last name</label>
                {{ Form::text('last_name', null, ['id' => 'last_name', 'class' => 'form-control', 'requred' => true]) }}
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                {{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'requred' => true]) }}
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <span class="help">must be at least 8 characters</span>
                {{ Form::password('password', ['id' => 'password', 'class' => 'form-control', 'requred' => true]) }}
              </div>

              <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                {{ Form::password('confirm_password', ['id' => 'confirm_password', 'class' => 'form-control', 'requred' => true]) }}
              </div>

              <div class="form-group">
                <label for="employment_status">Employment Status</label>
                {{ Form::select('employment_status', ['regular' => 'Regular', 'probationary' => 'Probationary', 'freelance' => 'Freelance', 'resigned' => 'Resigned'], 3, array(
                  'id' => 'employment_status',
                  'class' => 'selectpicker form-control'
                )) }}
              </div>

              <div class="form-group">
                <label for="department">Department</label>
                {{ Form::select('department', App\Department::pluck('department_name', 'id'), 3, array(
                  'id' => 'department',
                  'class' => 'selectpicker form-control',
                  'data-live-search' => 'true'
                )) }}
              </div>

              <div class="form-group">
                <label for="designation">Designation</label>
                {{ Form::select('designation_id', App\Designation::where('department_id', App\Department::first()->id)->pluck('designation_name', 'id'), 3, array(
                  'id' => 'designation',
                  'class' => 'selectpicker form-control',
                  'data-live-search' => 'true'
                )) }}
              </div>

              <div class="form-group">
                <label for="role">Role</label>
                {{ Form::select('role', $roles, 3, array(
                  'id' => 'role',
                  'class' => 'selectpicker form-control',
                  'data-live-search' => 'true'
                )) }}
              </div>

              <div class="row m-t-20">
                <div class="col-xs-12">
                  <a href="{{ url('admin/employee') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Add Employee</button>
                </div>
              </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer-scripts')
  <script>
    $(document).ready(function () {
      $("#department").change(function () {
        var department_id = $(this).val();
        $_token = "{{ csrf_token() }}";
        
        $.ajax({
          headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
          url: "{{ route('admin.get-designation') }}",
          type: 'POST',
          cache: false,
          data: { 'department_id': department_id, '_token': $_token },
          datatype: 'html',
          success: function(data) {
            $("#designation").html(data.html).selectpicker('refresh');
          }
        });
      });
    });
  </script>
@endsection