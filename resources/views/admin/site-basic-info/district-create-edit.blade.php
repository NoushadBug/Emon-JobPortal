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
            <h5 class="mb-0">District</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">District</li>
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
              <a href="{{ route('admin.district.index') }}" class="btn btn-info btn-sm"><i class="fas fa-arrow-alt-circle-left"></i> Back To District List</a>
              <form action="{{ isset($district) ? route('admin.district.update', $district->id) : route('admin.district.store') }}" method="POST">
                @csrf
                @isset($district)
                  @method('put')
                @endisset
                <div class="modal-header">
                  <h4 class="modal-title">Create District</h4>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="district" class="form-label">District Name</label>
                    <input type="text" name="district_name" id="district" class="form-control @error('district_name') is-invalid @enderror" placeholder="District Name" value="{{ isset($district) ? $district->district_name : '' }}" required>
                    @error('district_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <input type="checkbox" {{ isset($district) ? $district->status == 1 ? 'checked' : '' : '' }} name="status" data-bootstrap-switch data-off-color="danger" data-on-color="info">
                </div>
                <div class="modal-footer justify-content-between">
                  @isset($district)
                    <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-up"></i> Update District</button>
                  @else
                    <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-paper-plane"></i> Save District</button>
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
  <!-- Bootstrap Switch -->
<script src="{{ asset('assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script>
   $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>
@endpush