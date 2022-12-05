@extends('be.layouts.app')
@section('content')
<div class="card-body">
    @component('be.component.breadcrumb')
    @slot('li_1') Chi nhánh @endslot
    @slot('title')Cập nhật chi nhánh @endslot
    @endcomponent

    <form action="{{ route('be.branch.update',$data->id) }}" method="POST" enctype="multipart/form-data">
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
                    <div class="col-md-6 mb-3">
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
                    </div>
                    <div class="col-md-6 mb-3">
                        @include('be.component.phone_edit')
                    </div>
                    <div class="col-md-12 mb-3">
                        @include('be.component.address_edit')
                    </div>
                    <div class="col-md-6 mb-3">
                        @include('be.component.featured_edit')
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
                        @include('be.component.map_edit',['model'=>'branch'])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        @include('be.component.multi_upload_image_edit',['model'=>'branch'])
                    </div>
                </div>
            </div>
            @include('be.component.seo-edit')
            @include('be.component.button_submit',['model'=>'branch'])
        </div>
    </form>

</div>
@endsection
