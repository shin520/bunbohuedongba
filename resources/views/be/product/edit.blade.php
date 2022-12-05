@extends('be.layouts.app')
@section('content')
<div class="card-body">
    @component('be.component.breadcrumb')
    @slot('li_1') Sản phẩm @endslot
    @slot('title')Cập nhật Sản phẩm @endslot
    @endcomponent

    <form action="{{ route('be.product.update',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        @include('be.component.name_edit')
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>MÃ SẢN PHẨM</label>
                            <div class="d-flex">
                                <input type="text" name="product_code" id="product_code"
                                    value="{{  $data->product_code ?? old('product_code') }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">DANH MỤC CẤP 1</label>
                            <select name="parent_id" class="form-control" id="select_parent">
                                <option value="">---CHƯA CHỌN---</option>
                                @foreach ($parent as $item)
                                <option {{ $item->id == $data->parent_id ? 'selected' : '' }} value="{{ $item->id }}">{{
                                    $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">DANH MỤC CẤP 2</label>
                            <select name="parent_child_id" class="form-control" id="show_children">
                                @if($data->parent != NULL)
                                    @foreach ($data->parent->children as $item_c)
                                    <option {{ $item_c->id == $data->parent_child_id ? 'selected' : '' }} value="{{
                                        $item_c->id }}">{{ $item_c->name }}</option>
                                    @endforeach
                                @else
                                <option value="0">---Chọn danh mục---</option>
                                @endif
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>Giá sản phẩm (₫) @include('be.component.hint',['des'=>'Giá hiển thị sản
                                phẩm','title'=>'Giá sản phẩm'])</label>
                            <input type="text" name="price" id="price"
                                value="{{ product_price($data->price) ?? old('price') }}" class="form-control"
                                placeholder="300.000">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>Giá thị trường (đ) @include('be.component.hint',['des'=>'Giá ảo sản phẩm, đưa giá cao
                                hơn để giảm giá','title'=>'Giá thị trường'])</label>
                            <input type="text" placeholder="350.000" name="fake_price"
                                value="{{product_price($data->fake_price) ??old('fake_price') }}" id="fake_price"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        @include('be.component.hideshow_edit')
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        @include('be.component.image_edit')
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        @include('be.component.multi_upload_image_edit',['model'=>'product'])
                    </div>
                    <div class="col-md-12 mb-3">
                        @include('be.component.description_edit')
                    </div>
                    <div class="col-md-12 mb-3">
                        @include('be.component.content_edit')
                    </div>
                </div>
            </div>
            @include('be.component.seo-edit')
            @include('be.component.button_submit',['model'=>'product'])
        </div>
    </form>

</div>
@endsection
