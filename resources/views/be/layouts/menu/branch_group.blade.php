<li class="{{ request()->RouteIs('be.branch_category_1.*') | request()->RouteIs('be.branch_category_2.*') | request()->RouteIs('be.branch.*') ? 'mm-active' : '' }}">
    <a href="javascript: void(0);" class="has-arrow waves-effect {{ request()->RouteIs('be.branch.*') ? 'mm-active' : '' }}">
        <i class="bx bx-package"></i>
        <span>{{ __('QUẢN LÝ CHI NHÁNH') }}</span>
    </a>
    <ul class="sub-menu" >
        <li><a class="{{request()->RouteIs('be.branch_category_1.*') ? 'active' : ''}}" href="{{ route('be.branch_category_1.index') }}" ><i class="bx bx-right-arrow-alt
            "></i> {{ __('DANH MỤC CẤP 1') }}</a></li>
        <li><a class="{{request()->RouteIs('be.branch_category_2.*') ? 'active' : ''}}" href="{{ route('be.branch_category_2.index') }}" ><i class="bx bx-right-arrow-alt
            "></i> {{ __('DANH MỤC CẤP 2') }}</a></li>
        <li><a class="{{request()->RouteIs('be.branch.*') ? 'active' : ''}}" href="{{ route('be.branch.index') }}" ><i class="bx bx-right-arrow-alt
            "></i> {{ __('CHI NHÁNH') }}</a></li>
    </ul>
</li>
