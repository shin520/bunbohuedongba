@extends('be.layouts.app')
@section('content')
<div class="card-body">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">LOG HOẠT ĐỘNG</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Thông Tin</a></li>
                        <li class="breadcrumb-item active">Log hoạt động</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table text-center table-rp table-striped">
                <thead>
                    <tr>
                        <th width="10%" scope="col">STT</th>
                        <th width="30%" scope="col">Nội dung</th>
                        <th width="10%" scope="col">Chi tiết</th>
                        <th width="20%" scope="col">Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td data-label="STT" scope="row">
                            {{ $item->id }}
                        </td>
                        <td data-label="Nội dung">
                            <b class="text-success">{{ $item->causer->name ?? '' }}</b>
                             <span class="text-default">{{ __($item->event) }} {{
                                $item->description }}</span> <b class="text-info">{{ $item->properties['old']['name'] ?? $item->properties['attributes']['name'] }}</b>
                        </td>
                        <td data-label="Chi tiết">
                            @if($item->event == 'updated')
                                <button data-id={{ $item->id }} type="button" class="popup_log btn btn-primary btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".show-log">Xem
                                </button>
                            @endif
                        </td>
                        <td data-label="Thời gian">
                            {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y  H:m:s') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-12 mt-2 d-flex justify-content-center">
            {{ $data->appends(request()->all())->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@foreach ($data as $item)
<div>
    <div class="modal fade show-log" tabindex="-1" role="dialog" aria-labelledby="show_log" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="show_log">Chi tiết cập nhật</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped table-rp">
                        <thead>
                            <tr>
                                <th>Người thực hiện</th>
                                <th>Cột</th>
                                <th>Nội dung gốc</th>
                                <th>Sau khi cập nhật</th>
                                <th>Thời gian</th>
                            </tr>
                        </thead>

                        <tbody  id="render">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@push('script')

<script>
    $('.popup_log').click(function(){
        var id = $(this).attr('data-id');
        var _token = $('meta[name=csrf-token]').attr('content');
        $.ajax({
            url:"{{ route('be.log.show_log') }}",
            type:'POST',
            data:{
                id:id,
                _token:_token
            },
            success:function(result){
                $('#render').empty();
                $('#render').append(result);
            }
        })
    });
</script>
@endpush
