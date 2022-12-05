@extends('be.layouts.app')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Khách hàng
                    <a href="{{ route('be.customer.add') }}" class="btn btn-primary new-custom"><i
                            class="fa fa-plus"></i> Thêm</a>
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Khách hàng</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-12">
            <form action="" method="GET">
                <div class="row mb-3">
                    <div class="col-md-3 mb-3">
                        <label for="">Sắp xếp theo STT</label>
                        <select name="sort_number" class="form-control text-center">
                            <option value="">---Chưa chọn---</option>
                            <option {{ $key_search['sort_number'] == 'asc' ? 'selected' : '' }} value="asc">Tăng dần</option>
                            <option {{ $key_search['sort_number'] == 'desc' ? 'selected' : '' }} value="desc">Giảm dần</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Sắp xếp theo Thông tin</label>
                        <select name="sort_info" class="form-control text-center">
                            <option value="">---Chưa chọn---</option>
                            <option {{ $key_search['sort_info'] == 'desc' ? 'selected' : '' }} value="desc">Mới nhất</option>
                            <option {{ $key_search['sort_info'] == 'asc' ? 'selected' : '' }} value="asc">Cũ nhất</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Sắp xếp theo Trạng thái</label>
                        <select name="sort_status" class="form-control text-center">
                            <option  value="">---Chưa chọn---</option>
                            <option {{ $key_search['sort_status'] == 'desc' ? 'selected' : '' }} value="desc">Đang hoạt động</option>
                            <option {{ $key_search['sort_status'] == 'asc' ? 'selected' : '' }} value="asc">Đã bị vô hiệu hóa</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Xử lí</label>
                        <button type="submit" class="btn btn-success w-100"><i class='bx bx-sort'></i>
                            Sắp xếp</button>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 mb-2">
                        Đang hiển thị {{ $data->firstItem() }}<i class="bx bx-right-arrow-alt"></i>{{
                        $data->lastItem() }} trên {{ App\Models\User::where('type','customer')->count() }} khách
                        hàng
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
        </div>

        <div class="col-md-12">
            <a href="#" class="hidden btn btn-danger delete-all new-custom mb-3"><i class="fa fa-trash"></i> Xoá chọn</a>
            <table id="customer" class="table table-striped table-rp">
                <thead>
                    <tr>
                        <th width="5%" scope="col">
                            <input type="checkbox" id="selectall">
                        </th>
                        <th width="10%" scope="col">STT</th>
                        <th scope="col">Ảnh</th>
                        <th width="35%" scope="col">Thông tin</th>
                        <th scope="col">Cấp độ</th>
                        <th scope="col">Hoạt động</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td data-label="CHECK" scope="row">
                            <input type="checkbox" class="checkbox"
                            data-id="{{ $item->id }}">
                        </td>
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
                        <td data-label="Cấp độ">
                            <div>
                                <img style="width: 50px;" class="rounded-3 mb-1"
                                    src="{{ asset('storage/uploads/'.$item->wallet->level->img ?? '') }}" alt="icon">
                            </div>
                            <div> <b>{{ $item->wallet->level->name }}</b></div>
                        </td>
                        <td data-label="Hoạt động">
                            <input data-id="{{ $item->id }}" class="status" type="checkbox"
                                data-on="<i class='fa fa-check'></i>" data-off="<i class='fa fa-times'></i>" {{
                                $item->status ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success"
                            data-offstyle="danger" data-style="ios" data-size="mini">
                        </td>
                        <td data-label="Hành động">
                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa"
                                href="{{ route('be.customer.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                            <form class="d-inline" method="POST" action="{{ route('be.customer.destroy',$item->id) }}">
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
        $('#customer').on('change', 'input[class="status"]', function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('be.customer.status') }}',
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
        $('#customer').on('change', 'input[class="number"]', function() {
            var number = $(this).val();
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('be.customer.number') }}',
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

        $('#selectall').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $('.delete-all').removeClass("hidden").addClass("visible");
                $(".checkbox").prop('checked', true);
            } else {
                $('.delete-all').removeClass("visible").addClass("hidden");
                $(".checkbox").prop('checked', false);
            }
        });
        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('.delete-all').removeClass("visible").addClass("hidden");
                $('#selectall').prop('checked', true);
            } else {
                $('.delete-all').removeClass("hidden").addClass("visible");
                $('#selectall').prop('checked', false);
            }
        });
        $('.delete-all').on('click', function(e) {
            var idsArr = [];
            $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            if (idsArr.length <= 0) {
                Swal.fire(
                    'Chưa chọn !',
                    'Vui lòng chọn ít nhất 1 mục để Xóa !',
                    'question'
                )
            } else {
                Swal.fire({
                    title: 'Xác nhận Xóa !',
                    text: "Không thể hoàn tác sau khi Xóa !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xóa',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var strIds = idsArr.join(",");
                        $.ajax({
                            url: "{{ route('be.customer.deletemultiple') }}",
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            data: 'ids=' + strIds,
                            success: function(data) {
                                if (data['status'] == true) {
                                    setTimeout(function() {
                                        location
                                    .reload();
                                    }, 3000);
                                    $(".checkbox:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    Swal.fire(
                                        'Thành công !',
                                        'Xóa thành công các mục vừa chọn !',
                                        'success'
                                    )
                                } 
                            },
                            error: function(data) {
                                Swal.fire(
                                    'Thất bại !',
                                    'Đã có lỗi xảy ra !',
                                    'error'
                                )
                            }
                        });
                    } else {
                        Swal.fire(
                          'Đã hủy !',
                          'Bạn chưa Xóa gì cả !',
                          'error'
                      );
                    }
                })
            }
        });
    })
</script>

@endpush
