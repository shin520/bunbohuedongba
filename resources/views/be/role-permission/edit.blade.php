@extends('be.layouts.app')
@section('content')
    <div class="card-body">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">CẬP NHẬT CẤP ĐỘ
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('be.role_permission.index') }}">Cấp Độ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <form action="{{ route('be.role_permission.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="">TÊN - VAI TRÒ</label>
                        <input value="{{ old('name') ?? $data->description }}" type="text" class="form-control" name="name"
                            id="name_new">
                    </div>
                </div>
                <div class="col-md-9 mb-3">
                    <label for="">CHỌN QUYỀN</label>
                    <div class="row form-control d-flex">
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.analystic')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.contact-mail')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.course-type')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.course')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.dashboard')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.download-history')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.file-manager')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.gallery-type')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.gallery')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.log-activity')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.order')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.policy')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.post')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.post-type')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.product')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.product-cate-1')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.product-cate-2')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.setting')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.slide')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.social-network')
                        </div>
                        <div class="col-md-3 col-6">
                            @include('be.role-permission.component.edit.static-page')
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
