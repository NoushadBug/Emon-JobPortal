@extends('layouts.website.website-layouts')
@section('page-title', '')
@push('page-style')
<link rel="stylesheet" href="{{ asset('assets/website/css/company-user-dashboard.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endpush
@section('page-content')
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <!-- user Sidebar -->
          @include('layouts.user.user-sidebar')
        </div>
        <div class="col-md-8">
          <!-- Edit Profile Tab -->
          <div class="card p-3">
            <form action="{{ route('user.update-profile') }}" method="POST">
              @csrf
              @method('put')
              <h5 class="pb-3 border-bottom"><b>Edit Profile</b></h4>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="" value="{{ Auth::user()->email }}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::user()->phone }}">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="" class="form-label">Select Gender</label>
                  <div aria-label="Basic radio toggle button group">
  
                    <input type="radio" class="btn-check" name="gender" id="male" value="male"{{ Auth::user()->gender == 'male' ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary" for="male" ><i class="fas fa-male"></i> Male</label>
                  
                    <input type="radio" class="btn-check" name="gender" id="female" value="female"{{ Auth::user()->gender == 'female' ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary" for="female"><i class="fas fa-female"></i> Female</label>
                  
                    <input type="radio" class="btn-check" name="gender" id="other" value="other"{{ Auth::user()->gender == 'other' ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary" for="other"><i class="fal fa-transgender"></i> Other</label>
  
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="" value="{{ Auth::user()->address }}">
              </div>
              <div class="mb-3">
                <label for="bio" class="form-label">Bio <span class="text-muted">Max 200 chr</span></label>
                <textarea type="text" class="form-control" name="bio" id="bio">{{ Auth::user()->bio }}</textarea>
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