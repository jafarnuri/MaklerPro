<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
<div class="text-center navbar-brand-wrapper ">
    <a class=" brand-logo mr-5" href="">
        <img src="{{ Storage::url($siteName->image) }}" class="mr-2 fixed-logo" alt="logo" />
    </a>
</div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>

    <ul class="navbar-nav navbar-nav-right">

      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <img src="{{ Storage::url(auth()->user()->image) }}" alt="profile" />

        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="{{route('admin.profile', auth()->id()) }}">
            <i class="ti-settings text-primary"></i>
            Hesabim
          </a>
          <a class="dropdown-item" href="{{route('logout')}}">
            <i class="ti-power-off text-primary"></i>
            Logout
          </a>
        </div>
      </li>

    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>