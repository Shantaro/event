<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item">
      <a class="nav-link" href="{{route('home')}}">
        <i class="ti-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('eventList')}}">
        <i class="ti-align-justify menu-icon"></i>
        <span class="menu-title">Event List</span>
      </a>
    </li>

    @auth
    @if(auth()->user()->role === 'admin')
    <li class="nav-item">
      <a class="nav-link" href="{{route('userList')}}">
        <i class="ti-user menu-icon"></i>
        <span class="menu-title">User List</span>
      </a>
    </li>
    @endif

    @if(auth()->user()->role === 'member')
    <li class="nav-item">
      <a class="nav-link" href="{{route('registrationList')}}">
        <i class="ti-bookmark menu-icon"></i>
        <span class="menu-title">Order List</span>
      </a>
    </li>
    @endif
    @endauth

    @auth
    <li class="nav-item">
      <form id="logout-form" action="{{route('logout')}}" method="post">
        @csrf
      </form>
      <a class="nav-link" href="javascript:void(0)" onclick="$('#logout-form').submit();">
        <i class="ti-power-off menu-icon"></i>
        <span class="menu-title">Logout</span>
      </a>
    </li>
    @else
    <li class="nav-item">
      <a class="nav-link" href="{{route('login')}}">
        <i class="ti-power-off menu-icon"></i>
        <span class="menu-title">Login</span>
      </a>
    </li>
    @endauth
  </ul>
</nav>