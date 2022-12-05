@extends('be.layouts.app')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Cập nhật thông tin nhân viên
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('be.staff.index') }}">Nhân viên</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sửa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <form action="{{ route('be.staff.update',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 mb-3">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">TÊN</label>
                            <input placeholder="Nguyễn Văn A" value="{{ old('name') ?? $data->name }}" type="text"
                                class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">NGÀY SINH</label>
                            <input value="{{ old('birth') ?? $data->birth }}" type="date" class="form-control"
                                name="birth">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">EMAIL</label>
                            <input placeholder="xxx@xxx.xxx" value="{{ old('email') ?? $data->email }}" type="text" class="form-control" name="email">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">MẬT KHẨU</label>
                            <small class="reset__pass">
                                <i class="bx bx-reset"></i> Reset mật khẩu
                            </small>
                            <input disabled readonly placeholder="*******" type="password" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">SĐT</label>
                            <input placeholder="0836xxxxxx" value="{{ old('phone') ?? $data->phone }}" type="text"
                                class="form-control" name="phone">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">ĐỊA CHỈ</label>
                            <input value="{{ old('address') ?? $data->address }}"
                                placeholder="326/32/xx Lê Đức Thọ, P.13, Q.Gò Vấp, TP.HCM" type="text"
                                class="form-control" name="address">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">VAI TRÒ</label>
                            <small><i class="fas fa-question-circle" data-bs-toggle="popover" data-bs-placement="top"
                                    data-bs-content="Người dùng sẽ được giới hạn quyền sử dụng Panel Admin"
                                    title="VAI TRÒ"></i></small>
                            <select name="role" class="form-control">
                                <option value="">---Chọn vai trò---</option>
                                @foreach ($roles as $role)
                                @if($data->roles->count() > 0)
                                <option {{ $data->roles->first()->id  == $role->id ? 'selected': '' }} value="{{ $role->id }}">{{ $role->description }}</option>
                                @else
                                <option value="{{ $role->id }}">{{ $role->description }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">TRẠNG THÁI</label>
                            <small><i class="fas fa-question-circle" data-bs-toggle="popover" data-bs-placement="top"
                                    data-bs-content="Kích hoạt tài khoản của nhân viên, Hoạt động / Vô hiệu hóa"
                                    title="TRẠNG THÁI"></i></small>
                            <select name="status" class="form-control">
                                <option {{ $data->status == 1 ? 'selected' : '' }} value="1">Hoạt động</option>
                                <option {{ $data->status == 0 ? 'selected' : '' }} value="0">Vô hiệu hóa</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">GHI CHÚ</label>
                        <textarea name="note" class="form-control" id="elm1" cols="30" rows="10">{!! $data->note ?? old('note') !!}</textarea>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#history_topup" role="tab"
                                aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Lịch sử hoạt động</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#history_login" role="tab"
                                aria-selected="false">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Lịch sử truy cập</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="history_topup" role="tabpanel">

                        </div>

                        <div class="tab-pane" id="history_login" role="tabpanel">
                            @include('be.staff.paginate')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="form-group mb-3">
                    <label for="">ẢNH ĐẠI DIỆN</label>
                    <small><i class="fas fa-question-circle" data-bs-toggle="popover" data-bs-placement="top"
                            data-bs-content="Tỉ lệ hình vuông, kích thước gợi ý là (100px X 100px)"
                            title="ẢNH ĐẠI DIỆN"></i></small>
                    <img id="imgpreview"
                        src="{{ asset('storage/uploads') }}/{{ $data->img == '' ? 'placeholder.png' : $data->img }}"
                        class="img-fluid mb-2">
                    <input type="file" name="img" class="form-control" data-toggle="tooltip" data-placement="top"
                        oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group mb-3">
                    <label for="">FILE HỒ SƠ </label>
                    @if($data->file)
                    <small class="ml-2"><a target="_blank" href="{{ asset('storage/uploads/'.$data->file) }}"><i
                                class="bx bx-download"></i> Tải về</a></small>
                    @endif
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">NGÀY ĐĂNG KÝ</label>
                    <input type="text" readonly disabled class="form-control"
                        value=" {{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y H:i:s') }}">
                </div>

            </div>

            @include('be.component.button_submit',['model'=>'staff'])

        </div>
    </form>
</div>
@endsection
@push('script')
<script>
    $('.reset__pass').click(function(){
            var id = '{{ "$data->id" }}';
            var _token = $('meta[name="csrf-token"]').attr('content');
            Swal.fire({
            title: 'Nhập mật khẩu muốn khôi phục',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            cancelButtonText: 'Hủy',
            confirmButtonText: 'Xác nhận',
            showLoaderOnConfirm: true,
            preConfirm: (password) => {
                $.ajax({
                type: "POST",
                url: '{{ route('be.staff.reset_password') }}',
                data: {
                    id: id,
                    password:password,
                    _token:_token
                },
            })
            },
            allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Thành công',
                'Đã reset mật khẩu!',
                'success'
                )
            }
            })
        })
</script>
<script>
    $(document).ready(function(){
     $(document).on('click', '.pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page);
     });
     function fetch_data(page)
     {
      $.ajax({
       url:"{{ route('paginate_history_login_user',$data->id) }}?page="+page,
       success:function(data)
       {
        $('#history_login').html(data);
       }
      });
     }
    });
</script>
@endpush
