@extends('be.profile.index')
@section('content_profile')
    <form action="{{ route('update_password_user') }}" class="ant-form ant-form-horizontal" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="ant-row" style="margin-bottom: 20px;">
            <div class="ant-col ant-col-xs-24 ant-col-lg-6"></div>
            <div class="ant-col ant-col-xs-24 ant-col-lg-18">
                <div class="font-size-18 font-weight-bold">Đổi mật khẩu</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3"><label class="label_form_item_profile required">Mật khẩu hiện tại</label></div>
            <div class="col-lg-9">
                <div class="ant-form-item form_item_profile ant-form-item-has-success">
                    <div class="ant-row ant-form-item-row">
                        <div class="ant-col ant-form-item-control">
                            <div class="ant-form-item-control-input">
                                <div class="ant-form-item-control-input-content">
                                    <input class="form-control" placeholder="***********" name="old_password" aria-required="true"
                                        type="password" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3"><label class="label_form_item_profile required">Mật khẩu mới</label></div>
            <div class="col-lg-9">
                <div class="ant-form-item form_item_profile ant-form-item-has-success">
                    <div class="ant-row ant-form-item-row">
                        <div class="ant-col ant-form-item-control">
                            <div class="ant-form-item-control-input">
                                <div class="ant-form-item-control-input-content">
                                    <input class="form-control" placeholder="***********" name="new_password" aria-required="true"
                                        type="password" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3"><label class="label_form_item_profile required">Nhập lại mật khẩu mới</label></div>
            <div class="col-lg-9">
                <div class="ant-form-item form_item_profile ant-form-item-has-success">
                    <div class="ant-row ant-form-item-row">
                        <div class="ant-col ant-form-item-control">
                            <div class="ant-form-item-control-input">
                                <div class="ant-form-item-control-input-content">
                                    <input class="form-control" placeholder="***********" name="new_password_confirmation" aria-required="true"
                                        type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-8 gap-2">
            <button type="button" class=" btn btn-danger"><span><i class="fas fa-times"></i> Hủy</span>
            </button>
            <button type="submit" class="btn btn-success">
                <span><i class="fas fa-save"></i> Xác nhận</span></button>
        </div>
    </form>
@endsection
