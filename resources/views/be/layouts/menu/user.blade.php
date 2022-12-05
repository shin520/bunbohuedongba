<li class="{{ request()->RouteIs('be.customer*') || request()->RouteIs('be.role_permission*') || request()->RouteIs('be.staff*') || request()->RouteIs('be.level*') ? 'mm-active' : '' }}">
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="bx bx-user-pin"></i>
        <span>NGƯỜI DÙNG</span>
    </a>
    <ul class="sub-menu" aria-expanded="true">
        <li><a class="{{request()->RouteIs('be.staff.*') ? 'active' : ''}}" href="{{ route('be.staff.index') }}" ><i class="bx bx-right-arrow-alt
            "></i> NHÂN VIÊN</a></li>
        <li><a class="{{request()->RouteIs('be.customer.*') ? 'active' : ''}}" href="{{ route('be.customer.index') }}" ><i class="bx bx-right-arrow-alt
            "></i> KHÁCH HÀNG</a></li>
        <li><a class="{{request()->RouteIs('be.level.*') ? 'active' : ''}}" href="{{ route('be.level.index') }}" ><i class="bx bx-right-arrow-alt
            "></i> CẤP ĐỘ</a></li>
        <li><a class="{{request()->RouteIs('be.role_permission.*') ? 'active' : ''}}" href="{{ route('be.role_permission.index') }}" ><i class="bx bx-right-arrow-alt
            "></i> PHÂN QUYỀN</a></li>
    </ul>
</li>
