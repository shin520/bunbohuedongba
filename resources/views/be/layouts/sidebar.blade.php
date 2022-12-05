<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">BẢNG ĐIỀU KHIỂN</li>
                @include('be.layouts.menu.dashboard')<!--Tổng quan-->
                {{-- @include('be.layouts.menu.analytics')<!--Google Analytic--> --}}
                <li class="menu-title">QUẢN LÝ</li>
                {{-- @include('be.layouts.menu.billing')<!--Hóa đơn--> --}}
                @include('be.layouts.menu.contact')<!--Thư liên hệ-->
                @include('be.layouts.menu.order')<!--Đặt bàn-->
                @include('be.layouts.menu.recruitment')<!--Khóa học -->
                {{-- @include('be.layouts.menu.history_download')<!--Lịch sử tải xuống--> --}}
                @include('be.layouts.menu.post_group')<!--Nhóm bài viết-->
                @include('be.layouts.menu.product_group')<!--Nhóm sản phẩm-->
                @include('be.layouts.menu.static_page')<!--Trang tĩnh-->
                @include('be.layouts.menu.static_content')<!--Nội dung tĩnh-->
                @include('be.layouts.menu.branch_group')<!--Coaching-->
                {{-- @include('be.layouts.menu.about')<!--Chính sách--> --}}
                @include('be.layouts.menu.policy')<!--Chính sách-->
                @include('be.layouts.menu.feedback')<!--Chính sách-->
                @include('be.layouts.menu.slide')<!--Slide hình ảnh-->
                @include('be.layouts.menu.gallery_group')<!--Thư viện ảnh-->
                {{-- @include('be.layouts.menu.user')<!--Người dùng--> --}}
                {{-- @include('be.layouts.menu.whyus')<!--Lý do chọn--> --}}
                {{-- @include('be.layouts.menu.step')<!--Quy trình--> --}}
                @include('be.layouts.menu.service_group')<!--Dịch vụ-->
                {{-- <li class="menu-title">LƯU TRỮ</li> --}}
                {{-- @include('be.layouts.menu.filemanager')<!--Quản lí file--> --}}
                <li class="menu-title">THÔNG TIN</li>
                @include('be.layouts.menu.setting')<!--Cài đặt chung-->
                @include('be.layouts.menu.social')<!--Mạng xã hội-->
                {{-- @include('be.layouts.menu.log')<!--Log hoạt động--> --}}
            </ul>
        </div>
    </div>
</div>
