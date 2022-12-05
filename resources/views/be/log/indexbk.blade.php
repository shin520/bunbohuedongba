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
                <table  class="table text-center" id="posttype">
                    <thead>
                        <tr>
                            <th width="10%" scope="col">STT</th>
                            <th width="30%" scope="col">Nội dung</th>
                            <th width="30%" scope="col">Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">
                                  {{ $item->id }}
                                </th>
                                <td><b class="text-success">{{ $item->causer->name }}</b> <span class="text-default">{{ $item->description }}</span> <b class="text-info">{{ $item->subject->name }}</b>
                                @if($item->event == 'updated')
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#show-log-{{ $item->id }}">Xem thay đổi</button>
                                @endif
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('H:m:s - d-m-Y') }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
</div>
@foreach ($data as $item)
<div>
    <div class="modal fade" id="show-log-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="log-{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="log-{{ $item->id }}">Lịch sử {{ $item->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <table class="table_re table">

                    @foreach ($item->changes as $i)
                        @if($loop->first)
                            <tr>
                                <td><b class="text-primary">Cột</b></td>
                                @foreach ($i as $key => $item)
                                <td>{{ $key ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endif

                        @if($loop->first)
                            <tr>
                                <td><b class="text-primary">Nội dung gốc</b></td>
                                @foreach ($i as $key => $item)
                                <td>@if($item == '')//@else {{ $item }} @endif</td>
                                @endforeach
                            </tr>

                        @else
                            <tr>
                                <td><b class="text-primary">Nội dung cập nhật</b></td>
                                @foreach ($i as $key => $item)
                                <td>@if($item == '')//@else {{ $item }} @endif</td>
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

