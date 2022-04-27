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
            <h5 class="mb-0">Category</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
              <a href="{{ route('admin.category.index') }}" class="btn btn-info btn-sm"><i class="fas fa-arrow-alt-circle-left"></i> Back To Categoy List</a>
              <form action="{{ isset($category) ? route('admin.category.update', $category->id) : route('admin.category.store') }}" method="POST">
                @csrf
                @isset($category)
                  @method('put')
                @endisset
                <div class="modal-header">
                  <h4 class="modal-title">Create Categoy</h4>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="categoy" class="form-label">Ctegoy Name</label>
                    <input type="text" name="category_name" id="categoy" class="form-control @error('category_name') is-invalid @enderror" placeholder="Categoy Name" value="{{ isset($category) ? $category->category_name : '' }}" required>
                    @error('category_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <input type="checkbox" {{ isset($category) ? $category->status == 1 ? 'checked' : '' : '' }} name="status" data-bootstrap-switch data-off-color="danger" data-on-color="info">
                </div>
                <div class="modal-footer justify-content-between">
                  @isset($category)
                    <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-up"></i> Update Categoy</button>
                  @else
                    <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-paper-plane"></i> Save Categoy</button>
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