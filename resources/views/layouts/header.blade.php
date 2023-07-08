<div class="header">
    <div class="header-left">
        <a href="{{ route('users.index') }}" class="logo">
            <img src="{{ asset('assets/img/xMatch_logo.png') }}" alt="logo" height="40">
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    <div class="page-title-box">
        <h3>xMatch</h3>
    </div>
    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              {{--  <span class="user-img"> --}}
              {{--      <img src="{{ !empty(auth()->user()->image) ? asset(auth()->user()->image) : 'https://ui-avatars.com/api/?name=' . auth()->user()->first_name . '+' . auth()->user()->last_name }}" alt="user"> --}}
              {{--  <span class="status online"></span></span> --}}
              {{--  <span>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span> --}}
            </a>
            <div class="dropdown-menu">
               {{--  <a class="dropdown-item" href="{{ route('profile') }}">My Profile</a>--}}
               {{--  <form action="{{ route('logout') }}" method="POST">--}}
               {{--      @csrf--}}
               {{--      <button type="submit" class="dropdown-item">Logout</button>--}}
               {{--  </form>--}}
            </div>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">My Profile</a>
            {{--<a class="dropdown-item" href="{{ route('logout') }}">Settings</a>--}}
            <form action="#" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
        </div>
    </div>
</div>
