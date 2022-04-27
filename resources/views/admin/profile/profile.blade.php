@extends('layouts.admin.admin-layouts')
@section('page-title','Profile')
@push('page-css')
<!-- form Uploads -->
<link href="{{ asset('assets/backend/plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
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
              <h4 class="page-title float-left"><i class="icon-user"></i> Profile Edit</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
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
          <form  method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-7">
                <div class="card-box">
                    <h5 class="header-title text-upper">User Info</h5>
                    <fieldset class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" value="{{ $auth_user->name }}" id="name" name="name">
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" value="{{ $auth_user->email }}" id="email" name="email">
                    </fieldset>
                    <button type="submit" class="btn btn-success">
                      <i class="fa fa-arrow-circle-o-up"></i>
                      <span>Update</span>
                  </button>
                </div>
              </div>
              <div class="col-md-5">
                <div class="card-box">
                  <h4 class="header-title">Upload User Avater</h4>
                  <input type="file" name="profile_photo" class="dropify" data-default-file="{{ Auth::user()->profile_photo != null ? asset('users/profile-pic/'. $auth_user->profile_photo) : asset('default-avater/default.png') }}" data-max-file-size="2M" />
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

