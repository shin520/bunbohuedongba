@extends('be.layouts.app')
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Danh mục cấp 1
                        <a href="{{ route('be.product_category_1.add') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm</a>
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                            <li class="breadcrumb-item active"  aria-current="page">Danh mục cấp 1</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table  class="table text-center" id="product_category_1">
                    <thead>
                        <tr>
                            <th width="5%" scope="col">STT</th>
                            <th width="60%" scope="col">Tên</th>
                            <th width="15%" scope="col">Nổi bật</th>
                            <th width="15%" scope="col">Ẩn hiện</th>
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
                                    @include('be.component.show_featured_checkbox')
                                </td>
                                <td>
                                    @include('be.component.show_hideshow_checkbox')
                                </td>
                                <td>
                                    @include('be.component.show_edit_btn',['model'=>'product_category_1'])
                                    @include('be.component.show_delete_btn',['model'=>'product_category_1'])
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
    @include('be.component.js_model_featured',['model'=>'product_category_1'])
    @include('be.component.js_model',['model'=>'product_category_1'])
    @include('be.component.js_datatable',['model'=>'product_category_1'])
@endpush
