@extends('be.layouts.app')
@section('content')
<div class="card-body">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">THÊM CẤP ĐỘ
                    <a href="{{ route('be.level.add') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm</a>
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Người dùng</a></li>
                        <li class="breadcrumb-item active">Cấp độ</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table text-center table-striped" id="level">
                    <thead>
                        <tr>
                            <th width="10%" scope="col">STT</th>
                            <th width="30%" scope="col">Tên</th>
                            <th width="20%" scope="col">Yêu cầu</th>
                            <th width="20%" scope="col">Trạng thái</th>
                            <th width="20%" scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td data-label="STT" scope="row">
                                   @include('be.component.show_number')
                                </td>
                                <td data-label="Tên">{{ $item->name }}</td>
                                <td data-label="Yêu Cầu">
                                    {{ number_format($item->exp) }} POINT
                                </td>
                                <td data-label="Ẩn hiện">
                                    @include('be.component.show_hideshow_checkbox')
                                </td>
                                <td data-label="Hành động">
                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa"
                                        href="{{ route('be.level.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                    <form class="d-inline" method="POST" action="{{ route('be.level.destroy',$item->id) }}">
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

        </div>
</div>
@endsection
@push('script')
    @include('be.component.js_model',['model'=>'level'])
    @include('be.component.js_datatable',['model'=>'level'])
@endpush
