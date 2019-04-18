<nav id="left-nav" class="left-nav-bar">
  <div class="nav-top-sec">
    <div class="app-logo">
      <img src="{{ asset('public/img/logo.png') }}" alt="logo" class="bar-logo">
    </div>
    <a href="#" id="bar-setting" class="bar-setting"><i class="fa fa-bars"></i></a>
  </div>
  <div class="nav-bottom-sec">
    <ul class="left-navigation" id="left-navigation">
      @if(Auth::user()->hasAnyRole(['Admin', 'HR']))
        <li class="{{ request()->is('admin') ? 'active' : null }}">
          <a href="{{ route('admin.dashboard') }}">
            <span class="menu-text">Dashboard</span>
            <span class="menu-thumb">
              <i class="fa fa-dashboard"></i>
            </span>
          </a>
        </li>
        <li class="{{ request()->is('admin/employee*') ? 'active' : null }}">
          <a href="{{ route('admin.employee.index') }}">
            <span class="menu-text">Employees</span>
            <span class="menu-thumb">
              <i class="fa fa-users"></i>
            </span>
          </a>
        </li>
        <li class="{{ request()->is('admin/department*') ? 'active' : null }}">
          <a href="{{ route('admin.department.index') }}">
            <span class="menu-text">Depatments</span>
            <span class="menu-thumb">
              <i class="fa fa-building-o"></i>
            </span>
          </a>
        </li>
        <li class="{{ request()->is('admin/designation*') ? 'active' : null }}">
          <a href="{{ route('admin.designation.index') }}">
            <span class="menu-text">Designations</span>
            <span class="menu-thumb">
              <i class="fa fa-black-tie"></i>
            </span>
          </a>
        </li>
        <li class="{{ request()->is('admin/leave*') ? 'active' : null }}">
          <a href="{{ route('admin.leave.index') }}">
            <span class="menu-text">Leave</span>
            <span class="menu-thumb">
              <i class="fa fa-bed"></i>
            </span>
          </a>
        </li>
        <li class="{{ request()->is('admin/announcement*') ? 'active' : null }}">
          <a href="{{ route('admin.announcement.index') }}">
            <span class="menu-text">Announcements</span>
            <span class="menu-thumb">
              <i class="fa fa-bullhorn"></i>
            </span>
          </a>
        </li>
      @endif

      @if(Auth::user()->hasAnyRole(['Employee']))
        <li class="{{ request()->is('/') ? 'active' : null }}">
          <a href="{{ route('dashboard') }}">
            <span class="menu-text">Dashboard</span>
            <span class="menu-thumb">
              <i class="fa fa-dashboard"></i>
            </span>
          </a>
        </li>
        <li class="{{ request()->is('timesheet*') ? 'active' : null }}">
          <a href="{{ route('timesheet.index') }}">
            <span class="menu-text">Timesheet</span>
            <span class="menu-thumb">
              <i class="fa fa-calendar"></i>
            </span>
          </a>
        </li>
        <li class="{{ request()->is('leave*') ? 'active' : null }}">
          <a href="{{ route('leave.index') }}">
            <span class="menu-text">Leave</span>
            <span class="menu-thumb">
              <i class="fa fa-bed"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="menu-text">Payslip</span>
            <span class="menu-thumb">
              <i class="fa fa-dollar"></i>
            </span>
          </a>
        </li>
        <li class="{{ request()->is('announcement') ? 'active' : null }}">
          <a href="{{ route('announcement') }}">
            <span class="menu-text">Announcements</span>
            <span class="menu-thumb">
              <i class="fa fa-bullhorn"></i>
            </span>
          </a>
        </li>
      @endif
    </ul>
  </div>
</nav>