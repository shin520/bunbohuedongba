@extends('be.layouts.app')
@section('content')
       <div class="card-body">


        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">ĐƠN ĐẶT HÀNG</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                            <li class="breadcrumb-item active"  aria-current="page">ĐƠN ĐẶT HÀNG</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table text-center" id="contact">
                    <thead>
                        <tr>
                            <th width="5%" scope="col">STT</th>
                            <th width="30%" scope="col">Tên</th>
                            <th width="25%" scope="col">Thời gian</th>
                            <th width="10%" scope="col">Đã xử lí</th>
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
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y h:i:s A') }}
                                </td>
                                <td>
                                    <input data-id="{{ $item->id }}" class="read" type="checkbox" data-on="<i class='fa fa-check'></i>" data-off="<i class='fa fa-times'></i>" {{ $item->read ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios" data-size="mini">

                                </td>
                                <td>
                                    @include('be.component.show_delete_btn',['model'=>'contact'])
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
    $("#contact").on('change', 'input[class="read"]', function() {
          var read = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).data('id');
          $.ajax({
              type: "GET",
              url: "{{ route('be.contact.read') }}",
              data: {
                  read: read,
                  id: id
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
                      title: 'Lỗi !!!!! !'
                      })
              }
          });
      })

      $('#contact').on('change', 'input[class="number"]', function() {
                var number = $(this).val();
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "{{ route('be.contact.number') }}",
                    data: {
                        number: number,
                        id: id
                    },
                    success: function(data) {
                         Toast.fire({
                        icon: 'success',
                        title: 'Cập nhật thành công !'
                        })
                    }
                });
            })
</script>

@include('be.component.js_datatable',['model'=>'contact'])
@endpush

