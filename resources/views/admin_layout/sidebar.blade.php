<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.home')}}">
        <i class="fa fa-bars"></i>
        <span class="menu-title">Home</span>
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
            <a class="nav-link" href="">Mənim Mənzillərim</a>
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
            <a class="nav-link" href="">Bütün Abyektlər</a>
          </li>
        </ul>
      </div>

      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="">Mənim Abyektlərim</a>
          </li>
        </ul>
      </div>

      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="">Satılmış Abyektlər</a>
          </li>
        </ul>
      </div>

      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="">İcarələnmiş Abyektlər</a>
          </li>
        </ul>
      </div>
 
 
 

    </li>


 
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.user_show')}}">
        <i class="fa fa-users"></i>
        <span class="menu-title">Users</span>
      </a>
    </li>



  </ul>
</nav>