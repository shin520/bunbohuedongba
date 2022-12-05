<li class="{{ request()->RouteIs('be.post*') ? 'mm-active' : '' }}">
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="bx bxs-news"></i>
        <span>QUẢN LÝ BÀI VIẾT</span>
    </a>
    <ul class="sub-menu" aria-expanded="true">
        <li><a class="{{request()->RouteIs('be.posttype.*') ? 'active' : ''}}"
                href="{{ route('be.posttype.index') }}"><i class="bx bx-right-arrow-alt
            "></i> DANH MỤC</a></li>
        @can('xem-bai-viet')
        <li><a class="{{request()->RouteIs('be.post.*') ? 'active' : ''}}" href="{{ route('be.post.index') }}"><i class="bx bx-right-arrow-alt
            "></i> BÀI VIẾT</a></li>
        @endcan
    </ul>
</li>
