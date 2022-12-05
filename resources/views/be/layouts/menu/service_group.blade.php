<li class="{{ request()->RouteIs('be.service*') ? 'mm-active' : '' }}">
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="bx bxs-package"></i>
        <span>QUẢN LÝ DỊCH VỤ</span>
    </a>
    <ul class="sub-menu" aria-expanded="true">
        <li><a class="{{request()->RouteIs('be.servicetype.*') ? 'active' : ''}}"
                href="{{ route('be.servicetype.index') }}"><i class="bx bx-right-arrow-alt
            "></i> DANH MỤC</a></li>
        {{-- @can('xem-khoa-hoc') --}}
        <li><a class="{{request()->RouteIs('be.service.*') ? 'active' : ''}}" href="{{ route('be.service.index') }}"><i class="bx bx-right-arrow-alt
            "></i> DANH SÁCH</a></li>
        {{-- @endcan --}}
    </ul>
</li>