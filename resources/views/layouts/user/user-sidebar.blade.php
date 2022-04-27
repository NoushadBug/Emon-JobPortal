<div class="card">
  <form action="{{ route('user.update.avater') }}" method="POST" enctype="multipart/form-data"> 
    @csrf
    @method('put')
    <div class="d-flex align-items-center border-bottom">
      <div class="form-group user-avater mt-4">
        <div class="avatar-upload">
          <div class="avatar-edit">
            <input type='file' id="imageUpload" name="profile_photo" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"><i class="bi bi-camera" data-bs-toggle="tooltip" data-bs-placement="right" title="Select an Image"></i></label>
          </div>
          <div class="avatar-preview">
            @if(Auth::user()->profile_photo != null)
            <div id="imagePreview" style="background-image: url({{ asset('uploads/users/profile-pic/'. Auth::user()->profile_photo) }});">
            </div>
            @else
            <div id="imagePreview" style="background-image: url({{ asset('assets/application-default/img/user.png') }});">
            </div>
            @endif
          </div>
        </div>
      </div>
      <div class="description ps-3">
        <span>Hello</span>
        <h5>{{ Auth::user()->name }}</h5>
      </div>
    </div>
    <button type="submit" class="btn update-avater">
      <i class="bi bi-check2-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="Clic To Update"></i>
    </button>
  </form>
  <!-- User Sidebar -->
  <div class="nav flex-column mt-4 px-2">

    <!-- Dashboard List -->
    <a href="{{ route('user.dashboard') }}">
      <li class="element-items mb-2  active"><i class="bi bi-speedometer2"></i> Dashboard</li>
    </a>
  
    <!-- Edit Profile List -->
    <a href="{{ route('user.edit.profile') }}">
      <li class="element-items mb-2"><i class="bi bi-pencil-square"></i> Edit Profile</li>
    </a>
  
    <!-- Change Password List -->
    <a href="{{ route('user.change.password') }}">
      <li class="element-items mb-2"><i class="bi bi-key"></i> Change Password</li>
    </a>

    <!-- Resume -->
    <a href="{{ route('user.resume') }}">
      <li class="element-items mb-2"><i class="bi bi-file-arrow-up"></i>CV/Resume</li>
    </a>
  
  
    <!-- Logout List -->
    <li class="element-items mb-2">
      <a href="javascript:void(0);" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i> Sign Out
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
      </a>
    </li>
  </div>
</div>


