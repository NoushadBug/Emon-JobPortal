@extends('layouts.admin.admin-layout')
@section('title', 'Admin-Dashboard')
@push('page-css')
  <style>
    .info-box-icon img{
      object-fit: cover;
    }
  </style>
@endpush
@section('page-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Posted Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posted Jobs</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <a href="{{ route('admin.company.index') }}" class="btn btn-info btn-sm">
                <i class="fas fa-arrow-alt-circle-left"></i>
                <span>Back To List</span>
              </a>
            </h3>
          </div>
          <div class="card-body">
            <h4 class="pt-2 pb-3 text-center">{{ $company->company_name }} All Posted Jobs</h4>
            <div class="row">
              @foreach ($company->jobPost as $jPost)
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box">
                  <div class="inner">
                    <p>{{ $jPost->job_title }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="wi-item">
                        <span  class="{{ $jPost->is_published == 1 ? 'bg-gradient-info' : 'bg-gradient-warning' }} px-2 py-1">
                          <i class="fas {{ $jPost->is_published == 1 ? 'fa-check-circle' : 'fa-spinner' }} mr-1"></i>
                          <span>{{ $jPost->is_published == 1 ? 'Approved' : 'Pending' }}</span>
                        </span>
                      </div>
                      <img src="{{ asset('uploads/job-thumbnail/'. $jPost->job_thumbnail) }}" alt="{{ $jPost->job_title }}" height="40" width="40">
                    </div>
                  </div>
                  <a href="{{ route('admin.company.show.job', $jPost->id) }}" class="small-box-footer bg-info">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('page-js')
    
@endpush