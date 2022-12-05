@extends('be.layouts.app')
@section('content')
<div class="card-body">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">TRANG TĨNH
                    {{-- <a href="{{ route('be.static_page.add') }}" class="btn btn-primary new-custom"><i
                            class="fa fa-plus"></i> Thêm</a> --}}
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Trang tĩnh</a></li>
                        <li class="breadcrumb-item active">Tất cả</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table text-center" id="static_page">
                <thead>
                    <tr>
                        <th width="10%" scope="col">STT</th>
                        <th width="30%" scope="col">Tên</th>
                        <th width="30%" scope="col">Ẩn hiện</th>
                        <th width="30%" scope="col">Hành động</th>
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
                           @include('be.component.show_edit_btn',['model'=>'static_page'])
                           {{-- @include('be.component.show_delete_btn',['model'=>'static_page']) --}}
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
    @include('be.component.js_model',['model'=>'static_page'])
    @include('be.component.js_datatable',['model'=>'static_page'])
@endpush

