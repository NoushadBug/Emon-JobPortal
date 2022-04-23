@extends('layouts.website.website-layouts')
@section('page-title', '')
@push('page-style')
<link rel="stylesheet" href="{{ asset('assets/website/css/company-user-dashboard.css') }}">
<style>
  .card-element{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px 0px;
    border-top: 3px solid #C1000C;
    border-top-left-radius: 9px;
    border-top-right-radius: 9px;
  }
</style>
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
          <div class="card p-3">
            <form action="{{ route('user.store.resume') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <h5 class="pb-3 border-bottom"><b>Upload CV / Resume</b></h4>
              <div class="row">
                <div class="col-12 mb-3">
                  <label for="resume" class="form-label">Upload Resume</label>
                  <input type="file" class="form-control" name="resume" id="resume">
                </div>
              </div>
              <button type="submit" class="btn site-btn"><i class="fal fa-arrow-circle-up"></i> Upload</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('page-script')

@endpush