@extends('layouts.admin.admin-layout')
@section('title', 'Admin-dashboard')
@push('page-css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@section('page-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h5 class="mb-0">Thana</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thana</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <a href="{{ route('admin.thana.index') }}" class="btn btn-info btn-sm"><i class="fas fa-arrow-alt-circle-left"></i> Back To Thana List</a>
              <form action="{{ isset($thana) ? route('admin.thana.update', $thana->id) : route('admin.thana.store') }}" method="POST">
                @csrf
                @isset($thana)
                  @method('put')
                @endisset
                <div class="modal-header">
                  <h4 class="modal-title">Create Thana</h4>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="district" class="form-label">District Name</label>
                    <select name="district_id" id="district" class="form-control">
                      <option selected disabled>Select District</option>
                      @foreach ($districts as $district)
                        <option @isset($thana)
                        {{ $district->id == $thana->district_id ? 'selected' : '' }} @endisset value="{{ $district->id }}">{{ $district->district_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="thana" class="form-label">Thana Name</label>
                    <input type="text" name="thana_name" id="thana" class="form-control @error('thana_name') is-invalid @enderror" placeholder="Thana Name" value="{{ isset($thana) ? $thana->thana_name : '' }}" required>
                    @error('thana_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  @isset($thana)
                    <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-up"></i> Update Thana</button>
                  @else
                    <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-paper-plane"></i> Save Thana</button>
                  @endisset

                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





@endsection

@push('page-js')
  
@endpush