@extends('be.layouts.app')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Nhân viên
                    <a href="{{ route('be.staff.add') }}" class="btn btn-primary new-custom"><i
                            class="fa fa-plus"></i> Thêm</a>
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nhân viên</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <form action="" method="GET">
        <div class="row">
            <div class="col-md-3 mb-2">
                Đang hiển thị {{ $data->firstItem() }}<i class="bx bx-right-arrow-alt"></i>{{
                $data->lastItem() }} trên {{ App\Models\User::where('type','staff')->count() }} nhân viên
            </div>
            <div class="col-md-3 mb-2">
                <input type="text" value="{{ $key_search['info'] ?? '' }}" name="info"
                    class="form-control" placeholder="Tìm kiếm theo thông tin">
            </div>
            <div class="col-md-3 mb-2">
                <select name="level" class="form-control text-center">
                    <option value="">-----Chọn cấp độ-----</option>
                    @foreach ($levels as $level)
                    <option {{ $key_search['level']==$level->id ? 'selected':'' }} value="{{ $level->id
                        }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <button type="submit" class="btn btn-success w-100"><i class='bx bx-search-alt-2'></i>
                    Tìm Kiếm</button>
            </div>
        </div>

    </form>
    <div class="row mb-2">

        <div class="col-md-12">

            <table id="staff" class="table table-striped table-rp">
                <thead>
                    <tr>
                        <th width="10%" scope="col">STT</th>
                        <th scope="col">Ảnh</th>
                        <th width="35%" scope="col">Thông tin</th>
                        <th scope="col">Vai trò</th>
                        <th scope="col">Hoạt động</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td data-label="STT" scope="row">
                            <input type="text" data-id="{{ $item->id }}"
                                value="@if (isset($item->number)) {{ old('number', $item->number) }}@else{{ old('number') }} @endif"
                                class="number" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự"
                                style="max-width: 50px; text-align: center">
                        </td>
                        <td data-label="Ảnh"><img style="width: 100px;" class="rounded-3"
                                src="{{ asset('storage/uploads/'.$item->img) }}" alt=""></td>
                        <td data-label="Thông tin">
                            <span class="d-block"><i class='bx bxs-user'></i> {{ $item->name ?? '-' }}</span>
                            <span class="d-block"><i class='bx bxs-envelope'></i> {{ $item->email ?? '-' }}</span>
                            <span class="d-block"><i class='bx bxs-phone'></i> {{ $item->phone ?? '-' }}</span>
                            <span class="d-block"><i class='bx bxs-home'></i> {{ $item->address ?? '-' }}</span>
                        </td>
                        <td data-label="Vai trò">
                            <div> <b>{{ $item->roles->first()->description ?? 'Không có' }}</b></div>
                        </td>
                        <td data-label="Hoạt động">
                            <input data-id="{{ $item->id }}" class="status" type="checkbox"
                                data-on="<i class='fa fa-check'></i>" data-off="<i class='fa fa-times'></i>" {{
                                $item->status ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success"
                            data-offstyle="danger" data-style="ios" data-size="mini">
                        </td>
                        <td data-label="Hành động">
                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa"
                                href="{{ route('be.staff.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                            <form class="d-inline" method="POST" action="{{ route('be.staff.destroy',$item->id) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger del-confirm" data-toggle="tooltip" data-placement="top"
                                    title="Xoá"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 d-flex justify-content-center mt-3">
            {{ $data->appends(request()->all())->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        $('#staff').on('change', 'input[class="status"]', function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('be.staff.status') }}',
                data: {
                    'status': status,
                    'id': id
                },
                success: function(data) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Cập nhật thành công !'
                        })
                }
            });
        })
        $('#staff').on('change', 'input[class="number"]', function() {
                var number = $(this).val();
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('be.staff.number') }}',
                    data: {
                        'number': number,
                        'id': id
                    },
                    success: function(data) {
                         Toast.fire({
                        icon: 'success',
                        title: 'Cập nhật thành công !'
                        })
                    },
                    error: function(data) {
                         Toast.fire({
                        icon: 'error',
                        title: 'Có lỗi xảy ra !'
                        })
                    }
                });
            })
    })
</script>
@endpush
