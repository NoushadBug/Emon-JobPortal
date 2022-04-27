  <!-- ======= Header ======= -->
  <div class="top-header">
    <div class="container">
      <div class="d-flex justify-content-between  align-items-center">
        <div class="network d-flex">
          <a href="mailto:info@gmail.com" class="d-flex d-none d-sm-block">
            <span class="pe-1"><i class="fas fa-envelope"></i></span>
            <span>info@gmail.com</span>
          </a>
          <div class="top-social">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>
        <div class="account">
          <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            @if(Auth::user())
              @if(Auth::user()->role_id == 2)
                <img src="{{ Auth::user()->profile_photo != null ? asset('uploads/company/profile-pic/'. Auth::user()->profile_photo) : asset('assets/application-default/img/user.png') }}" alt="" width="35" height="35">
              @else
                <img src="{{ Auth::user()->profile_photo != null ? asset('uploads/users/profile-pic/'. Auth::user()->profile_photo) : asset('assets/application-default/img/user.png') }}" alt="" width="35" height="35">
              @endif
            @else
            <img src="{{ asset('assets/application-default/img/user.png') }}" alt="" width="35" height="35">
            @endif
          </button>
          <div class="account-card dropdown-menu dropdown-menu-end">
            @if(!Auth::user())
            <div class="login-card">
              <div class="login-child">
                <div class="login-icon">
                  <i class="bi bi-laptop"></i>
                </div>
                <div>
                  <h5>My Jobs</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, commodi!</p>
                  <div class="d-flex login-signup">
                    <a href="{{ route('login') }}" class="btn btn-sm login">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-sm signup">Sign Up</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="login-card">
              <div class="login-child">
                <div class="login-icon">
                  <i class="bi bi-building"></i>
                </div>
                <div>
                  <h5>Companies</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, commodi!</p>
                  <div class="d-flex login-signup">
                    <a href="{{ route('login') }}" class="btn btn-sm login">Login</a>
                    <a href="{{ route('company.register') }}" class="btn btn-sm signup">Sign Up</a>
                  </div>
                </div>
              </div>
            </div>
            @else
            <div class="acc-mng-1">
              <div class="auth-img">
                @if(Auth::user())
                  @if(Auth::user()->role_id == 2)
                    <img src="{{ Auth::user()->profile_photo != null ? asset('uploads/company/profile-pic/'. Auth::user()->profile_photo) : asset('assets/application-default/img/user.png') }}" alt="company-avater" width="50px" height="50px">
                  @else
                    <img src="{{ Auth::user()->profile_photo != null ? asset('uploads/users/profile-pic/'. Auth::user()->profile_photo) : asset('assets/application-default/img/user.png') }}" alt="user-avater" width="50px" height="50px">
                  @endif
                @else 
                  <img src="{{ asset('assets/application-default/img/user.png') }}" alt="default-avater" width="50px" height="50px">
                @endif
              </div>
            </div>
            <div class="acc-mng-2">
              <h5 class="text-center m-0">{{ Auth::user()->name }}</h5>
              <small class="text-center">{{ Auth::user()->email }}</small>
              <hr>
              <div class="credentials">
                <a href="{{ Route::currentRouteName() == 'company.dashboard' ? route('company.dashboard') : route('user.dashboard')  }}"><i class="bi bi-columns-gap"></i>Dashboard</a>
                <a href="" class="notification"><i class="bi bi-bell"></i><div class="blob">12</div>Notification</a>
                <a href="" class="notification"><i class="bi bi-gear"></i>Settings</a>
                <a href="javascript:void(0);" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  <i class="bi bi-box-arrow-right"></i> Log Out
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </a>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <header id="header">
    <div class="container d-flex align-items-center">
      <!-- logo -->
      <a href="{{ route('index') }}" class="logo me-auto"><img src="{{ asset('assets/website/img/logo/m-logo.png') }}" alt="" class="img-fluid"></a>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="{{ route('index') }}"><i class="bi bi-house-fill"></i></i> Home</a></li>
          {{-- <li><a class="" href="#"><i class="fal fa-suitcase"></i> My Jobs</a></li> --}}
          <li><a class="" href="{{ route('search.by.company') }}"><i class="bi bi-building"></i> Companies</a></li>
          <li class="dropdown">
            <a href="#"><span>Career Guides</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Inter View Tips</a></li>
              <li><a href="#">Resume Writting</a></li>
              <li><a href="#">Cover Letter</a></li>
            </ul>
          </li>
          {{-- <li><a href="#">Projects</a></li>
          <li><a href="#">Find Mashtor</a></li>
          <li><a href="#">Alumni</a></li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="{{ route('contact') }}" class="contact-us-btn"><i class="fal fa-phone-volume"></i> Contact Us</a>
    </div>
  </header><!-- End Header -->