@extends('be.layouts.app')

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Lịch sử tải xuống</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Lịch sử tải xuống</a></li>
                            <li class="breadcrumb-item active">Tất cả</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="box box-primary mb-0">
                    <div class="box-body">
                        <form action="{{ route('history_download') }}" method="GET">
                        <div class="row">
                            <h3 class="text-center mb-2 text-uppercase">
                                {{ $alert ?? '' }}
                            </h3>
                            <div class="col-md-4 text-center">
                                <div class="form-group">
                                    <label>Từ ngày</label>
                                    <input type="date" name="from" value="{{ old('fromday') }}" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Ngày bắt đầu">
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="form-group">
                                    <label>Đến ngày</label>
                                    <input type="date" name="to" value="{{ old('today') }}" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Ngày kết thúc">
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="form-group">
                                    <label>Thao tác</label>
                                    <button type="submit" class="form-control btn btn-success search-order-form"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table text-center table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Khóa học</th>
                            {{-- <th>Mật khẩu</th> --}}
                            <th>IP</th>
                            <th>Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><a href="{{ $item->url }}" target="_blank">
                                       {{ $item->product->name }}
                                    </a></td>
                                {{-- <td>{{ $item->password ?? '' }}</td> --}}
                                <td>{{ $item->ip ?? '192.168.1.1' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links('pagination::bootstrap-4') }}

            </div>
        </div>
    </div>
@endsection
