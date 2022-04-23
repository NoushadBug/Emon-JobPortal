@extends('layouts.website.website-layouts')
@section('page-title', 'Category-Details')
@push('page-style')
<style>
  .card{
    /* padding: 20px 15px; */
  }
  .card-title{
    background: #C2000C;
    padding: 6px 10px;
    color: white;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }
  .card-body{
    padding: 6px 12px 15px 12px;
  }
  .logo i{
    color: #C2000C;
    font-size: 18px;
  }
  .description{

  }
  .description .item-i{
    width: 30px;
  }
  .search-bar, .search-body{
    background-color: white;
    padding: 20px;
    border-radius: 5px;
  }
  body{
    background: rgb(226, 226, 226);
  }
  .card:hover{
    box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
  }
  a{
    color: 
  }
  .company-logo img{
    object-fit: cover;
  }
  .report-bg{
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
            <p>{!! $jobPost->description !!}</p>
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
