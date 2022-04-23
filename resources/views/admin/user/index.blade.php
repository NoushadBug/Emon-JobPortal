@extends('layouts.admin.admin-layouts')
@section('page-title','Admin-Dashboard | LaraStarter')
@push('page-css')
<!-- DataTables -->
<link href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/backend/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/backend/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style>
  .avater img{
    object-fit: cover;
  }
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
              <i class="icon-people"></i> Users</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.create.user')}}" class="btn btn-dark">
                    <i class="fa fa-plus-circle"></i>
                    <span>Create User</span>
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
                      <th>Email</th>
                      <th>Status</th>
                      <th>Joined At</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $key=>$user)
                    <tr>
                      <td>#{{ $key + 1 }}</td>
                      <td class="d-flex">
                        <div class="avater">
                          @isset($user->profile_photo)
                          <img width="40" height="40" class="rounded-circle"
                          src="{{ asset('users/profile-pic/'. $user->profile_photo) }}" alt="user-avatar">
                          @else
                          <img width="40" height="40" class="rounded-circle"
                          src="{{ asset('default-avater/default.png') }}" alt="default-avatar">
                          @endisset
                        </div>
                        <div class="ml-2">
                          <div>{{ $user->name }}</div>
                          @if ($user->role)
                            <span class="badge badge-info text-uppercase">{{ $user->role->name }}</span>
                          @else
                            <span class="badge badge-danger text-uppercase">No role found :(</span>
                          @endif
                        </div>
                      </td>
                      <td>{{ $user->email }}</td>
                      <td>
                        @if($user->status == true)
                          <span class="badge badge-info">Active</span>
                        @else
                          <span class="badge badge-danger">Inactive</span>
                        @endif
                      </td>
                      <td>{{ $user->created_at->diffForHumans() }}</td>
                      <td class="btn-group action-button">
                        <a href="" class="btn btn-dark btn-sm">
                          <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" onclick="deleteData()" class="btn btn-danger rounded-right btn-sm">
                          <i class="fa fa-trash-o"></i>
                        </button>
                        <form id="delete-form-" action="" method="POST" style="display: none;">
                          @csrf
                          @method('DELETE')
                        </form>
                      </td>
                    </tr>
                    @endforeach
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
