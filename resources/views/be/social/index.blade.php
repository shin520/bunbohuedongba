@extends('be.layouts.app')
@section('content')
<div class="card-body">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">MẠNG XÃ HỘI
                    <a href="{{ route('be.social.add') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm</a>
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Thông tin</a></li>
                        <li class="breadcrumb-item active">Mạng xã hội</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-12">
                <table  class="table text-center table-rp table-striped" id="social">
                    <thead>
                        <tr>
                            <th width="10%" scope="col">STT</th>
                            <th width="20%" scope="col">Tên</th>
                            <th width="20%" scope="col">LOGO</th>
                            <th width="20%" scope="col">Ẩn hiện</th>
                            <th width="30%" scope="col">Hành động</th>
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
                                <td data-label="Ẩn hiện">
                                    @include('be.component.show_hideshow_checkbox')
                                </td>
                                <td data-label="Thao tác">
                                   @include('be.component.show_edit_btn',['model'=>'social'])
                                   @include('be.component.show_delete_btn',['model'=>'social'])
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
    @include('be.component.js_model',['model'=>'social'])
    @include('be.component.js_datatable',['model'=>'social'])
@endpush
