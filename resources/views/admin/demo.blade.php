@extends('layouts.admin.admin-layout')
@section('title', 'Dashboard')
@push('page-style')
  
@endpush
@section('page-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Demo</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Demo</li>
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
          <div class="card-header">
            <h3 class="card-title">
              <a href="javascript:void(0)" class="btn btn-info btn-sm">
                <i class="fas fa-arrow-alt-circle-left"></i>
                <span>Back To List</span>
              </a>
            </h3>
          </div>
          <div class="card-body">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam sed quasi minima amet debitis quaerat non, et repudiandae. Tempore consectetur optio repellat modi fuga, assumenda ducimus adipisci ab accusamus nam!
          </div>
          <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection

@push('page-js')
    
@endpush