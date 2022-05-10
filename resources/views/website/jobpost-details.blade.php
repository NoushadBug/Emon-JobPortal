@extends('layouts.website.website-layouts')
@section('page-title', 'Job Post Details')
@push('page-style')
<style>
  .card {
    /* padding: 20px 15px; */
  }

  .card-title {
    background: #0FAA75;
    padding: 6px 10px;
    color: white;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }

  .card-body {
    padding: 6px 12px 15px 12px;
  }

  .logo i {
    color: #0FAA75;
    font-size: 18px;
  }

  .description .item-i {
    width: 30px;
  }

  .search-bar,
  .search-body {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
  }

  /* body{
    background: rgb(226, 226, 226);
  } */
  .card:hover {
    box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
  }

  .company-logo img {
    object-fit: cover;
  }

  .report-bg {
    background: #FFDDE0;
    padding: 10px;
    border-radius: 5px;
  }
</style>
@endpush
@section('page-content')

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            @if ($view == 'applied')
            <h4 class="title mt-3 text-success">You have already applied This Job</h4>
            <hr>
            @elseif ($view == 'selected')
            <h4 class="title mt-3 text-success">You have been selected for this Job</h4>
            <hr>
            @elseif ($view == 'full')
            <h4 class="title mt-3 text-success">Oops! There is no vacant available for this Job</h4>
            <hr>
            @elseif ($view == 'no_resume')
            <h4 class="title mt-3 text-success">You have not uploaded your resume yet. If you wish you can upload a new resume</h4>
            <div class="card p-3">
              <form action="{{ route('user.store.resume') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h5 class="pb-3 border-bottom"><b>Upload CV / Resume</b></h4>
                  <div class="row">
                    <div class="col-12 mb-3">
                      <label for="resume" class="form-label">Upload Resume</label>
                      <input type="file" class="form-control" name="resume" id="resume">
                    </div>
                  </div>
                  <button type="submit" class="btn site-btn"><i class="fal fa-arrow-circle-up"></i> Upload</button>
              </form>
            </div>
            <hr>
            @else
            <h4 class="title mt-3 text-success">You have not applied for this job yet</h4>
            <hr>
            @endif
            <p>{!! $jobPost->description !!}</p>
            <div class="text-center">
              @if ($view == 'no_resume' || $view == 'default' )
              <a href="{{ route('apply.the.job', $jobPost->id) }}" class="btn site-btn ">Apply Now <i class="bi bi-exclamation-circle"></i></a>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-3">
          <div class="card-title"><span class="me-2"><i class="fal fa-suitcase"></i></span> Job Summary</div>
          <div class="card-body">
            <p class="py-1"><b>Published On : </b>{{ date('F j, Y', strtotime($jobPost->published_on)) }}</p>
            <p class="py-1"><b>Vacancy : </b>{{ $jobPost->vacancy }}</p>
            <p class="py-1"><b>Employment Status :</b>{{ $jobPost->employment_status == 'FT' ? 'Full Time' : '' || $jobPost->employment_status == 'PT' ? 'Part Time' : '' || $jobPost->employment_status == 'FLC' ? 'Freelancing' : '' || $jobPost->employment_status == 'TJ' ? 'Temporary Job' : ''}}</p>
            <p class="py-1"><b>Experience : </b>{{ $jobPost->experience }}</p>
            <p class="py-1"><b>Age : </b>{{ $jobPost->age }}</p>
            <p class="py-1"><b>Job Location : </b>{{ $jobPost->job_location }}</p>
            <p class="py-1"><b>Salary : </b>{{ $jobPost->salary }}</p>
            <p class="py-1"><b>Application Deadline : </b>{{ date('F j, Y', strtotime($jobPost->deadline)) }}</p>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-title"><span class="me-2"><i class="bi bi-building"></i></span> Company Information</div>
          <div class="card-body">
            <p class="py-1"><b>Company Name : </b>{{ $jobPost->company->company_name }}</p>
            <p class="py-1"><b>Address : </b>{{ $jobPost->company->company_address }}</p>
            <p class="py-1"><b>Trade License : </b>{{ $jobPost->company->trade_license }}</p>
            <p class="py-1"><b>Website U : </b>{{ $jobPost->company->website_url }}</p>
          </div>
        </div>
        <div class="card">
          <div class="card-title"><span class="me-2"><i class="bi bi-exclamation-circle"></i></span> Report</div>
          <div class="card-body">
            <p class="report-bg">{{ $jobPost->report }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
@push('page-script')
<script src="{{ asset('assets/website/js/typed.js') }}"></script>
<script>
  var typed4 = new Typed('#typed4', {
    strings: [
      'Search key word : Frontend Developer',
      'Search key word : Backend Developer',
      'Search key word : Graphics Designer',
      'Search key word : Accountent',
      'Search key word : Data Entry',
    ],
    typeSpeed: 100,
    backSpeed: 0,
    attr: 'placeholder',
    bindInputFocusEvents: true,
    loop: true
  });
</script>
@endpush