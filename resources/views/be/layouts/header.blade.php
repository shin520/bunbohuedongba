<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                {{-- <a href="{{ url('/admin') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/assets/images/logo.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a> --}}

                <a href="{{ url('/admin') }}" class="logo logo-light">
                    {{-- <span class="logo-sm">
                        <img src="/assets/images/logo-light.svg" alt="" height="22">
                    </span> --}}
                    <span class="logo-lg text-white">
                        <img src="{{ asset('storage/uploads/'.$setting->logo_dark) }}" alt="" class="w-100">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            {{-- <form method="POST" action="{{ route('check_link') }}" class="app-search d-none d-lg-block form_check_link">
                @csrf
                <div class="position-relative">
                    <input name="link" type="text" class="form-control" placeholder="Nhập link vào để kiểm tra có hay chưa ...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form> --}}

        </div>

        <div class="d-flex">

            {{-- <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form method="POST" action="{{ route('check_link') }}" class="form_check_link p-3">
                        @csrf
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nhập link để kiểm tra..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}


            <div class="dropdown d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-customize"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <div class="px-lg-2">
                        <div class="row g-0">
                            <div class="col">
                                @if ($setting->maintain == 0)
                                        <a class="dropdown-icon-item" href="#" data-bs-toggle="modal" data-bs-target="#popup_maintain" title="Bảo trì Website">
                                            <img src="{{ asset('assets/images/on.png') }}" alt="ON">
                                            <span>Đang ON</span>
                                        </a>
                                @else
                                        <a class="dropdown-icon-item" data-bs-toggle="modal" data-bs-target="#popup_offmaintain" class="active-confirm" href="#"
                                            data-toggle="modal" data-bs-target="#popup_offmaintain" title="Website đang bảo trì">
                                            <img src="{{ asset('assets/images/off.png') }}" alt="OFF">
                                            <span>Đang OFF</span>
                                        </a>
                                @endif
                            </div>

                            <div class="col">
                                <a class="dropdown-icon-item" href="{{ route('sitemap') }}" target="_blank">
                                    <img src="{{ asset('assets/images/sitemap.png') }}" alt="sitemap">
                                    <span>Sitemap</span>
                                </a>
                            </div>

                            <div class="col">
                                <a class="dropdown-icon-item" href="{{ url('/') }}" target="_blank">
                                    <img src="{{ asset('assets/images/viewweb.png') }}" alt="Xem Web">
                                    <span>Xem Web</span>
                                </a>
                            </div>
                        </div>

                        {{-- <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#" disabled>
                                    <img src="{{ asset('assets/images/import.png') }}" alt="Import">
                                    <span>Chèn DB</span>
                                </a>
                            </div>

                            <div class="col">
                                <a class="dropdown-icon-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop_export" href="#">
                                    <img src="{{ asset('assets/images/export.png') }}" alt="Export">
                                    <span>Xuất DB</span>
                                </a>
                            </div>

                            <div class="col">
                                <a class="dropdown-icon-item caching_web" href="{{ route('caching') }}">
                                    <img src="{{ asset('assets/images/cache.png') }}" alt="Cache">
                                    <span>Tối ưu cache</span>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('storage/uploads/'.Auth::user()->img ?? '') }}"
                        alt="{{ Auth::user()->name }}">
                    <span class="d-none d-xl-inline-block ms-1" key="t-{{ Auth::user()->name ?? '' }}">{{ Auth::user()->name ?? '' }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Thông tin</span></a>

                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Đăng xuất</span></a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>

        </div>
    </div>
</header>
@include('be.layouts.modal-import')
@include('be.layouts.modal-export')
@include('be.layouts.on_maintain')
@include('be.layouts.off_maintain')
@include('be.layouts.reset_pass_maintain')
