<li class="{{ request()->RouteIs('be.course*') ? 'mm-active' : '' }}">
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="bx bxs-book"></i>
        <span>QUẢN LÍ KHÓA HỌC</span>
    </a>
    <ul class="sub-menu" aria-expanded="true">
        <li><a class="{{request()->RouteIs('be.coursetype.*') ? 'active' : ''}}"
                href="{{ route('be.coursetype.index') }}"><i class="bx bx-right-arrow-alt
            "></i> DANH MỤC</a></li>
        {{-- @can('xem-khoa-hoc') --}}
        <li><a class="{{request()->RouteIs('be.course.*') ? 'active' : ''}}" href="{{ route('be.course.index') }}"><i class="bx bx-right-arrow-alt
            "></i> DANH SÁCH</a></li>
        {{-- @endcan --}}
    </ul>
</li>
