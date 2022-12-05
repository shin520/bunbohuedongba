@extends('be.layouts.app')
@section('content')
    <div class="card-body">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">THÊM VAI TRÒ
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Người dùng</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('be.role_permission.index') }}">Quyền & Vai trò</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <form action="{{ route('be.role_permission.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" id="create_form">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="">TÊN</label>
                                <input value="{{ old('name') }}" type="text" class="form-control" name="name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 mb-3">
                    <label for="">CHỌN QUYỀN</label>
                    <div class="row form-control d-flex">
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.analystic')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.contact-mail')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.course-type')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.course')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.dashboard')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.download-history')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.file-manager')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.gallery-type')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.gallery')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.log-activity')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.order')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.policy')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.post-type')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.post')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.product-cate-1')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.product-cate-2')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.product')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.setting')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.slide')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.social-network')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.static-page')
                        </div>
                        
                    </div>
                </div>
               @include('be.component.button_submit',['model'=>'role_permission'])
            </div>
        </form>
    </div>
@endsection
@push('script')
<script>
    $('.check-all').on('click', function(e) {
        if ($(this).is(':checked', true)) {
            $(this).parent('.gr_pick_all').find(".checkbox").prop('checked', true);
        } else {
            $(this).parent('.gr_pick_all').find(".checkbox").prop('checked', false);
        }
    });
</script>
@endpush   
