@extends('layouts.website.website-layouts')
@section('page-title')
{{ Auth::user()->name }} | Dashboard
@endsection
@push('page-style')
<link rel="stylesheet" href="{{ asset('assets/website/css/company-user-dashboard.css') }}">
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
        @include('layouts.user.user-sidebar')
      </div>
      <div class="col-md-8">
        <div class="card p-3">
          <div class="row container">
            <div class="col-md-4 p-0">
              <a href="">
                <div class="card card-element">
                  <h6>All Posted Jobs</h6>
                  <i class="fas fa-suitcase"></i>
                </div>
              </a>
            </div>
            {{-- <div class="col-md-4">
                <a href="javascript:void(0)">
                  <div class="card card-element">
                    <h6>View Resume</h6>
                    <i class="fal fa-briefcase"></i>
                  </div>
                </a>
              </div>
              <div class="col-md-4">
                <a href="javascript:void(0)">
                  <div class="card card-element">
                    <h6>View Resume</h6>
                    <i class="fal fa-briefcase"></i>
                  </div>
                </a>
              </div> --}}


            <div class="col-md-12 my-3 p-0">
              <h4>Recent Notifications</h4>
              <hr>
              @if(count($notificationData) > 0)
              <div class="element-items p-3">
                @foreach ($notificationData as $notification)
                @if($notification->selection_status == 2)
                <a href="{{ route('jobpost.details', [$notification->job_id, 'notified' => 'true']) }}">
                  <li class="container mb-2 rounded btn btn-outline-success" style="text-align: left;list-style:none;">
                    <i class="bi bi-x-circle"></i>
                    You have been rejected as '{{ $notification->jobPost->job_title }}'
                    <i class="bi bi-x" style="float:right;" onclick="readNotification({{$notification->job_id}}, {{$notification->user_id}})"></i>
                  </li>
                </a>
                @endif
                @if($notification->selection_status == 1)
                <a href=" {{ route('jobpost.details', [$notification->job_id, 'notified' => 'true']) }}">
                  <li class="container mb-2 rounded btn btn-outline-success" style="text-align: left;list-style:none;">
                    <i class="bi bi-check-circle"></i>
                    You have been selected as '{{$notification->jobPost->job_title}}'
                    <i class="bi bi-x" style="float:right;" onclick="readNotification({{$notification->job_id}}, {{$notification->user_id}})"></i>
                  </li>
                </a>
                @endif
                <form id="read-notification-{{$notification->job_id}}-{{$notification->user_id}}" action="{{ route('user.read.notification') }}" method="POST" style="display: none;">
                  @csrf
                  @method('POST')
                </form>
                @endforeach
                @endif

                @if(count($notificationData) == 0)
                <small class="text-secondary">No New Notification Found</small>
                @endif
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('page-script')
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
  function readNotification(job_id, user_id) {
    event.preventDefault();
    ntfcnForm = document.getElementById('read-notification-' + job_id + '-' + user_id);
    var input = document.createElement('input');
    input.setAttribute('name', 'job_id');
    input.setAttribute('value', job_id);
    input.setAttribute('type', 'hidden');

    var input2 = document.createElement('input');
    input2.setAttribute('name', 'user_id');
    input2.setAttribute('value', user_id);
    input2.setAttribute('type', 'hidden');
    ntfcnForm.appendChild(input);
    ntfcnForm.appendChild(input2);
    ntfcnForm.submit();
  }
</script>
@endpush