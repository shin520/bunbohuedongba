<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">Tài khoản </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('history_get_link') ? 'active' : '' }}" href="{{ route('history_get_link') }}">Link đã get</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('chart') ? 'active' : '' }}" href="{{ route('chart') }}">Thống kê</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('setting') ? 'active' : '' }}" href="{{ route('setting') }}">Cài đặt</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    {{ __('Đăng xuất') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    {{-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
    </form> --}}
</div>
