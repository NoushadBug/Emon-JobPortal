@extends('layouts.website.website-layouts')
@section('page-title')
{{ isset($companyId) ? $companyId != null ? Auth::user()->company->company_name : 'Company' : 'Company' }} | All Posted Jobs
@endsection

@push('page-style')
<link rel="stylesheet" href="{{ asset('assets/website/css/company-user-dashboard.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<style>
  .card-element {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px 0px;
    border-top: 3px solid #0FAA75;
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
          <!-- <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Resume</th>
                <th>Creation Time</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $key=>$user)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
              </tr>
              @endforeach
          </table> -->

          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#SL</th>
                <th>User Name</th>
                <th>E-mail</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Resume</th>
                <th>Applied</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($users) > 0)
              @foreach ($users as $key=>$user)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->gender }}</td>
                <td>
                  @if(!empty($user->resume))
                  <iframe id="iframe-pdf" src="{{ asset('uploads/users/resume/'.$user->resume->resume) }}" frameborder="0"></iframe>
                  @endif
                </td>
                <td>
                  @if(!empty($user->resume))
                  {{ $user->resume->created_at != null ? $user->resume->created_at->diffForHumans() : '' }}
                  @endif
                </td>
                <td>
                  @if(!empty($user->resume))
                  <a href="{{ asset('uploads/users/resume/'.$user->resume->resume) }}" class="btn btn-info btn-sm" target="_blank">
                    <i class="fas fa-eye"></i>
                    <span>Resume</span>
                  </a>
                  @endif

                  <button type="button" onclick="approveApplication({{ $user->job_id}} , {{$user->id }})" class="btn btn-success rounded-right btn-sm">
                    <i class="fas fa-check"></i>
                    <span>Approve</span>
                  </button>
                  <form id="approve-form-{{ $user->job_id}}-{{$user->id }}" action="{{ route('company.job.approve') }}" method="POST" style="display: none;">
                    @csrf
                    @method('POST')
                  </form>
                  <button type="button" onclick="rejectApplication({{ $user->job_id}} , {{$user->id }})" class="btn btn-danger rounded-right btn-sm">
                    <i class="fas fa-times"></i>
                    <span>Reject</span>
                  </button>
                  <form id="reject-form-{{ $user->job_id}}-{{$user->id }}" action="{{ route('company.job.reject') }}" method="POST" style="display: none;">
                    @csrf
                    @method('POST')
                  </form>
                </td>
              </tr>
              @endforeach
              @endif
          </table>
        </div>
      </div>
      <!-- @include('company.resume-lists') -->
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
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
  function approveApplication(job_id, id) {
    swal({
      title: 'Approve the Application?',
      text: "Applicant will be approved and notified",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Approve',
      cancelButtonText: 'Cancel',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false,
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        event.preventDefault();
        approveForm = document.getElementById('approve-form-' + job_id + '-' + id);
        var input = document.createElement('input');
        input.setAttribute('name', 'job_id');
        input.setAttribute('value', job_id);
        input.setAttribute('type', 'hidden');

        var input2 = document.createElement('input');
        input2.setAttribute('name', 'id');
        input2.setAttribute('value', id);
        input2.setAttribute('type', 'hidden');
        approveForm.appendChild(input);
        approveForm.appendChild(input2);
        approveForm.submit();
      } else if (
        // Read more about handling dismissals
        result.dismiss === swal.DismissReason.cancel
      ) {
        swal(
          'Cancelled',
          '',
          'error'
        )
      }
    })
  }

  function rejectApplication(job_id, id) {
    swal({
      title: 'Are you sure?',
      text: "This will reject the candidate's application",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Reject',
      cancelButtonText: 'Cancel',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false,
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        event.preventDefault();
        rejectForm = document.getElementById('reject-form-' + job_id + '-' + id);
        var input = document.createElement('input');
        input.setAttribute('name', 'job_id');
        input.setAttribute('value', job_id);
        input.setAttribute('type', 'hidden');

        var input2 = document.createElement('input');
        input2.setAttribute('name', 'id');
        input2.setAttribute('value', id);
        input2.setAttribute('type', 'hidden');
        rejectForm.appendChild(input);
        rejectForm.appendChild(input2);
        rejectForm.submit();
      } else if (
        // Read more about handling dismissals
        result.dismiss === swal.DismissReason.cancel
      ) {
        swal(
          'Cancelled',
          '',
          'error'
        )
      }
    })
  }
</script>
<script>
  $(function() {
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
        document.getElementById('delete-form-' + id).submit();
      } else if (
        // Read more about handling dismissals
        result.dismiss === swal.DismissReason.cancel
      ) {
        swal(
          'Cancelled',
          '',
          'error'
        )
      }
    })
  }
</script>
@endpush