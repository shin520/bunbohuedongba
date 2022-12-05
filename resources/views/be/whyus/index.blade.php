@extends('be.layouts.app')
@section('content')
       <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">LÝ DO CHỌN CHÚNG TÔI
                        <a href="{{ route('be.whyus.add') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm</a>
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                            <li class="breadcrumb-item active"  aria-current="page">Lý do chọn chúng tôi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table text-center" id="whyus">
                    <thead>
                        <tr>
                            <th width="10%" scope="col">STT</th>
                            <th width="20%" scope="col">Tên</th>
                            <th width="20%" scope="col">Ẩn hiện</th>
                            <th width="20%" scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">
                                   @include('be.component.show_number')
                                </th>
                                <td>
                                    @include('be.component.show_name')
                                </td>
                                <td>
                                    @include('be.component.show_hideshow_checkbox')
                                </td>
                                <td>
                                  @include('be.component.show_edit_btn',['model'=>'whyus'])
                                  @include('be.component.show_delete_btn',['model'=>'whyus'])
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
        $('#whyus').on('change', 'input[class="hideshow"]', function() {
            var hideshow = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('be.whyus.hideshow') }}',
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
            $('#whyus').on('change', 'input[class="number"]', function() {
                var number = $(this).val();
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('be.whyus.number') }}',
                    data: {
                        'number': number,
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
        })
    })
</script>
    <script>
        $(function() {
            tableData = $('#whyus').DataTable({
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
    </script>
@endpush
