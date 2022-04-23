@extends('layouts.admin.admin-layout')
@section('page-title','Admin-Dashboard | LaraStarter')
@push('page-css')
@endpush
@section('page-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5>Update Password</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Update Password</li>
                </ol>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
          <div class="card-body">
            <form  method="POST" action="{{ route('admin.password.update') }}">
                @csrf
                @method('PUT')
                <div class="row">
                <div class="col-md-7">
                    <div class="card-box">
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-arrow-circle-up"></i>
                            <span>Update</span>
                        </button>
                    </div>
                </div>
                </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
  </div>






@endsection
@push('page-js')
@endpush

