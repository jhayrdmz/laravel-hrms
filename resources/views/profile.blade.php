@extends('layouts.app')

@section('content')
  <section class="wrapper-bottom-sec">
    <div class="p-30">
      <h2 class="page-title">My Profile</h2>
    </div>
    <div class="p-30 p-t-none p-b-none">
      <div class="row">
        <div class="col-lg-4">
          <div class="panel panel-30 p-t-30">
            <div class="panel-body">
              <div class="text-center">
              <div class="thumbnail m-b-none">
                <img class="initial-image img-responsive" id="photo" data-name="{{ $user_info->name }}" width="280px" height="280px">
              </div>
            </div>
            <div class="m-t-20">
              <h3 class="bold font-color-1 text-center m-b-20">{{ $user_info->name }}</h3>
              <ul class="info-list">
                <li><span class="info-list-title">Employee ID</span><span class="info-list-des">{{ $user_info->id }}</span></li>
                <li><span class="info-list-title">Email</span><span class="info-list-des">{{ $user_info->email }}</span></li>
                <li><span class="info-list-title">Department</span><span class="info-list-des">{{ $user_info->designation->department->department_name }}</span></li>
                <li><span class="info-list-title">Designation</span><span class="info-list-des">{{ $user_info->designation->designation_name }}</span></li>
              </ul>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"class="active"><a href="#personal_details" aria-controls="personal" role="tab" data-toggle="tab">Personal Details</a></li>
            <li role="presentation"><a href="#emergency_details" aria-controls="emergency" role="tab" data-toggle="tab">Emergency Details</a></li>
            <li role="presentation"><a href="#company_information" aria-controls="company" role="tab" data-toggle="tab">Company Information</a></li>
          </ul>

          <div class="tab-content panel p-20">

            <!-- Personal Details -->
            <div role="tabpanel" class="tab-pane active" id="personal_details">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>First Name</label>
                    {{ Form::text(null, $user_info->profile->first_name, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Last Name</label>
                    {{ Form::text(null, $user_info->profile->last_name, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Gender</label>
                    {{ Form::text(null, ucwords($user_info->profile->gender), array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Date of Birth</label>
                    {{ Form::text(null, $user_info->profile->birthdate, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Email</label>
                    {{ Form::text(null, $user_info->email, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Phone</label>
                    {{ Form::text(null, $user_info->profile->phone, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>TIN</label>
                    {{ Form::text(null, $user_info->profile->tin_id, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>SSS</label>
                    {{ Form::text(null, $user_info->profile->sss_id, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>PAG-IBIG</label>
                    {{ Form::text(null, $user_info->profile->pagibig_id, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>PHILHEALTH</label>
                    {{ Form::text(null, $user_info->profile->philhealth, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Address</label>
                    {{ Form::textarea(null, $user_info->profile->address, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
              </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="emergency_details">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Contact Person Name</label>
                    {{ Form::text(null, $user_info->profile->emergency_person, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Contact Number</label>
                    {{ Form::text(null, $user_info->profile->emergency_phone, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Address</label>
                    {{ Form::textarea(null, $user_info->profile->emergency_address, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
              </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="company_information">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Date Hired</label>
                    {{ Form::text(null, $user_info->profile->date_hired, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Employment Status</label>
                    {{ Form::text(null, ucwords($user_info->profile->employment_status), array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Department</label>
                    {{ Form::text(null, $user_info->designation->department->department_name, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Designation</label>
                    {{ Form::text(null, $user_info->designation->designation_name, array('class' => 'form-control', 'readonly' => true)) }}
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="profile-photo-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
          <div>
            <img id="modal-profile-crop-image" src="" style="max-width: 100%;">
          </div>
          <div class="crop-controls text-center m-t-10">
            <div class="btn-group">
              <button class="btn btn-primary" data-method="zoom" data-option="0.1">
                <span class="fa fa-plus-circle"></span>
              </button>
              <button class="btn btn-primary" data-method="zoom" data-option="-0.1">
                <span class="fa fa-minus-circle"></span>
              </button>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('css-styles')
  <link rel="stylesheet" href="{{ asset('public/css/cropper.css') }}">
@endsection

@section('footer-scripts')
  <script src="{{ asset('public/js/cropper.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('.crop-controls').on('click', 'button', function() {
        var data = $(this).data();
        $('#modal-profile-crop-image').cropper(data.method, data.option);
      });

      $('#upload-photo-btn').on('click', function() {
        $('#profile-photo-trigger').trigger('click');
      });

      $('#profile-photo-modal').on('hidden.bs.modal', function () {
        $('#modal-profile-crop-image').attr('src', '').cropper('destroy');
        $('#profile-photo-trigger').val('');
      });

      $('#profile-photo-modal').on('shown.bs.modal', function () {
        $('#modal-profile-crop-image').cropper({
          viewMode: 1,
          center: false,
          aspectRatio: 1,
          modal: true,
          scalable: false,
          rotatable: true,
          checkOrientation: true,
          zoomable: true,
          dragMode: 'move',
          guides: false,
          zoomOnTouch: false,
          zoomOnWheel: false,
          cropBoxMovable: false,
          cropBoxResizable: false,
          toggleDragModeOnDblclick: false,
          built: function() {
            var $image, container, cropBoxHeight, cropBoxWidth;
            $image = $(this);
            container = $image.cropper('getContainerData');
            cropBoxWidth = _this.cropBoxWidth;
            cropBoxHeight = _this.cropBoxHeight;
            return $image.cropper('setCropBoxData', {
              width: cropBoxWidth,
              height: cropBoxHeight,
              left: (container.width - cropBoxWidth) / 2,
              top: (container.height - cropBoxHeight) / 2
            });
          }
        });
      });
    });

    function imgchange(input) {
      reader = new FileReader;
      reader.onload = (function(e) {
        $('#modal-profile-crop-image').attr('src', e.target.result);
        $('#profile-photo-modal').modal('show');
      });
      reader.readAsDataURL(input.files[0]);
    };
  </script>
@endsection