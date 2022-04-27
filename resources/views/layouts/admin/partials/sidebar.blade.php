  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('assets/website/img/logo/m-logo.png') }}" alt="Site Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8" height="40" width="40">
      <span class="brand-text font-weight-light">CareerLine BD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-suitcase"></i>
              <p>
                Jobs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.approved-job.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-check-circle"></i>
                  <p>Approved Jobs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.pending-job.index') }}" class="nav-link">
                  <i class="nav-icon far fa-pause-circle"></i>
                  <p>Pending Jobs</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-building"></i>
              <p>
                Companies 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.company.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Companies Lists</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('admin.data.table') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Company</p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Candidates
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.resume.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Candidate Resume</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Site Basif Info
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.district.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>District</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.thana.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thana</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.industry.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Industry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.contact.index') }}" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Contact Us
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.subscriber.index') }}" class="nav-link">
              <i class="nav-icon far fa-bell"></i>
              <p>
                Subscribers
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>