@extends('layouts.website.website-layouts')
@section('page-title', '')
@push('page-style')
<style>
  #hero{
    width: 100%;
    height: 50vh;
    background-repeat: no-repeat;
  }
  .overlay{
    width: 100%;
    height: 50vh;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .form-control{
    border: 1px solid #c2000c;
  }
  .card{
    height: 100%;
  }
  .see-all{
    text-align: right;
  }
  .see-all i{
    font-size: 13px;
  }
  .see-all a{
    font-size: 15px;
  }
  .govt, .public, ul li{
    list-style-type: none;
  }
  .govt i{
    margin-right: 10px;
  }
  .public i{
    margin-right: 10px;
  }
  .job-item-wrap{
    display: flex;
    justify-content: center;
  }
  .job-item{
    color: white;
  }
  .job-item i{
    width: 50px;
    height: 50px;
    background: rgb(128, 128, 128, 0.6);
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    margin: auto !important;
  }
  .job-card{
    display: flex;
    padding: 20px 10px;
  }
  .hto-job-title i{
    font-size: 23px;
    color: #C2000C;
  }
</style>
@endpush

@section('page-content')

  <!-- Search Or Banner -->
  <div id="hero" style="background-image: url({{ asset('assets/website/img/searchbar.jpg') }})">
    <div class="overlay">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <form action="{{ route('job.search') }}" method="GET">
              @csrf
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="typed4" placeholder="Search key word :" name="search">
                <button class="btn contact-us-btn" type="submit" id="button-addon2"><i class="bi bi-search"></i> Search</button>
              </div>
            </form>
            <div class="job-item-wrap">
              <div class="job-item text-center mx-3">
                <i class="bi bi-building m-0"></i>
                <p>Companies</p>
                <span>{{ $companyCount }}</span>
              </div>
              <div class="job-item text-center mx-3">
                <i class="fa fa-spinner m-0"></i>
                <p>Jobs</p>
                <span>{{ $jobPostCount }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= Matrials Section ======= -->
  <section class="matrials section-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-6 col-12">
          <div class="card materials-body">
            <h6 class="border-bottom pb-2">
              <i class="far fa-list-ul me-2"></i>
              <span>Brows Category</span>
            </h6>
            <div class="row">
              @forelse ($categories as $category)
              <div class="col-md-4 py-1">
                <a href="{{ route('category', $category->id) }}">
                  <i class="fal fa-arrow-alt-circle-right"></i>
                  <span>{{ $category->category_name }}</span>
                </a>
              </div>
              @empty
              Not Found
              @endforelse
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <div class="card materials-body">
            <div class="govt mb-3">
              <h6 class="border-bottom pb-2">
                <img src="{{ asset('assets/website/img/bangladesh.png') }}" alt="" height="20" height="20">
                <span>Govt Jobs</span>
              </h6>
              <ul class="p-0 m-0">
                @forelse ($companyGovts as $companyGovt)
                  <li><a href="{{ route('jobpost.details', $companyGovt->id) }}"><i class="fal fa-caret-circle-right"></i>{{ $companyGovt->job_title }}</a></li>
                @empty
                  Not Found
                @endforelse
              </ul>
              <div class="see-all">
                <a href="{{ route('government.company') }}">See All <span><i class="far fa-angle-double-right"></i></span></a>
              </div>
            </div>
            <div class="public">
              <h6 class="border-bottom pb-2">
                <i class="fa fa-suitcase"></i>
                <span>Private Jobs</span>
              </h6>
              <ul class="p-0 m-0">
                @forelse ($companyPvts as $companyPvt)
                  <li><a href="{{ route('jobpost.details', $companyPvt->id) }}"><i class="fal fa-caret-circle-right"></i>{{ $companyPvt->job_title }}</a></li>
                @empty
                  Not Found
                @endforelse
              </ul>
              <div class="see-all">
                <a href="{{ route('private.company') }}">See All <span><i class="far fa-angle-double-right"></i></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Matrials -->

  <!-- ======= Counts Section ======= -->
  <div id="counts" class="counts" style="background-image: url({{ asset('assets/website/img/searchbar.jpg') }}); background-attachment: fixed;">
    <div class="overlay">
      <div class="container">
        <div class="row counters">
          <div class="col-lg-3 col-6 text-center">
            <span><i class="fal fa-suitcase"></i></span>
            <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Jobs</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span><i class="fas fa-user-tie"></i></span>
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
            <p>Vacancy</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span><i class="bi bi-building"></i></span>
            <span data-purecounter-start="0" data-purecounter-end="{{ $companyCount }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Company</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span><i class="fa fa-spinner"></i></span>
            <span data-purecounter-start="0" data-purecounter-end="{{ $jobPostCount }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Jobs</p>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Counts Section -->

  <!-- Hot Job -->
  <section class="section-bg">
    <div class="container">
      <div class="hto-job-title">
        <h6>
          <i class="fab fa-free-code-camp"></i> 
          Hot Josb</h6>
      </div>
      <div class="row">
        @forelse ($jobPosts as $jobPost)
        <div class="col-lg-3 col-md-4 col-sm-6 col-item">
          <div class="card">
            <a href="{{ route('jobpost.details', $jobPost->id) }}">
              <div class="job-card">
                <div>
                  <img src="{{ $jobPost->job_thumbnail != null ? asset('uploads/job-thumbnail/'. $jobPost->job_thumbnail) : asset('assets/application-default/img/gallery-default.png') }}" alt="{{ $jobPost->job_title }}" height="50" width="50">
                </div>
                <div class="ps-2">
                  <p>{{ $jobPost->job_title }}</p>
                  <p>{{ $jobPost->company_name }}</p>
                </div>
              </div>
            </a>
          </div>
        </div>
        @empty
          Not Found
        @endforelse
      </div>
    </div>
  </section>
  <!-- Hot Job End -->

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
