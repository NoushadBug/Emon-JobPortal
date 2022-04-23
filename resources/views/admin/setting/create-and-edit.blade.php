@extends('layouts.admin.admin-layout')
@section('page-title','Admin-Dashboard | LaraStarter')
@push('page-css')
<!--Form Wizard-->
<!-- form Uploads -->
<link href="{{ asset('assets/backend/plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/plugins/jquery.steps/demo/css/jquery.steps.css') }}">
<style>
  .page-title-box{
    padding: 14px 20px !important;
  }
  .nav-pills .nav-link.active {
    background-color: #2B3D51 !important;
  }
  .list-group-item.active {

    border-color: #2B3D51; !important
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
              <h4 class="page-title float-left"><i class="icon-settings"></i> Settings</h4>
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
        <div class="col-4">
          <div class="card-box p-0">
            <div class="nav flex-column nav-pills list-group" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active list-group-item" id="v-pills-setting-tab" data-toggle="pill" href="#v-pills-setting" role="tab" aria-controls="v-pills-setting" aria-selected="true"><strong>Setting</strong></a>
              <a class="nav-link list-group-item" id="v-pills-appearance-tab" data-toggle="pill" href="#v-pills-appearance" role="tab" aria-controls="v-pills-appearance" aria-selected="true"><strong>Appearance</strong></a>
              <a class="nav-link list-group-item" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><strong>Mail</strong></a>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="card-box">
            <h5 class="header-title text-upper">How To User :</h5>
            <p>You can get the value of each setting anywhere on your site by calling <span class="text-danger">Setting ('Key')</span></p>
          </div>
          <div class="card-box">
            <div class="tab-content" id="v-pills-tabContent">
              <!-- Generel Settings Part -->
              <div class="tab-pane fade show active" id="v-pills-setting" role="tabpanel" aria-labelledby="v-pills-setting-tab">
                <form action="{{ route('admin.setting.generel.update') }}" method="post">
                    @csrf
                    @method('put')
                    <fieldset class="form-group">
                        <label for="site_title">Site Titile <span class="text-danger">{ Key : site_title }</span></label>
                        <input type="text" class="form-control @error('site_title') is-invalid @enderror" value="{{ setting('site_title') ?? old('site_title') }}" id="site_title" name="site_title" >
                        @error('site_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="site_description">Description <span class="text-danger">{ Key : site_description }</span></label>
                        <textarea type="text" class="form-control @error('site_description') is-invalid @enderror" id="site_description" name="site_description">{{ setting('site_description') ?? old('site_description') }}</textarea>
                        @error('site_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="site_address">Site Address <span class="text-danger">{ Key : site_address }</span></label>
                        <input type="text" class="form-control @error('site_address') is-invalid @enderror" value="{{ setting('site_address') ?? old('site_address') }}" id="site_address" name="site_address">
                        @error('site_address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <button type="submit" class="btn btn-dark">
                        <i class="icon-arrow-up-circle"></i>
                        <span>Update</span>
                    </button>
                </form>
              </div>
              <!-- Appearance Part -->
              <div class="tab-pane fade" id="v-pills-appearance" role="tabpanel" aria-labelledby="v-pills-appearance-tab">
                <form action="{{ route('admin.setting.appearance.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-6">
                            <fieldset class="form-group">
                                <label for="site_favicon">Site Favicon <span class="text-danger">{ Key : site_favicon }</span></label>
                                <input type="file" name="site_favicon" class="dropify" data-default-file="{{ setting('site_favicon') != null ? Storage::url(setting('site_favicon')) : '' }}" data-max-file-size="1M" />
                            </fieldset>
                        </div>
                        <div class="col-6">
                            <fieldset class="form-group">
                                <label for="site_logo">Site Logo <span class="text-danger">{ Key : site_logo }</span></label>
                                <input type="file" name="site_logo" class="dropify" data-default-file="{{ setting('site_logo') != null ? Storage::url(setting('site_logo')) : ''}}" data-max-file-size="1M" />
                            </fieldset>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">
                        <i class="icon-arrow-up-circle"></i>
                        <span>Update</span>
                    </button>
                </form>
              </div>
              <!-- Mail -->
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <form action="{{ route('admin.setting.mail.update') }}" method="post">
                  @csrf
                  @method('put')
                  <div class="row">
                    <div class="col-6">
                      <fieldset class="form-group">
                        <label for="mail_mailer">MAIL_MAILER <span class="text-danger">{ Key : mail_mailer }</span></label>
                        <input type="text" class="form-control @error('mail_mailer') is-invalid @enderror" value="{{ setting('mail_mailer') ?? old('mail_mailer') }}" id="mail_mailer" name="mail_mailer" placeholder="ex: smpt" >
                        @error('mail_mailer')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </fieldset>
                    </div>
                    <div class="col-6">
                      <fieldset class="form-group">
                        <label for="mail_host">MAIL_HOST <span class="text-danger">{ Key : mail_host }</span></label>
                        <input type="text" class="form-control @error('mail_host') is-invalid @enderror" value="{{ setting('mail_host') ?? old('mail_host') }}" id="mail_host" name="mail_host" placeholder="ex: smtp.gmail.com">
                        @error('mail_host')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </fieldset>
                    </div>
                    <div class="col-6">
                      <fieldset class="form-group">
                        <label for="mail_port">MAIL_PORT <span class="text-danger">{ Key : mail_port }</span></label>
                        <input type="text" class="form-control @error('mail_port') is-invalid @enderror" value="{{ setting('mail_port') ?? old('mail_port') }}" id="mail_port" name="mail_port" placeholder="ex: 587">
                        @error('mail_port')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </fieldset>
                    </div>
                    <div class="col-6">
                      <fieldset class="form-group">
                        <label for="mail_username">MAIL_USERNAME <span class="text-danger">{ Key : mail_username }</span></label>
                        <input type="email" class="form-control @error('mail_username') is-invalid @enderror" value="{{ setting('mail_username') ?? old('mail_username') }}" id="mail_username" name="mail_username" placeholder="ex: example@gmail.com">
                        @error('mail_username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </fieldset>
                    </div>
                    <div class="col-6">
                      <fieldset class="form-group">
                        <label for="mail_password">MAIL_PASSWORD <span class="text-danger">{ Key : mail_password }</span></label>
                        <input type="password" class="form-control @error('mail_password') is-invalid @enderror" value="{{ setting('mail_password') ?? old('mail_password') }}" id="mail_password" name="mail_password" placeholder="*****">
                        @error('mail_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </fieldset>
                    </div>
                    <div class="col-6">
                      <fieldset class="form-group">
                        <label for="mail_encryption">MAIL_ENCRYPTION <span class="text-danger">{ Key : mail_encription }</span></label>
                        <input type="text" class="form-control @error('mail_encryption') is-invalid @enderror" value="{{ setting('mail_encryption') ?? old('mail_encryption') }}" id="mail_encryption" name="mail_encryption" placeholder="ex: tls">
                        @error('mail_encryption')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </fieldset>
                    </div>
                  </div>
                    <fieldset class="form-group">
                      <label for="mail_from_address">MAIL_FROM_ADDRESS <span class="text-danger">{ Key : mail_from_address }</span></label>
                      <input type="email" class="form-control @error('mail_from_address') is-invalid @enderror" value="{{ setting('mail_from_address') ?? old('mail_from_address') }}" id="mail_from_address" name="mail_from_address" placeholder="ex: example@mail.com">
                      @error('mail_from_address')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </fieldset>
                  <button type="submit" class="btn btn-dark">
                    <i class="icon-arrow-up-circle"></i>
                    <span>Update</span>
                  </button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- container -->
  </div>
  <!-- content -->





@endsection
@push('page-js')
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

