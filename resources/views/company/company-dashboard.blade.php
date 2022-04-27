@extends('layouts.website.website-layouts')
@section('page-title')
{{ isset($companyId) ? $companyId != null ? Auth::user()->company->company_name . ' |  Dashboard' : 'Company Dashboard' : 'Company Dashboard' }}
@endsection
@push('page-style')
<link rel="stylesheet" href="{{ asset('assets/website/css/company-user-dashboard.css') }}">
<style>
  .card-element{
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
            <div class="row">
              <div class="col-md-4">
                <a href="{{ route('company.all.posted.jobs') }}">
                  <div class="card card-element">
                    <h6>All Posted Jobs</h6>
                    <i class="fas fa-suitcase"></i>
                  </div>
                </a>
              </div>
              <div class="col-md-4">
                <a href="{{ route('company.job.candidate') }}">
                  <div class="card card-element">
                    <h6>Candidate</h6>
                    <i class="fas fa-users"></i>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('page-script')

@endpush