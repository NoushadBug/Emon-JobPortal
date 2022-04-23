@extends('layouts.website.website-layouts')
@section('page-title', '')
@push('page-style')
<style>
  .contact-section ul  li{
    list-style-type: none;
    padding: 10px 0px;
  }
  .card{
    padding: 15px;
    height: 100%;
  }
  .google-map iframe{
    border-radius: 8px;
  }
</style>
@endpush

@section('page-content')
<section class="contact-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <h5 class="pb-3 border-bottom"><b>Contact Us</b></h5>
            <div class="row pt-2">
              <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('name') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subject</label>
              <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ old('subject') }}">
              @error('subject')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message <span class="text-muted">Max 500 chr</span></label>
              <textarea type="text" class="form-control @error('message') is-invalid @enderror" name="message" id="message">{{ old('message') }}</textarea>
              @error('message')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <button type="submit" class="btn site-btn"><i class="fal fa-paper-plane"></i> Send</button>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <h5 class="pb-3 border-bottom"><b>Contact Number</b></h5>
          <ul class="pt-3 ps-0 m-0">
            <li><a href=""><i class="fal fa-phone-volume"></i> 019 9999999</a></li>
            <li><a href=""><i class="fal fa-phone-volume"></i> 019 9999999</a></li>
            <li><a href=""><i class="fal fa-phone-volume"></i> 019 9999999</a></li>
            <li><a href=""><i class="fal fa-phone-volume"></i> 019 9999999</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12">
        <div class="google-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d58383.31803866864!2d90.41494788500975!3d23.855647224120933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1649686347048!5m2!1sen!2sbd" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
@push('page-script')
@endpush
