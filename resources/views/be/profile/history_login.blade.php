@extends('be.profile.index')
@section('content_profile')
    <div class="ant-row" style="margin-bottom: 20px;">
        <div class="ant-col ant-col-xs-24 ant-col-lg-6"></div>
        <div class="ant-col ant-col-xs-24 ant-col-lg-18">
            <div class="font-size-18 font-weight-bold">Lịch sử đăng nhập</div>
        </div>
    </div>

    <div class="row">
        <table class="table table-bordered">
            <tr>
                <thead>
                    <td>#</td>
                    <td>IPv4/IPv6</td>
                    <td>Thiết bị</td>
                    <td>Trình duyệt</td>
                    <td>Thời gian</td>
                </thead>
            </tr>
                @foreach ($history as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->ip }}</td>
                        <td>{{ $item->device }}</td>
                        <td>{{ $item->browser }}</td>
                        <td>{{  \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i:s')  }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {{ $history->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
