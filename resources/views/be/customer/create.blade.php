@extends('be.layouts.app')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Thêm khách hàng
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('be.customer.index') }}">Khách hàng</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <form action="{{ route('be.customer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row d-flex justify-content-center" id="create_form">
            <div class="col-md-9 mb-3">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="">TÊN</label>
                            <input placeholder="Nguyễn Văn A" value="{{ old('name') }}" type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="">NGÀY SINH</label>
                            <input value="{{ old('birth') }}" type="date" class="form-control" name="birth">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="">SĐT</label>
                            <input placeholder="0836xxxxxx" value="{{ old('phone') }}" type="text" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input placeholder="xxx@xxx.com" value="{{ old('email') }}" type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="col-md-8 mb-3">
                        <div class="form-group">
                            <label for="">ĐỊA CHỈ</label>
                            <input value="{{ old('address') }}" placeholder="326/32/xx Lê Đức Thọ, P.13, Q.Gò Vấp, TP.HCM" type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="">TRẠNG THÁI</label>
                            <select name="status" class="form-control">
                                <option selected value="1">Hoạt động</option>
                                <option value="0">Vô hiệu hóa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Ghi chú</label>
                        <textarea name="note" id="elm1" cols="30" rows="10"></textarea>
                    </div>
                </div>

            </div>
            <div class="col-md-3 mb-3">
                <div class="form-group mb-3">
                    <label for="">ẢNH ĐẠI DIỆN</label>
                    <img id="imgpreview" src="{{ asset('storage/uploads') }}/noavatar.png"
                        class="img-fluid mb-2">
                    <input type="file" name="img" class="form-control" data-toggle="tooltip"
                        data-placement="top" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group mb-3">
                    <label for="">FILE HỒ SƠ KHÁCH HÀNG</label>
                    <br>
                    <small>(File ZIP, PDF ~ 5MB)</small>
                    <input type="file" name="file" class="form-control" data-toggle="tooltip"
                        data-placement="top">
                </div>
            </div>
           @include('be.component.button_submit',['model'=>'customer'])
        </div>
    </form>
</div>
@endsection

