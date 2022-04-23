@extends('layouts.website.website-layouts')
@section('page-title', '')
@push('page-style')
<link rel="stylesheet" href="{{ asset('assets/website/css/company-user-dashboard.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
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
          @include('layouts.company.company-sidebar')
        </div>
        <div class="col-md-8">
          <div class="card p-3">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#SL</th>
                <th>Job Title</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($allPostedJobs as $key=>$post)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $post->job_title }}</td>
                <td>
                  <a href="{{ route('company.edit.job.post',$post->id) }}" class="btn btn-primary btn-sm" target="blank">
                    <i class="fas fa-eye"></i>
                    <span>Edit</span>
                  </a>
                  <a href="{{ route('jobpost.details',$post->id) }}" class="btn btn-primary btn-sm" target="blank">
                    <i class="fas fa-eye"></i>
                    <span>Show Details</span>
                  </a>
                  <button type="button" onclick="deleteData({{ $post->id }})"  class="btn btn-danger rounded-right btn-sm">
                    <i class="fas fa-trash-alt"></i>
                    <span>Delete</span>
                  </button>
                  <form id="delete-form-{{ $post->id }}" action="{{ route('company.delete.posted.job', $post->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                  </form>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('page-script')
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