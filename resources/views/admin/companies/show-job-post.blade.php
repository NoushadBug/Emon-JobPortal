@extends('layouts.admin.admin-layout')
@section('title', 'Show Job')
@push('page-css')
  <style>
    .report-bg {
      background: #FFDDE0;
      padding: 10px;
      border-radius: 5px;
    }
    .title h5{
      border-top-right-radius: 5px;
      border-top-left-radius: 5px;
    }
  </style>
@endpush
@section('page-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Job Pos Detaisl</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Job Pos Detaisl</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Job Post Detail</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body" style="display: block;">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12">
                  <div class="div border-bottom pb-3">
                    <div class="col d-flex">
                      @if($jobPostShow->is_published == false)
                      <button type="button" class="btn btn-warning btn-sm mr-3" style="cursor: no-drop">
                        <i class="fas fa-spinner"></i>
                        <span>Pending</span>
                      </button>
                      <button type="button" class="btn btn-info btn-sm" onclick="approvedJobPost({{ $jobPostShow->id }})">
                        <span>Approve Now </span>
                        <i class="fas fa-question-circle"></i>
                      </button>
                      <form method="post" action="{{ route('admin.company.approved.job.post',$jobPostShow->id) }}" id="approval-form" style="display: none">
                          @csrf
                          @method('PUT')
                      </form>
                      @else
                      <button type="button" class="btn btn-success btn-sm mr-3" style="cursor: no-drop">
                        <i class="fas fa-check-circle"></i>
                        <span>Already Approved</span>
                      </button>
                      <button type="button" class="btn btn-danger btn-sm" onclick="rejectJobPost({{ $jobPostShow->id }})">
                        <span>Now Rejecte</span>
                        <i class="fas fa-question-circle"></i>
                      </button>
                      <form method="post" action="{{ route('admin.company.reject.job.post',$jobPostShow->id) }}" id="approval-form" style="display: none">
                          @csrf
                          @method('PUT')
                      </form>
                      @endif
                    </div>
                  </div>
                  <p class="pt-4">{!! $jobPostShow->description !!}</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <div class="bg-light mb-3">
                <div class="title">
                  <h5 class="bg-info py-2 px-2"><i class="fas fa-suitcase"></i> Job Summary</h5>
                </div>
                <div class="pt-2 pb-3 px-3">
                  <div>
                    <span><b>Published On :</b></span>
                    <span>{{ $jobPostShow->published_on }}</span>
                  </div>
                  <div>
                    <span><b>Vacancy :</b></span>
                    <span>{{ $jobPostShow->vacancy }}</span>
                  </div>
                  <div>
                    <span><b>Employee Status :</b></span>
                    <span>{{ $jobPostShow->employee_status }}</span>
                  </div>
                  <div>
                    <span><b>Age :</b></span>
                    <span>{{ $jobPostShow->age }}</span>
                  </div>
                  <div>
                    <span><b>Experience :</b></span>
                    <span>{{ $jobPostShow->experience }}</span>
                  </div>
                  <div>
                    <span><b>Job Location :</b></span>
                    <span>{{ $jobPostShow->job_location }}</span>
                  </div>
                  <div>
                    <span><b>Salary :</b></span>
                    <span>{{ $jobPostShow->salary }}</span>
                  </div>
                  <div>
                    <span><b>Application Deadline :</b></span>
                    <span>{{ $jobPostShow->deadline }}</span>
                  </div>
                </div>
              </div>
              <div class="bg-light mb-3">
                <div class="title">
                  <h5 class="bg-info py-2 px-2"><i class="fas fa-building"></i> Company Summary</h5>
                </div>
                <div class="pt-2 pb-3 px-3">
                  <div>
                    <span><b>Company Name :</b></span>
                    <span>{{ $jobPostShow->company->company_name }}</span>
                  </div>
                  <div>
                    <span><b>Address :</b></span>
                    <span>{{ $jobPostShow->company->company_address }}</span>
                  </div>
                  <div>
                    <span><b>Trade Licence :</b></span>
                    <span>{{ $jobPostShow->company->trade_license }}</span>
                  </div>
                  <div>
                    <span><b>Web Site URL :</b></span>
                    <span>{{ $jobPostShow->company->website_url }}</span>
                  </div>
                </div>
              </div>
              <div class="bg-light mb-3">
                <div class="title">
                  <h5 class="bg-info py-2 px-2"><i class="fas fa-exclamation-circle"></i> Report</h5>
                </div>
                <div class="pt-2 pb-3 px-3">
                  <p class="report-bg">{{ $jobPostShow->report }}</p>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('page-js')
 <!-- Sweet Aleart Js -->
 <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
  function approvedJobPost(id) {
   swal({
       title: 'Are you sure?',
       text: "You went to approve this Job Post ",
       type: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Yes, approve it!',
       cancelButtonText: 'No, cancel!',
       confirmButtonClass: 'btn btn-success',
       cancelButtonClass: 'btn btn-danger',
       buttonsStyling: false,
       reverseButtons: true
   }).then((result) => {
       if (result.value) {
           event.preventDefault();
           document.getElementById('approval-form').submit();
       } else if (
           // Read more about handling dismissals
           result.dismiss === swal.DismissReason.cancel
       ) {
           swal(
               'Cancelled',
               'The post remain pending :)',
               'info'
           )
       }
   })
 }
 function rejectJobPost(id) {
   swal({
       title: 'Are you sure?',
       text: "You went to Reject this Job Post ",
       type: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Yes, Reject it!',
       cancelButtonText: 'No, cancel!',
       confirmButtonClass: 'btn btn-success',
       cancelButtonClass: 'btn btn-danger',
       buttonsStyling: false,
       reverseButtons: true
   }).then((result) => {
       if (result.value) {
           event.preventDefault();
           document.getElementById('approval-form').submit();
       } else if (
           // Read more about handling dismissals
           result.dismiss === swal.DismissReason.cancel
       ) {
           swal(
               'Cancelled',
               'The post remain pending :)',
               'info'
           )
       }
   })
 }
</script>
@endpush