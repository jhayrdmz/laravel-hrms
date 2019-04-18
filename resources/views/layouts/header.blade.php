<div class="top-bar clearfix">
  @if(Auth::user()->hasAnyRole(['Admin', 'HR']))
  <ul class="top-info-bar">
    <li class="dropdown bar-notification ">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bed"></i></a>
      <ul class="dropdown-menu user-dropdown arrow" role="menu">
        <li class="title">Recent 5 Leave Applications</li>
        <li class="footer"><a href="#">See All Applications</a></li>
      </ul>
    </li>
  </ul>
  @endif
  <div class="navbar-right">
    <div class="clearfix">
      <div class="dropdown user-profile pull-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          <span class="user-info">{{ Auth::user()->name }}</span>
          <img class="user-image" src="https://coderpixel.com/demo/advanced-hrm/assets/employee_pic/myAvatar.png" alt="Coder Pixel">
        </a>
        <ul class="dropdown-menu arrow right-arrow" role="menu">
          @if(Auth::user()->hasAnyRole(['Employee', 'HR']))
            <li><a href="{{ route('profile') }}"><i class="fa fa-edit"></i>My Profile</a></li>
          @endif
          <li class="bg-dark">
            <a href="{{ url('logout') }}" class="clearfix">
              <span class="pull-left">Logout</span>
              <span class="pull-right"><i class="fa fa-power-off"></i></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>