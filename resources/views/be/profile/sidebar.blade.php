<div class="col-md-3">
    <div class="card card-bordered">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center py-3 border-bottom border-2 w-full">
                <div class="w-max position-relative"><span class="ant-avatar ant-avatar-circle ant-avatar-icon"
                        style="width: 55px; height: 55px; line-height: 55px; font-size: 27.5px;"><img
                            src="{{ asset('storage/uploads/'. $data->img ) }}"
                            alt="{{ $data->email }}"></span>
                    <div class="badge_profile"></div>
                </div>
                <div class="mt-2" style="flex: 1 1 0%;">
                    <h5 class="font-size-17 mb-0 text-center font-semibold">{{ $data->name }}</h5>
                    <div class="text-black7 font-size-13 text-center">{{ $data->phone }}</div>
                    <div class="text-black7 font-size-13 text-center">{{ $data->email }}</div>
                </div>
            </div>
            {{-- <div class="d-flex flex-column py-2 border-bottom border-2 w-full">
                <div style="flex: 1 1 0%;">
                    <h5 class="font-size-14 mb-1 font-semibold">Trạng thái tài khoản</h5>
                    <div
                        class="d-flex justify-content-between align-items-center text-black7 font-size-13 py-1">
                        Xác thực email <i class="bx bxs-check-circle"></i></div>
                    <div
                        class="d-flex justify-content-between align-items-center text-black7 font-size-13 py-1">
                        Xác thực số điện thoại <i class="bx bxs-check-circle"></i></div>
                </div>
            </div> --}}
            <ul class="ant-menu ant-menu-root ant-menu-vertical " style="border-right: none;">
                <li class="ant-menu-item {{ request()->routeis('profile') ? 'ant-menu-item-selected' : '' }}" > <span class="ant-menu-title-content"><a class="{{ request()->routeis('profile') ? 'link_profile_active' : '' }}" title="Thông tin cá nhân" href="{{ route('profile') }}"><i class="bx bxs-user-rectangle"></i> Thông tin cá nhân</a>
                        <div class="{{ request()->routeis('profile') ? 'link_right_profile_select' : '' }}"></div></span></li>

                <li class="ant-menu-item {{ request()->routeis('password') ? 'ant-menu-item-selected' : '' }}" ><span class="ant-menu-title-content"><a class="{{ request()->routeis('password') ? 'link_profile_active' : '' }}"
                            title="Thay đổi mật khẩu" href="{{ route('password') }}"><i class="bx bxs-lock-open-alt"></i> Thay đổi mật khẩu</a>
                            <div class="{{ request()->routeis('password') ? 'link_right_profile_select' : '' }}"></div></span></li>


                <li class="ant-menu-item {{ request()->routeis('show_2fa') ? 'ant-menu-item-selected' : '' }}"><span class="ant-menu-title-content"><a class="{{ request()->routeis('show_2fa') ? 'link_profile_active' : '' }}"
                            title="Xác thực 2 bước" href="{{ route('show_2fa') }}"><i class="bx bxl-google"></i> Xác thực 2 bước</a>
                            <div class="{{ request()->routeis('show_2fa') ? 'link_right_profile_select' : '' }}"></div></span></li>

                <li class="ant-menu-item {{ request()->routeis('show_history_login') ? 'ant-menu-item-selected' : '' }}" ><span class="ant-menu-title-content"><a class="{{ request()->routeis('show_history_login') ? 'link_profile_active' : '' }}"
                            title="Lịch sử đăng nhập" href="{{ route('show_history_login') }}"><i class="bx bx-log-in-circle"></i> Lịch sử đăng nhập</a>
                            <div class="{{ request()->routeis('show_history_login') ? 'link_right_profile_select' : '' }}"></div></span>
                </li>
            </ul>
        </div>
    </div>
</div>
