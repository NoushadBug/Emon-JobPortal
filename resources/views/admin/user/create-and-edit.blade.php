@extends('layouts.admin.admin-layouts')
@section('page-title','Admin-Dashboard | LaraStarter')
@push('page-css')
<!-- form Uploads -->
<link href="{{ asset('assets/backend/plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Switchery css -->
<link href="{{ asset('assets/backend/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
<style>
  .switchery-demo .switchery {
    margin-bottom: 5px;
  }
  .page-title-box{
    padding: 14px 20px !important;
  }
</style>
@endpush
@section('page-content')
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="page-title-box">
            <div class="d-flex justify-content-between align-items-center text-muted">
              <h4 class="page-title float-left"><i class="icon-people"></i> Users</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.user') }}" class="btn btn-danger">
                    <i class="fa fa-arrow-circle-o-left"></i>
                    <span>Back to list</span>
                  </a>
                </li>
              </ol>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-12">
          <form id="roleFrom" role="form" method="POST" action="#" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-7">
                <div class="card-box">
                    <h5 class="header-title text-upper">User Info</h5>
                    <fieldset class="form-group">
                      <label for="name">Name</label>
                      <input type="name" class="form-control" value="" id="name" name="name">
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" value="" id="email" name="email">
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="confirm_password">Confirm Password</label>
                      <input type="password" class="form-control" id="confirm_password" password="password_confirmation">
                    </fieldset>
                </div>
              </div>
              <div class="col-md-5">
                <div class="card-box">
                  <label class="control-label text-muted">Select Role</label>
                  <select class="form-control select2" name="role">
                      <option value="">Option 1</option>
                  </select>
                </div>
                <div class="card-box">
                  <h4 class="header-title">Upload User Avater</h4>
                  <input type="file" name="profile_photo" class="dropify" data-default-file="" data-max-file-size="1M" />
                  <div class="switchery-demo m-t-20">
                    <input type="checkbox"  data-plugin="switchery" id="status" name="status" data-color="#1bb99a" data-size="small"/>
                    <label class="control-label" for="status">Status</label>
                  </div>
                  <button type="submit" class="btn btn-success">
                      <i class="fa fa-plus-circle"></i>
                      <span>Create</span>

                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>



    <!-- end row -->
    </div> <!-- container -->
  </div>
  <!-- content -->
@endsection
@push('page-js')
<!-- Select Js -->
<script src="{{ asset('assets/backend/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/backend/pages/jquery.formadvanced.init.js') }}"></script>
<!-- Switchery -->
<script src="{{ asset('assets/backend/plugins/switchery/switchery.min.js') }}"></script>

<!-- file uploads js -->
<script src="{{ asset('assets/backend/plugins/fileuploads/js/dropify.min.js') }}"></script>
<script>
  $('.dropify').dropify({
      messages: {
          'default': 'Drag and drop a file here or click',
          'replace': 'Drag and drop or click to replace',
          'remove': 'Remove',
          'error': 'Ooops, something wrong appended.'
      },
      error: {
          'fileSize': 'The file size is too big (1M max).'
      }
  });
</script>
@endpush

