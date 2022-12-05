<li class="{{ request()->RouteIs('be.gallery*') || request()->RouteIs('be.gallerytype*')? 'mm-active' : '' }}">
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="bx bxs-image"></i>
        <span>THƯ VIỆN ẢNH</span>
    </a>
    <ul class="sub-menu" aria-expanded="true">
        <li><a class="{{request()->RouteIs('be.gallerytype.*') ? 'active' : ''}}"
                href="{{ route('be.gallerytype.index') }}"><i class="bx bx-right-arrow-alt
            "></i> DANH MỤC</a></li>
        <li><a class="{{request()->RouteIs('be.gallery.*') ? 'active' : ''}}" href="{{ route('be.gallery.index') }}"><i class="bx bx-right-arrow-alt
            "></i> GALLERY</a></li>
    </ul>
</li>
