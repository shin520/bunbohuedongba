@extends('be.layouts.app')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">SLIDE
                    <a href="{{ route('be.slide.add') }}" class="btn btn-primary new-custom"><i
                            class="fa fa-plus"></i> Thêm</a>
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Slide</a></li>
                        <li class="breadcrumb-item active">Tất cả</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table text-center table-rp" id="slide">
                <thead>
                    <tr>
                        <th width="10%" scope="col">STT</th>
                        <th width="20%" scope="col">Tên</th>
                        <th width="30%" scope="col">Hình</th>
                        <th width="20%" scope="col">Ẩn hiện</th>
                        <th width="20%" scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td data-label="STT" scope="row">
                          @include('be.component.show_number')
                        </td>
                        <td data-label="Tên">
                            @include('be.component.show_name')
                        </td>
                        <td data-label="Ảnh">
                            @include('be.component.show_image')
                        </td>
                        <td data-label="Trạng thái">
                           @include('be.component.show_hideshow_checkbox')
                        </td>
                        <td data-label="Hành động">
                           @include('be.component.show_edit_btn',['model'=>'slide'])
                           @include('be.component.show_delete_btn',['model'=>'slide'])
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
@push('script')
<script>
    function switchChange() {
        $('#slide').on('change', 'input[class="hideshow"]', function() {
            var hideshow = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('be.slide.hideshow') }}',
                data: {
                    'hideshow': hideshow,
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
    }
    $(document).ready(function() {
        switchChange();

        $(function() {
            $('#slide').on('change', 'input[class="number"]', function() {
                var number = $(this).val();
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('be.slide.number') }}',
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
    })
</script>
{{-- <script>
    $(function() {
            tableData = $('#slide').DataTable({
                'responsive': true,
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                'language': {
                    "sProcessing": "Đang xử lý...",
                    "sLengthMenu": "Xem _MENU_ mục",
                    "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                    "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                    "sInfoPostFix": "",
                    "sSearch": "Tìm:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Đầu",
                        "sPrevious": "Trước",
                        "sNext": "Tiếp",
                        "sLast": "Cuối"
                    }
                }
            })
            // Apply the search
            tableData.columns().every(function() {
                let that = this;
                $('select', this.header()).change(function(e) {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });
        })
</script> --}}
@endpush
