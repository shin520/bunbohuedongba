<div class="header-area bg-white header-sticky only-mobile-sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header position-relative">
                    <div class="header-left d-block d-sm-none">
                        <img src="https://w.ladicdn.com/s450x450/5b4d9ec1ae9547417f88a9ea/bun-bo-20221031100740-swft3.jpg"
                            width="32px" height="32px" alt="">
                    </div>
                    <div class="header-center d-block d-sm-none">
                        <a href="" style="font-weight: bold; padding-left: 10px; color: #333">BÚN BÒ HUẾ ĐÔNG
                            BA</a>
                    </div>
                    <div class="header-right p-3 p-sm-0 p-md-0 flexible-image-slider-wrap">
                        <div class="header-right-inner" id="hidden-icon-wrapper">
                            <!-- Header Search Form -->
                            <div class="header-search-form d-none">
                                <form action="#" class="search-form-top">
                                    <input class="search-field" type="text" placeholder="Search…">
                                    <button class="search-submit">
                                        <i class="search-btn-icon fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- mobile menu -->
                        <div class="mobile-navigation-icon d-block d-xl-none" id="mobile-menu-trigger">
                            <i></i>
                        </div>
                        <!-- hidden icons menu -->
                        <div class="hidden-icons-menu d-none" id="hidden-icon-trigger">
                            <a href="javascript:void(0)">
                                <i class="far fa-ellipsis-h-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom-wrap border-top d-md-block d-none header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-bottom-inner">
                        <div class="header-bottom-left-wrap">
                            <!-- navigation menu -->
                            <div class="header__navigation d-none d-xl-block">
                                <nav class="navigation-menu">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="logo d-flex align-items-center">
                                                <a href="{{ url('/') }}"><img class="img_cover"
                                                        src="https://w.ladicdn.com/s450x450/5b4d9ec1ae9547417f88a9ea/bun-bo-20221031100740-swft3.jpg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="d-flex flex-column">
                                                <div class="row align-items-center special_border_bottom">

                                                    @foreach ($share['branch'] as $item)
                                                        <div class="col-lg-4 menu_top__chi_nhanh--item">
                                                            <div class="row align-items-center justify-content-center">
                                                                <div class="d-flex flex-column">
                                                                    <a href="{{ route('branch', $item->slug) }}">
                                                                        <div class="notranslate menu_top__chi_nhanh--title">
                                                                            {{ $item->name }}</div>
                                                                    </a>
                                                                    <div class="menu_top__chi_nhanh--address">
                                                                        {{ $item->address }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                                <ul class="row align-items-center justify-content-around pb-2">
                                                    <li class="menu_top__menu--item">
                                                        <a href="{{ route('page', $share['about_menu']->slug) }}">Giới
                                                            thiệu</a>
                                                    </li>
                                                    <li class="menu_top__menu--item">
                                                        <a href="{{ route('page', $share['all_branch_menu']->slug) }}">Hệ
                                                            thống cửa hàng</a>
                                                    </li>
                                                    <li class="menu_top__menu--item">
                                                        <a
                                                            href="{{ route('page', $share['all_product_menu']->slug) }}">Menu</a>
                                                    </li>
                                                    <li class="menu_top__menu--item">
                                                        <a
                                                            href="{{ route('page', $share['all_recruitment_menu']->slug) }}">Tuyển
                                                            dụng</a>
                                                    </li>
                                                    <li class="menu_top__menu--item">
                                                        <a href="{{ route('page', $share['all_post_menu']->slug) }}">tin
                                                            tức</a>
                                                    </li>
                                                    <li class="menu_top__menu--item">
                                                        <a href="{{ route('page', $share['contact_menu']->slug) }}">Liên
                                                            hệ</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 d-flex align-items-center justify-content-center">
                                            <div class="menu_end_land">
                                                <div class="branch_btn branch_btn--open">tìm cửa hàng</div>
                                                <div class="language">
                                                    <a style="margin-bottom:2px;" href="{{ route('change.locale',['vi']) }}">
                                                        <img src="{{ asset('storage/uploads/flag_icon/vietnam_32x32.png') }}" alt="vi" data-google-lang="" class="flag_icon">
                                                    </a> 
                                                    <a style="" href="{{ route('change.locale',['en']) }}">
                                                        <img src="{{ asset('storage/uploads/flag_icon/united-kingdom_32x32.png') }}" alt="en" data-google-lang="en" class="flag_icon">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-wrapper-reveal">
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-menu-overlay__inner">
            <div class="mobile-menu-overlay__header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-8">
                            <!-- logo -->
                            <div class="logo">
                                <a href="/">
                                    <img width="60px"
                                        src="https://w.ladicdn.com/s450x450/5b4d9ec1ae9547417f88a9ea/bun-bo-20221031100740-swft3.jpg"
                                        class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-4">
                            <!-- mobile menu content -->
                            <div class="mobile-menu-content text-right">
                                <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-overlay__body">
                <nav class="offcanvas-navigation">
                    <ul>
                        <li class="active">
                            <a href="{{ route('page', $share['about_menu']->slug) }}">Giới thiệu</a>
                        </li>
                        <li>
                            <a href="{{ route('page', $share['all_product_menu']->slug) }}">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{ route('page', $share['all_branch_menu']->slug) }}">Hệ thống cửa hàng</a>
                        </li>
                        <li>
                            <a href="{{ route('page', $share['all_post_menu']->slug) }}">Tin tức</a>
                        </li>
                        <li>
                            <a href="{{ route('page', $share['contact_menu']->slug) }}">Liên hệ</a>
                        </li>
                        <li>
                            <div class="language">
                                <a style="margin-right:10px;" href="{{ route('change.locale',['vi']) }}">
                                    <img src="{{ asset('storage/uploads/flag_icon/vietnam_32x32.png') }}" alt="vi" data-google-lang="" class="flag_icon">
                                </a> 
                                <a style="" href="{{ route('change.locale',['en']) }}">
                                    <img src="{{ asset('storage/uploads/flag_icon/united-kingdom_32x32.png') }}" alt="en" data-google-lang="en" class="flag_icon">
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
