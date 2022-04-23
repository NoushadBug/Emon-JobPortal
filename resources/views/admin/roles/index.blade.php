@extends('layouts.admin.admin-layouts')
@section('page-title','Admin-Dashboard | LaraStarter')
@push('page-css')
<!-- DataTables -->
<link href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/backend/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/backend/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
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
              <h4 class="page-title float-left">
              <i class="icon-check"></i> Roles</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.create.role') }}" class="btn btn-dark">
                    <i class="fa fa-plus-circle"></i>
                    <span>Create Role</span>
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
            <div class="card-box table-responsive">
              <table id="responsive-datatable" class="table dt-responsive nowrap table-striped" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                      <th>#SL</th>
                      <th>Name</th>
                      <th>Permission</th>
                      <th>Updated At</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>#1</td>
                      <td>Azhar Raihan</td>
                      <td>Access Dashboard</td>
                      <td>2 days ago</td>
                      <td class="btn-group">
                        <a href="#" class="btn btn-dark btn-sm">
                          <i class="fa fa-edit"></i>
                        </a>
                          <button type="button" onclick="deleteData()" class="btn btn-danger btn-sm rounded-right">
                            <i class="fa fa-trash-o"></i>
                          </button>
                          <form id="delete-form-" action="#" method="POST" style="display: none;">
                          </form>
                      </td>
                    </tr>
                  </tbody>
              </table>
            </div>
        </div>
    </div>
    <!-- end row -->
    </div> <!-- container -->
  </div>
  <!-- content -->
@endsection
@push('page-js')



  <!-- Required datatable js -->
  <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Responsive examples -->
  <script src="{{ asset('assets/backend/plugins/datatables/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/backend/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
  <!-- Selection table -->
  <script src="{{ asset('assets/backend/plugins/datatables/dataTables.select.min.js') }}"></script>
  <script>
    $(document).ready(function() {
        // Default Datatable
        $('#datatable').DataTable();
        // Responsive Datatable
        $('#responsive-datatable').DataTable();
        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );
  </script>
@endpush
