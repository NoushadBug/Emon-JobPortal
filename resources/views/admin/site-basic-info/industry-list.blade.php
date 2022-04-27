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
            <h5 class="mb-0">Industry</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Industry</li>
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
              <a href="{{ route('admin.industry.create') }}" class="btn btn-info btn-sm mb-3">
                <i class="fas fa-plus-circle"></i> Create Industry
              </a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#SL</th>
                  <th>Industry Name</th>
                  <th>Status</th>
                  <th>Creation Time</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($industries as $key=>$industry)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $industry->industry_name }}</td>
                  <td>
                    <input type="checkbox" {{ isset($industry) ? $industry->status == 1 ? 'checked' : '' : '' }} name="status" data-bootstrap-switch data-off-color="danger" data-on-color="info" disabled>
                  </td>
                  <td>{{ $industry->created_at->diffForHumans() }}</td>
                  <td>
                    <a href="{{ route('admin.industry.edit',$industry->id) }}" class="btn btn-info btn-sm">
                      <span>Edit</span>
                      <i class="fas fa-edit"></i>
                    </a>
                    <button type="button" onclick="deleteData({{ $industry->id }})"  class="btn btn-danger rounded-right btn-sm">
                      <span>Delete</span>
                      <i class="fas fa-trash-alt"></i>
                    </button>
                    <form id="delete-form-{{ $industry->id }}" action="{{ route('admin.industry.destroy', $industry->id) }}" method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                  </td>
                </tr>
                @endforeach
              </table>
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
  <!-- DataTables -->
  <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  </script>

 <!-- Sweet Aleart Js -->
 <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
 <script type="text/javascript">
   function deleteData(id) {
     swal({
       title: 'Are you sure?',
       text: "You won't be able to revert this!",
       type: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Yes, delete it!',
       cancelButtonText: 'No, cancel!',
       confirmButtonClass: 'btn btn-success',
       cancelButtonClass: 'btn btn-danger',
       buttonsStyling: false,
       reverseButtons: true
     }).then((result) => {
       if (result.value) {
           event.preventDefault();
           document.getElementById('delete-form-'+id).submit();
       } else if (
           // Read more about handling dismissals
           result.dismiss === swal.DismissReason.cancel
       ) {
           swal(
               'Cancelled',
               'Your data is safe :)',
               'error'
           )
       }
     })
   }
 </script>
 <!-- Bootstrap Switch -->
 <script src="{{ asset('assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
 <script>
   $("input[data-bootstrap-switch]").each(function(){
     $(this).bootstrapSwitch('state', $(this).prop('checked'));
   });
 </script>
@endpush