<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.home')}}">
        <i class="fa fa-bars"></i>
        <span class="menu-title">Ana Səhifə</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
        aria-controls="form-elements">


        <i class="fa fa-cog "></i>
        <span class="menu-title"> Mənzil və Abyektlər</span>
        <i class="menu-arrow"></i>
      </a>


      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.home_show')}}">Bütün Mənzillər</a>
          </li>
        </ul>
      </div>

      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.my_home')}}">Mənim Mənzillərim</a>
          </li>
        </ul>
      </div>

      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.sold_home')}}">Satılmış Mənzillər</a>
          </li>
        </ul>
      </div>


      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.rented_home')}}">İcarələnmiş Mənzillər</a>
          </li>
        </ul>
      </div>

      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.shop_show')}}">Bütün Abyektlər</a>
          </li>
        </ul>
      </div>

      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.my_shop')}}">Mənim Abyektlərim</a>
          </li>
        </ul>
      </div>

      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.sold_shop')}}">Satılmış Abyektlər</a>
          </li>
        </ul>
      </div>

      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.rented_shop')}}">İcarələnmiş Abyektlər</a>
          </li>
        </ul>
      </div>
    </li>



    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.user_show')}}">
        <i class="fa fa-users"></i>
        <span class="menu-title">Maklerlər</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.setting_edit') }}">
        <i class="fa fa-cog "></i>
        <span class="menu-title">Parametrlər</span>
      </a>
    </li>


  </ul>
</nav>