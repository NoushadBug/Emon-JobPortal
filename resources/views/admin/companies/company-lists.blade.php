@extends('layouts.admin.admin-layout')
@section('title', 'Company Lists')
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
            <h5 class="mb-0">Company Lists</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company Lists</li>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#SL</th>
                  <th>Company Name</th>
                  <th>Creation Time</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($companyLists) > 0)
                  @foreach ($companyLists as $key=>$company)
                  <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $company->company_name }}</td>
                    <td>{{ $company->created_at != null ? $company->created_at->diffForHumans() : '' }}</td>
                    <td>
                      <a href="{{ route('admin.company.posted.jobs',$company->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-upload"></i>
                        <span>Posted Jobs</span>
                      </a>
                      <a href="{{ route('admin.company.show',$company->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                        <span>Show Details</span>
                      </a>
                      <button type="button" onclick="deleteData({{ $company->id }})"  class="btn btn-danger rounded-right btn-sm">
                        <i class="fas fa-trash-alt"></i>
                        <span>Delete</span>
                      </button>
                      <form id="delete-form-{{ $company->id }}" action="{{ route('admin.company.destroy', $company->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                      </form>
                    </td>
                  </tr>
                  @endforeach
                @endif
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
@endpush