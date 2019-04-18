@extends('layouts.app')

@section('content')
  <section class="wrapper-bottom-sec">
    <div class="p-30">
      <h2 class="page-title">Employee</h2>
    </div>
    <div class="p-30 p-t-none p-b-none">
      @if (session()->get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          {{ session()->get('success') }}
        </div>
      @endif

      @if (count($errors) > 0)
        @foreach ($errors->all() as $message)
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{ $message }}
          </div>
        @endforeach
      @endif
      <div class="row">
        <div class="col-lg-4">
          <div class="panel">
            <div class="panel-body p-t-20">
              <div class="text-center">
                <div class="thumbnail m-b-none">
                  <img class="initial-image img-responsive" data-name="{{ $user_info->name }}" width="280px" height="280px">
                </div>
              </div>
              <div class="m-t-20">
                <h3 class="bold font-color-1 text-center m-b-20">{{ $user_info->name }}</h3>
                <ul class="info-list">
                  <li><span class="info-list-title">Employee ID</span><span>{{ $user_info->id }}</span></li>
                  <li><span class="info-list-title">Email</span><span>{{ $user_info->email }}</span></li>
                  <li><span class="info-list-title">Department</span><span>{{ $user_info->designation->department->department_name }}</span></li>
                  <li><span class="info-list-title">Designation</span><span>{{ $user_info->designation->designation_name }}</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          {{ Form::open(array('url' => route('admin.employee.update', ['id' => $user_info->id]), 'method' => 'put', 'autocomplete' => 'off')) }}
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation"class="active"><a href="#personal_details" aria-controls="personal" role="tab" data-toggle="tab">Personal Details</a></li>
              <li role="presentation"><a href="#emergency_details" aria-controls="emergency" role="tab" data-toggle="tab">Emergency Details</a></li>
              <li role="presentation"><a href="#company_information" aria-controls="company" role="tab" data-toggle="tab">Company Information</a></li>
              <!-- <li role="presentation"><a href="#document" aria-controls="document" role="tab" data-toggle="tab">Document</a></li> -->
              <li role="presentation"><a href="#user_account" aria-controls="document" role="tab" data-toggle="tab">User Account</a></li>
            </ul>

            <div class="tab-content panel p-20">

                <!-- Personal Details -->
                <div role="tabpanel" class="tab-pane active" id="personal_details">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>First Name</label>
                        <span class="help">required</span>
                        {{ Form::text('first_name', $user_info->profile->first_name, array('class' => 'form-control', 'required' => true)) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Last Name</label>
                        <span class="help">required</span>
                        {{ Form::text('last_name', $user_info->profile->last_name, array('class' => 'form-control', 'required' => true)) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Gender</label>
                        {{ Form::select('gender', array('male' => 'Male', 'female' => 'Female'), $user_info->profile->gender, array('class' => 'form-control selectpicker')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        {{ Form::text('birthdate', $user_info->profile->birthdate, array('class' => 'form-control datepicker')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Email</label>
                        <span class="help">required</span>
                        {{ Form::text('email', $user_info->email, array('class' => 'form-control')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Phone</label>
                        {{ Form::text('phone', $user_info->profile->phone, array('class' => 'form-control')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>TIN</label>
                        {{ Form::text('tin_id', $user_info->profile->tin_id, array('class' => 'form-control')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>SSS</label>
                        {{ Form::text('sss_id', $user_info->profile->sss_id, array('class' => 'form-control')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>PAG-IBIG</label>
                        {{ Form::text('pagibig_id', $user_info->profile->pagibig_id, array('class' => 'form-control')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>PHILHEALTH</label>
                        {{ Form::text('philhealth', $user_info->profile->philhealth, array('class' => 'form-control')) }}
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Address</label>
                        {{ Form::textarea('address', $user_info->profile->address, array('class' => 'form-control', 'autocomplete' => 'off')) }}
                      </div>
                    </div>
                    <div class="col-lg-12">
                      {{ Form::submit('Update', array('class' => 'btn btn-primary pull-right')) }}
                    </div>
                  </div>
                </div>

                <!-- Emergency Details -->
                <div role="tabpanel" class="tab-pane" id="emergency_details">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Contact Person Name</label>
                        {{ Form::text('emergency_person', $user_info->profile->emergency_person, array('class' => 'form-control')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Contact Number</label>
                        {{ Form::text('emergency_phone', $user_info->profile->emergency_phone, array('class' => 'form-control')) }}
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Address</label>
                        {{ Form::textarea('emergency_address', $user_info->profile->emergency_address, array('class' => 'form-control')) }}
                      </div>
                    </div>
                    <div class="col-lg-12">
                      {{ Form::submit('Update', array('class' => 'btn btn-primary pull-right')) }}
                    </div>
                  </div>
                </div>

                <!-- Company Info -->
                <div role="tabpanel" class="tab-pane" id="company_information">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Date Hired</label>
                        {{ Form::text('date_hired', $user_info->profile->date_hired, array('class' => 'form-control datepicker')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Employment Status</label>
                        {{ Form::select('employment_status', ['regular' => 'Regular', 'probationary' => 'Probationary', 'freelance' => 'Freelance', 'resigned' => 'Resigned'], $user_info->profile->employment_status, array('class' => 'form-control selectpicker')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Department</label>
                        {{ Form::select('department', App\Department::pluck('department_name', 'id'), $user_info->designation->department->id, array('id' => 'department', 'class' => 'form-control selectpicker')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Designation</label>
                        {{ Form::select('designation_id', App\Designation::where('department_id', $user_info->designation->department->id)->pluck('designation_name', 'id'), $user_info->designation->id, array('id' => 'designation', 'class' => 'form-control selectpicker')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Role</label>
                        {{ Form::select('role', $roles, $user_info->roles()->first()->id, array('class' => 'form-control selectpicker')) }}
                      </div>
                    </div>
                    <div class="col-lg-12">
                      {{ Form::submit('Update', array('class' => 'btn btn-primary pull-right')) }}
                    </div>
                  </div>
                </div>

                <!-- User Account -->
                <div role="tabpanel" class="tab-pane" id="user_account">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Change Password</label>
                        {{ Form::password('change_password', array('class' => 'form-control')) }}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Change Password</label>
                        {{ Form::password('confirm_password', array('class' => 'form-control')) }}
                      </div>
                    </div>
                  </div>
                </div>

            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </section>
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