@extends('layouts.website.website-layouts')
@section('page-title', '')
@push('page-style')
<link rel="stylesheet" href="{{ asset('assets/website/css/company-user-dashboard.css') }}">
<!-- Summernote Css CDN -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
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
  .note-dropdown-item h1{
    font-size: 2rem !important;
  }
  .note-dropdown-item h2{
    font-size: 1.75rem !important;
  }
  .note-dropdown-item h3{
    font-size: 1.50rem !important;
  }
  .note-dropdown-item h4{
    font-size: 1.25rem !important;
  }
  .note-dropdown-item h5{
    font-size: 1rem !important;
  }
  .t-switchery .toggle-off.btn {
    padding-left: 24px;
    background: #E6E6E6;

  }
  .t-switchery .toggle-handle {
    background: rgb(255, 255, 255);
  }
  .t-switchery .btn-primary {
    color: #fff;
    background-color: #C1000C;
    border-color: #C1000C;
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
          <form action="{{ isset($jobPostEdit) ? route('company.update.job.post', $jobPostEdit->id) : route('company.store.job.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($jobPostEdit)
              @method('put')
            @endisset
            <div class="card p-3">
              <h5 class="pb-3 border-bottom"><b>Create Job Post</b></h4>
              <div class="row pt-3">
                <div class="col-md-6 mb-3">
                  <label for="job-title" class="form-label">Job Title</label>
                  <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" id="job-title" value="{{ isset($jobPostEdit) ? $jobPostEdit->job_title : old('job_title') }}">
                  @error('job_title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="company-name" class="form-label">Company Name</label>
                  <input type="text" class="form-control" name="company_name" id="company-name" value="{{ isset($jobPostEdit) ? $jobPostEdit->company_name : old('company_name') }}">
                  @error('company_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="company-type" class="form-label">Company Type</label>
                  <select class="form-control js-example-basic-single" name="company_type" id="company-type">
                    <option selected disable>(: Company Type :)</option>
                      <option {{ isset($jobPostEdit) ? $jobPostEdit->company_type == 'GOVT' ? 'selected' : '' : '' }} value="GOVT">Government</option>
                      <option {{ isset($jobPostEdit) ? $jobPostEdit->company_type == 'PVT' ? 'selected' : '' : '' }} value="PVT">Private</option>
                  </select>
                </div>
                <div class="col-md-6  mb-3">
                  <label for="category-id" class="form-label">Select Job Category</label>
                  <select class="form-control js-example-basic-single" name="category_id" id="category-id">
                    <option selected disable>(: Select Category :)</option>
                    @foreach ($categories as $category)
                      <option 
                      @isset($jobPostEdit)  
                      {{ $jobPostEdit->category_id == $category->id ? 'selected' : '' }}
                      @endisset 
                      value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label for="job-location" class="form-label">Job Location</label>
                <textarea type="text" class="form-control" name="job_location" id="job-location">{{ isset($jobPostEdit) ? $jobPostEdit->job_location : old('job_location') }}</textarea>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="published-on" class="form-label">Published On</label>
                  <input type="date" class="form-control @error('published_on') is-invalid @enderror" name="published_on" id="published-on" value="{{ isset($jobPostEdit) ? $jobPostEdit->published_on : old('published_on') }}">
                  @error('published_on')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="deadline" class="form-label">Application Dedline</label>
                  <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" id="deadline" value="{{ isset($jobPostEdit) ? $jobPostEdit->deadline : old('deadline') }}">
                  @error('deadline')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="mb-3">
                <label for="req-degree" class="form-label">Required Degree</label>
                <textarea type="text" class="form-control @error('req_degree') is-invalid @enderror" name="req_degree" id="req-degree">{{ isset($jobPostEdit) ? $jobPostEdit->req_degree : old('req_degree') }}</textarea>
                @error('req_degree')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="text" class="form-control @error('age') is-invalid @enderror" name="age" id="age" value="{{ isset($jobPostEdit) ? $jobPostEdit->age : old('age') }}">
                @error('age')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="experience" class="form-label">Experience</label>
                  <input type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" id="experience" value="{{ isset($jobPostEdit) ? $jobPostEdit->experience : old('experience') }}">
                  @error('experience')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="salary" class="form-label">Salary</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">BDT</span>
                    </div>
                    <input type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ isset($jobPostEdit) ? $jobPostEdit->salary : old('salary') }}">
                    <div class="input-group-append">
                      <span class="input-group-text">.00</span>
                    </div>
                    @error('salary')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="employment-status" class="form-label">Employee Status</label>
                  <select class="form-control @error('employment_status') is-invalid @enderror" name="employment_status" id="employment-status">
                    <option selected disabled>(: Select Employmet Status :)</option>
                    <option {{ isset($jobPostEdit) ? $jobPostEdit->employment_status == 'FT' ? 'selected' : '' : '' }} value="FT">Full Time</option>
                    <option {{ isset($jobPostEdit) ? $jobPostEdit->employment_status == 'PT' ? 'selected' : '' : '' }} value="PT">Part Time</option>
                    <option {{ isset($jobPostEdit) ? $jobPostEdit->employment_status == 'FLC' ? 'selected' : '' : '' }} value="FLC">Freelancing</option>
                    <option {{ isset($jobPostEdit) ? $jobPostEdit->employment_status == 'TJ' ? 'selected' : '' : '' }} value="TJ">Temporary Job</option>
                  </select>
                  @error('employment_status')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="vacancy" class="form-label">Vacancy</label>
                  <input type="text" class="form-control @error('vacancy') is-invalid @enderror" name="vacancy" id="vacancy" value="{{ isset($jobPostEdit) ? $jobPostEdit->vacancy : old('vacancy') }}">
                  @error('vacancy')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="mb-3">
                <label for="job-thumbnail" class="form-label">Job Thumbnail</label>
                <input type="file" class="form-control" name="job_thumbnail" id="job-thumbnail">
              </div>
              <div class="mb-3">
                <label for="report" class="form-label">Report</label>
                <textarea type="text" class="form-control" name="report" id="report">{{ isset($jobPostEdit) ? $jobPostEdit->report : old('report') }}</textarea>
              </div>
              <div>
                <label for="job-details" class="form-label">Job Details</label>
                <textarea class="form-control" id="summernote" name="description">
                  @isset($jobPostEdit)
                    {!! $jobPostEdit->description !!}
                  @endisset
                </textarea>
              </div>
              <div class="d-flex  t-switchery mt-3">
                <button type="submit" class="btn site-btn"><span><i class="bi bi-megaphone-fill"></i></span> Published Post</button>
                <div class="ps-3">
                  <input type="checkbox" {{ isset($jobPostEdit) ? $jobPostEdit->status == 1 ? 'checked' : '' : '' }} data-toggle="toggle" data-on="Approve" data-off="Pending" name="status">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('page-script')
<!-- Summernote Js CDN -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>
<script type="text/javascript">
$('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 350,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>
<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>
@endpush