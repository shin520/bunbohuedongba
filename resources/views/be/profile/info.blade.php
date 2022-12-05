@extends('be.profile.index')
@section('content_profile')
    <form action="{{ route('update_profile_user') }}" class="ant-form ant-form-horizontal update_profile" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="ant-row" style="margin-bottom: 20px;">
            <div class="ant-col ant-col-xs-24 ant-col-lg-6"></div>
            <div class="ant-col ant-col-xs-24 ant-col-lg-18">
                <div class="font-size-18 font-weight-bold">Cập nhật ảnh đại diện</div>
            </div>
        </div>
        <div class="ant-row" style="margin-bottom: 20px;">
            <div class="ant-col ant-col-xs-24 ant-col-lg-6"><label class="label_form_item_profile">Ảnh
                    đại diện</label></div>
            <div class="ant-col ant-col-xs-24 ant-col-lg-18">
                <div class="box_avatar"><img src="{{ asset('storage/uploads/' . $data->img) }}" alt=""><label
                        class="btn_edit_avatar"><span class="anticon anticon-edit font-size-13">
                            <i class="bx bx-edit-alt"></i>
                        </span>
                        <input accept="image/png, image/jpg, image/jpeg" type="file" class="image-upload" id="file"
                            name="img" style="display: none;"></label></div>
                <div class="mt-2" style="color: #b5b5c3; font-size: 13px; ">Chấp nhận những ảnh theo định
                    dạng:png, jpg, jpeg</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3"><label class="label_form_item_profile required">Email</label></div>
            <div class="col-lg-9">
                <div class="ant-form-item form_item_profile ant-form-item-has-success">
                    <div class="ant-row ant-form-item-row">
                        <div class="ant-col ant-form-item-control">
                            <div class="ant-form-item-control-input">
                                <div class="ant-form-item-control-input-content">
                                    <input class="form-control" placeholder="Email" name="email" aria-required="true"
                                        type="text" value="{{ $data->email }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3"><label class="label_form_item_profile required">SĐT</label></div>
            <div class="col-lg-9">
                <div class="ant-form-item form_item_profile ant-form-item-has-success">
                    <div class="ant-row ant-form-item-row">
                        <div class="ant-col ant-form-item-control">
                            <div class="ant-form-item-control-input">
                                <div class="ant-form-item-control-input-content">
                                    <input class="form-control" placeholder="SĐT" name="phone" aria-required="true"
                                        type="text" value="{{ $data->phone }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3"><label class="label_form_item_profile required">Họ tên</label></div>
            <div class="col-lg-9">
                <div class="ant-form-item form_item_profile ant-form-item-has-success">
                    <div class="ant-row ant-form-item-row">
                        <div class="ant-col ant-form-item-control">
                            <div class="ant-form-item-control-input">
                                <div class="ant-form-item-control-input-content">
                                    <input class="form-control" placeholder="Họ tên" name="name" aria-required="true"
                                        type="text" value="{{ $data->name }}">
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
