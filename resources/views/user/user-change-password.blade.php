@extends('layouts.website.website-layouts')
@section('page-title')
{{ Auth::user()->name }} | Change Password
@endsection
@push('page-style')
<link rel="stylesheet" href="{{ asset('assets/website/css/company-user-dashboard.css') }}">
@endpush
@section('page-content')
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <!-- User Sidebar -->
          @include('layouts.user.user-sidebar')
        </div>
        <div class="col-md-8">
          <!-- Edit Profile Tab -->
          <div class="card p-3">
            <form action="{{ route('user.update.password') }}" method="POST">
              @csrf
              @method('put')
              <h5 class="pb-2"><b>Change Password</b></h5>
              <div class="mb-3">
                <label for="current_password" class="form-label">Old Password</label>
                <input type="password" class="form-control" name="current_password" id="current_password">
              </div>
              <div class="row"> 
                <div class="col-md-6 mb-3">
                  <label for="password" class="form-label">New Passowrd</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="password_confirmation" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <button type="submit" class="btn site-btn"><i class="fal fa-arrow-circle-up"></i> Update</button>
            </form>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('page-script')
@endpush