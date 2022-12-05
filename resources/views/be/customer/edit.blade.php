@extends('be.layouts.app')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Cập nhật thông tin khách hàng
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('be.customer.index') }}">Khách hàng</a></li>
                        <li class="breadcrumb-item active"  aria-current="page">Sửa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <form action="{{ route('be.customer.update',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 mb-3">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="">TÊN</label>
                            <input placeholder="Nguyễn Văn A" value="{{ old('name') ?? $data->name }}" type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="">NGÀY SINH</label>
                            <input value="{{ old('birth') ?? $data->birth }}" type="date" class="form-control" name="birth">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="">SĐT</label>
                            <input placeholder="0836xxxxxx" value="{{ old('phone') ?? $data->phone }}" type="text" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="">EMAIL</label>
                            <input placeholder="xxx@xxx.com" value="{{ old('email') ?? $data->email }}" type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="col-md-8 mb-3">
                        <div class="form-group">
                            <label for="">ĐỊA CHỈ</label>
                            <input value="{{ old('address') ?? $data->address }}" placeholder="326/32/xx Lê Đức Thọ, P.13, Q.Gò Vấp, TP.HCM" type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="">TRẠNG THÁI</label>
                            <select name="status" class="form-control">
                                <option {{ $data->status == 1 ? 'selected' : '' }} value="1">Hoạt động</option>
                                <option  {{ $data->status == 0 ? 'selected' : '' }} value="0">Vô hiệu hóa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#history_topup" role="tab" aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Lịch sử nạp tiền</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#service" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Dịch vụ</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#course" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Khóa học</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#history_login" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Lịch sử truy cập</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="history_topup" role="tabpanel">
                            Lich su nap tien
                        </div>
                        <div class="tab-pane" id="service" role="tabpanel">
                           Dich vu dang su dung
                        </div>
                        <div class="tab-pane" id="course" role="tabpanel">
                          Khoa hoc da mua
                        </div>
                        <div class="tab-pane" id="history_login" role="tabpanel">
                           Lich su dang nhap
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="form-group mb-3">
                    <label for="">ẢNH ĐẠI DIỆN</label>
                    <img id="imgpreview" src="{{ asset('storage/uploads') }}/{{ $data->img == '' ? 'placeholder.png' : $data->img }}" class="img-fluid mb-2">
                    <input type="file" name="img" class="form-control" data-toggle="tooltip" data-placement="top" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group mb-3">
                    <label for="">FILE HỒ SƠ </label>
                    @if($data->file)
                    <small class="ml-2"><a target="_blank" href="{{ asset('storage/uploads/'.$data->file) }}"><i class="bx bx-download"></i> Tải về</a></small>
                    @endif
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">NGÀY ĐĂNG KÝ</label>
                    <input type="text" readonly disabled class="form-control" value=" {{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y H:i:s') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="">SỐ TIỀN ĐÃ NẠP</label>
                    <input type="text" class="form-control" value="{{ number_format($data->wallet->total_money_charge ?? '0') }} VNĐ" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="">CẤP ĐỘ HIỆN TẠI</label>
                    <input disabled type="text" class="form-control" value="{{ $data->wallet->level->name ?? '' }}">
                </div>
            </div>
            @include('be.component.button_submit',['model'=>'customer'])
        </div>
    </form>
</div>
@endsection
