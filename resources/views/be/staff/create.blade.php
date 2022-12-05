@extends('be.layouts.app')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Thêm nhân viên
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('be.staff.index') }}">Nhân viên</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <form action="{{ route('be.staff.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row d-flex justify-content-center" id="create_form">
            <div class="col-md-9 mb-3">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">TÊN</label>
                            <input placeholder="Nguyễn Văn A" value="{{ old('name') }}" type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">NGÀY SINH</label>
                            <input value="{{ old('birth') }}" type="date" class="form-control" name="birth">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">EMAIL</label>
                            <input placeholder="xxx@xxx.xxx" value="{{ old('email') }}" type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">MẬT KHẨU</label>
                            <small class="gen__code">
                                <i class="bx bx-lock-alt"></i> Tạo mật khẩu
                            </small>
                            <input id="show_pass" placeholder="********" value="{{ old('password') }}" type="text" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">SĐT</label>
                            <input placeholder="0836xxxxxx" value="{{ old('phone') }}" type="text" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">ĐỊA CHỈ</label>
                            <input value="{{ old('address') }}" placeholder="326/32/xx Lê Đức Thọ, P.13, Q.Gò Vấp, TP.HCM" type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">VAI TRÒ</label>
                            <small><i class="fas fa-question-circle" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Người dùng sẽ được giới hạn quyền sử dụng Panel Admin" title="VAI TRÒ"></i></small>
                            <select name="role" class="form-control">
                                <option value="">---Chọn vai trò---</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">TRẠNG THÁI</label>
                            <small><i class="fas fa-question-circle" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Kích hoạt tài khoản của nhân viên, Hoạt động / Vô hiệu hóa" title="TRẠNG THÁI"></i></small>
                            <select name="status" class="form-control">
                                <option selected value="1">Hoạt động</option>
                                <option value="0">Vô hiệu hóa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">GHI CHÚ</label>
                        <textarea name="note" class="form-control" id="elm1" cols="30" rows="10"></textarea>
                    </div>
                </div>

            </div>
            <div class="col-md-3 mb-3">
                <div class="form-group mb-3">
                    <label for="">ẢNH ĐẠI DIỆN</label>
                    <small><i class="fas fa-question-circle" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Tỉ lệ hình vuông, kích thước gợi ý là (100px X 100px)" title="ẢNH ĐẠI DIỆN"></i></small>
                    <img id="imgpreview" src="{{ asset('storage/uploads') }}/noavatar.png"
                        class="img-fluid mb-2">
                    <input type="file" name="img" class="form-control" data-toggle="tooltip"
                        data-placement="top" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group mb-3">
                    <label for="">MÃ NHÂN VIÊN</label>
                    <input type="text" name="staff_code" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">FILE HỒ SƠ</label>
                    <small><i class="fas fa-question-circle" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Tải lên hồ sơ nhân viên, ZIP hoặc PDF" title="FILE HỒ SƠ"></i></small>
                    <input type="file" name="file" class="form-control">
                </div>
            </div>
            @include('be.component.button_submit',['model'=>'staff'])
        </div>
    </form>
</div>
@endsection
@push('script')
<script>

function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}


    function generatePassword(passwordLength) {
    var numberChars = "0123456789";
    var upperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var lowerChars = "abcdefghijklmnopqrstuvwxyz";
    var allChars = numberChars + upperChars + lowerChars;
    var randPasswordArray = Array(passwordLength);
    randPasswordArray[0] = numberChars;
    randPasswordArray[1] = upperChars;
    randPasswordArray[2] = lowerChars;
    randPasswordArray = randPasswordArray.fill(allChars, 3);
    return shuffleArray(randPasswordArray.map(function (x) {
        return x[Math.floor(Math.random() * x.length)]
    })).join('');
}

    $(".gen__code").on("click", function () {
    var code = generatePassword(10);
    $('#show_pass').val(code);
});

</script>
@endpush
