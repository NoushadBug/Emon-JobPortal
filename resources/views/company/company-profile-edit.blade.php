@extends('layouts.website.website-layouts')
@section('page-title') 
{{ isset($companyInfo) ? $companyInfo != null ? Auth::user()->company->company_name . ' | Profile Edit' : 'Company Profile Edit' : 'Company Profile Edit'}} 
@endsection
@push('page-style')
<link rel="stylesheet" href="{{ asset('assets/website/css/company-user-dashboard.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endpush
@section('page-content')
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <!-- Company Sidebar -->
          @include('layouts.company.company-sidebar')
        </div>
        <div class="col-md-8">
          <!-- Edit Profile Tab -->
          <div class="card p-3">
            <form action="{{ route('company.update-profile') }}" method="POST">
              @csrf
              @method('put')
              <h5 class="pb-2 border-bottom"><b>Update Company Profile</b></h4>
              <div class="heading py-2">
                <h5><b>Account Info</b></h5>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="tit" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
                </div>
              </div>
              <div class="heading py-2">
                <h5><b>Company Details Info</b></h5>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="company_name" class="form-label">Company Name</label>
                  <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" id="company_name" value="{{ $companyInfo != null ? $companyInfo->company_name : old('company_name') }}">
                  @error('company_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="" class="form-label">New Entrepreneur ?</label>
                  <div aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="entrepreneur" id="yes" value="yes" {{ $companyInfo != null ? $companyInfo->entrepreneur == 'yes' ? 'checked' : '' : '' }}>
                    <label class="btn btn-outline-primary" for="yes" ><i class="bi bi-check-circle"></i> Yes</label>
                  
                    <input type="radio" class="btn-check" name="entrepreneur" id="no" value="no" {{ $companyInfo != null ? $companyInfo->entrepreneur == 'no' ? 'checked' : '' : '' }}>
                    <label class="btn btn-outline-primary" for="no"><i class="fas fa-exclamation-circle"></i> No</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="trade_license" class="form-label">Trade License No</label>
                  <input type="text" class="form-control" name="trade_license" id="trade_license" value="{{ $companyInfo != null ? $companyInfo->trade_license : old('trade_license') }}">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="website-url" class="form-label">Website URL</label>
                  <input type="website_url" class="form-control" name="website_url" id="website-url" value="{{ $companyInfo != null ? $companyInfo->website_url : old('website_url') }}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="industry" class="form-label">Industry Type</label>
                  <select class="form-control js-example-basic-single @error('industry_id') is-invalid @enderror" name="industry_id" id="industry">
                    <option selected disabled>Select Industry Type</option>
                    @foreach ($industries as $industry)
                      <option @isset($companyInfo)
                      {{ $companyInfo->industry_id == $industry->id ? 'selected' : '' }} 
                      @endisset value="{{ $industry->id }}">{{ $industry->industry_name }}</option>
                    @endforeach
                  </select>
                  @error('industry_id')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="employee-size" class="form-label">Employee Size</label>
                  <select class="form-control js-example-basic-single @error('employee_size') is-invalid @enderror" name="employee_size" id="employee-size">
                    <option selected disabled>Select Company Size</option>
                    <option {{ $companyInfo != null ? $companyInfo->employee_size == '1-15' ? 'selected' : '' : ''}} value="1-15">1-15 Employees</option>
                    <option {{ $companyInfo != null ? $companyInfo->employee_size == '16-30' ? 'selected' : '' : ''}} value="16-30">16-30 Employees</option>
                    <option {{ $companyInfo != null ? $companyInfo->employee_size == '31-50' ? 'selected' : '' : ''}} value="31-50">31-50 Employees</option>
                    <option {{ $companyInfo != null ? $companyInfo->employee_size == '51-120' ? 'selected' : '' : ''}} value="51-120">51-120 Employees</option>
                    <option {{ $companyInfo != null ? $companyInfo->employee_size == '121-300' ? 'selected' : '' : ''}} value="121-300">121-300 Employees</option>
                    <option {{ $companyInfo != null ? $companyInfo->employee_size == '301-500' ? 'selected' : '' : ''}} value="301-500">301-500 Employees</option>
                  </select>
                  @error('employee_size')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="district" class="form-label">District</label>
                  <select class="form-control js-example-basic-single @error('district') is-invalid @enderror" name="district">
                    <option selected disabled>Select District</option>
                    @foreach ($districts as $district)
                      <option @isset($companyInfo)
                      {{ $companyInfo->district	== $district->district_name ? 'selected' : '' }}
                      @endisset value="{{ $district->district_name }}">{{ $district->district_name }}</option>
                    @endforeach
                  </select>
                  @error('district')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="thana" class="form-label">Thana</label>
                  <select class="form-control js-example-basic-single @error('thana') is-invalid @enderror" name="thana">
                    <option selected disabled>Select Thana</option>
                    @foreach ($thanas as $thana)
                      <option @isset($companyInfo)
                      {{ $companyInfo->thana == $thana->thana_name ? 'selected' : '' }}
                      @endisset value="{{ $thana->thana_name }}">{{ $thana->thana_name }}</option>
                    @endforeach
                  </select>
                  @error('thana')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="mb-3">
                <label for="company_address" class="form-label"><Address></Address> <span class="text-muted">Max 200 chr</span></label>
                <textarea type="text" class="form-control" name="company_address" id="company_address">{{ $companyInfo != null ? $companyInfo->company_address : old('company_address') }}</textarea>
              </div>
              <button type="submit" class="btn site-btn"><i class="fal fa-arrow-circle-up"></i> Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('page-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>
@endpush