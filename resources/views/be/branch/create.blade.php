@extends('be.layouts.app')
@section('content')
<div class="card-body">
    @component('be.component.breadcrumb')
    @slot('li_1') Chi Nhánh @endslot
    @slot('title')Thêm Chi Nhánh @endslot
    @endcomponent
    <form action="{{ route('be.branch.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row" id="create_form">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        @include('be.component.name_add')
                    </div>
                    <div class="col-md-6 mb-3">
                        @include('be.component.phone_add')
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">DANH MỤC CẤP 1</label>
                            <select name="parent_id" class="form-control" id="select_parent">
                                <option value="0">Chọn cấp 1</option>
                                @foreach ($parent as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">DANH MỤC CẤP 2</label>
                            <select name="parent_child_id" class="form-control" id="show_children">
                                <option value="">---Chọn danh mục cấp 1 trước---</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        @include('be.component.address_add')
                    </div>
                    <div class="col-md-6 mb-3">
                        @include('be.component.featured_add')
                    </div>
                    <div class="col-md-6 mb-3">
                        @include('be.component.hideshow_add')
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        @include('be.component.image_add')
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        @include('be.component.map_add')
                    </div>
                    <div class="col-md-6 mb-3">
                        @include('be.component.multi_upload_image_add',['model'=>'branch'])
                    </div>
                </div>
            </div>

            @include('be.component.seo-create')
            @include('be.component.button_submit',['model'=>'branch'])
        </div>
    </form>
</div>
@endsection