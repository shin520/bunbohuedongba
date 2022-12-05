@include('be.component.multi_upload_image_add')

@if ($data->images->count() > 0)
<label>HÌNH ẢNH HIỆN TẠI</label>
<div class="action-filer mb-3">
    <label for="selectall" class="btn btn-md btn-primary mr-1 check-all-filer">
        <i class="far fa-square mr-2"></i>Chọn tất cả
    </label>
    <input type="checkbox" hidden id="selectall" >
    {{-- <label data-id="{{ $data->id }}" class="btn btn-md btn-danger" id="delete_all_img_detail">
        <i class="far fa-trash-alt mr-2"></i>Xóa tất cả</label> --}}
    <label type="button" class=" btn btn-md btn-danger delete-all mr-1">
            <i class="fas fa-trash mr-2"></i>Xóa</label>
</div>
@endif
<div class="box-body">
    <div class="jFiler-items jFiler-row">
        <ul class="jFiler-items-list jFiler-items-grid row scroll-bar">
            @foreach ($data->images as $image)
            <li class="jFiler-item col-md-3">
                <div class="jFiler-item-container">
                    <div class="jFiler-item-inner">
                        <div class="jFiler-item-thumb">
                            <div class="jFiler-item-thumb-image">
                                <img src="{{ asset('storage') }}/uploads/{{ $image->image }}" draggable="false">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-2 mt-1">
                            <input type="checkbox" class="checkbox" data-id="{{ $image->id }}">
                            <a class="delete-img icon-jfi-trash delete-img jFiler-item-trash-action"
                                data-id="{{ $image->id }}">
                            </a>
                        </div>
                        {{-- <input type="number" class="form-control form-control-sm mb-1" name="stt-filer[]"
                            placeholder="Số thứ tự">
                        <input type="text" class="form-control form-control-sm" name="ten-filer[]"
                            placeholder="Tiêu đề"> --}}
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@push('script')
<script>
    $(".delete-img").click(function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            Swal.fire({
                title: 'Xóa hình ảnh này ?',
                text: "Sau khi Xóa không thể hoàn tác !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý !',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('be.'.$model.'.delete_single_image_detail') }}",
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function(data) {
                            setTimeout(function() {
                                    location.reload();
                                }, 1000);
                                Toast.fire({
                                icon: 'success',
                                title: 'Đã xóa hình ảnh !'
                                })
                        },
                        error: function(data) {
                            Toast.fire({
                            icon: 'error',
                            title: 'Có lỗi xảy ra !'
                            })
                        }
                    });
                }else{
                    Toast.fire({
                        icon: 'info',
                        title: 'Chưa xóa gì cả !'
                        })
                }
            })
        });

</script>

<script>
    $("#delete_all_img_detail").click(function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            Swal.fire({
                title: 'Xóa tất cả hình ảnh',
                text: "Sau khi Xóa không thể hoàn tác !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý !',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('be.'.$model.'.delete_all_image_detail') }}",
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function() {
                            Toast.fire({
                            icon: 'success',
                            title: 'Đã xóa hình ảnh !'
                            })
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                        },
                        error: function() {
                            Toast.fire({
                            icon: 'error',
                            title: 'Có lỗi xảy ra !'
                            })
                        }
                    });
                }
                else{
                    Toast.fire({
                        icon: 'info',
                        title: 'Chưa xóa gì cả !'
                        })
                }
            })
        });
</script>

<script>
   	$('.check-all-filer').on('click', function(){
			$(this).find("i").toggleClass("far fa-square fas fa-check-square");
		});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#selectall').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);

            }
        });
        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#selectall').prop('checked', true);
            } else {
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
                            url: "{{ route('be.'.$model.'.delete_multiple_image_detail') }}",
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            data: 'ids=' + strIds,
                            success: function(data) {
                                setTimeout(function() {
                                        location
                                            .reload();
                                    }, 1000);
                                    $(".checkbox:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    Swal.fire(
                                        'Thành công !',
                                        'Đã Xóa các mục vừa chọn !',
                                        'success'
                                    )
                            },
                            error: function(data) {
                                Swal.fire(
                                    'Thất bại !',
                                    'Đã có lỗi xảy ra !',
                                    'danger'
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
    });
</script>
@endpush
