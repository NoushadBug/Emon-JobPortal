@extends('layouts.admin.admin-layouts')
@section('page-title','Admin-Dashboard | LaraStarter')
@push('page-css')
<style>
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
              <h4 class="page-title float-left"><i class="icon-check"></i> Roles
              </h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.role') }}" class="btn btn-danger">
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
            <div class="card-box">
              <h5 class="text-upper">Manage Roles</h5>
              <form id="roleFrom" role="form" method="POST" action="">
                <fieldset class="form-group">
                  <label for="name">Role Name</label>
                  <input type="name" class="form-control" value="" id="name" name="name">
                  {{-- @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $mssage }}</strong>
                  </span>
                  @enderror --}}
                </fieldset>
                <div class="text-center">
                  <h5 class="pt-2 pb-3">Manage Permission For Role</h5>
                  {{-- @error('permission')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $mssage }}</strong>
                  </span>
                  @enderror --}}
                </div>
                <div class="checkbox checkbox-success">
                  <input type="checkbox" id="select-all">
                  <label for="select-all" class="form-label"><strong>Select All</strong></label>
                </div>


                <div class="form-row">

                  <div class="col">
                    <h6 class="pb-2">Module :</h6>
                    <div class="checkbox checkbox-success mb-3 ml-4">
                      <input type="checkbox" id="permission" name="permissions[]" value="">
                      <label for="permission-" class="form-label"></label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <h5>Modules Not Found :(</h5>
                  </div>
                </div>


                <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus-circle"></i>
                    <span>Create</span>
                </button>
              </form>
            </div>
        </div>
      </div>
    <!-- end row -->
    </div> <!-- container -->
  </div>
  <!-- content -->
@endsection

@push('page-js')
<script type="text/javascript">
  // Listen for click on toggle checkbox
  $('#select-all').click(function (event) {
      if (this.checked) {
          // Iterate each checkbox
          $(':checkbox').each(function () {
              this.checked = true;
          });
      } else {
          $(':checkbox').each(function () {
              this.checked = false;
          });
      }
  });
</script>
@endpush
