@extends('be.profile.index')
@section('content_profile')
    <div class="ant-row" style="margin-bottom: 20px;">
        <div class="ant-col ant-col-xs-24 ant-col-lg-6"></div>
        <div class="ant-col ant-col-xs-24 ant-col-lg-18">
            <div class="font-size-18 font-weight-bold">Xác thực 2 bước</div>
        </div>
    </div>

    <div class="row">
        <p>Bảo vệ tài khoản của bạn bằng xác thực 2 bước. Khi bật xác thực 2 bước, bạn sẽ thêm một lớp bảo mật bổ sung
            vào tài khoản của mình trong trường hợp mật khẩu của bạn bị đánh cắp theo một trong những cách
            bên dưới:</p>
        <div class="row">

            <p class="text-primary text-decoration-underline">Tài khoản của bạn đang
                {{ $data->google2fa_enable == true ? 'Bật' : 'Tắt' }} xác thực 2 bước</p>

            <div class="btn-group mt-2 mt-xl-0" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="on" autocomplete="off"
                    {{ $data->google2fa_enable == true ? 'checked disabled' : '' }}>
                <label class="btn btn-success" for="on" data-bs-toggle="modal"
                    data-bs-target="#show_on_2fa"><i class="bx bx-smile label-icon"></i> Bật xác thực</label>



                <input type="radio" class="btn-check" name="btnradio" id="off" autocomplete="off"
                    {{ $data->google2fa_enable == false ? 'checked disabled' : '' }}>
                <label  data-bs-toggle="modal" data-bs-target="#show_off_2fa" class="btn btn-danger" for="off"><i class="bx bx-error label-icon "></i> Tắt xác thực</label>
            </div>

        </div>

    </div>


    <form action="{{ route('enable_2fa_user') }}" class="ant-form ant-form-horizontal" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT') <div class="modal fade" id="show_on_2fa" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="show_on_2faLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="show_on_2faLabel">Nhập mật khẩu để bật xác thực 2 bước</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" placeholder="Mật khẩu hiện tại" name="password" aria-required="true"
                            type="password">
                        <input class="form-control mt-2" placeholder="Mật khẩu ứng dụng" name="verify_code" aria-required="true"
                        type="password">
                    </div>
                    <div class="modal-footer">
                        <button data-bs-dismiss="modal" type="button" class=" btn btn-danger"><span><i
                                    class="fas fa-times"></i> Hủy</span>
                        </button>
                        <button type="submit" class="btn btn-success">
                            <span><i class="fas fa-save"></i> Xác nhận</span></button>
                    </div>
                </div>
            </div>

        </div>
    </form>


    <form action="{{ route('disable_2fa_user') }}" class="ant-form ant-form-horizontal" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT') <div class="modal fade" id="show_off_2fa" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="show_off_2faLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="show_off_2faLabel">Nhập mật khẩu để tắt xác thực 2 bước</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control" placeholder="Mật khẩu hiện tại" name="password" aria-required="true"
                        type="password">
                    <input class="form-control mt-2" placeholder="Mật khẩu ứng dụng" name="verify_code" aria-required="true"
                    type="password">
                </div>
                <div class="modal-footer">
                    <button data-bs-dismiss="modal" type="button" class=" btn btn-danger"><span><i
                                class="fas fa-times"></i> Hủy</span>
                    </button>
                    <button type="submit" class="btn btn-success">
                        <span><i class="fas fa-save"></i> Xác nhận</span></button>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection
