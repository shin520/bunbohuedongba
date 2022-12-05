@extends('be.layouts.app')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Thêm danh mục cấp 2
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('be.product_category_2.index') }}">Danh mục
                                cấp 2</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <form action="{{ route('be.product_category_2.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row" id="create_form">
            <div class="col-md-3">
                <div class="col-md-12 mb-3">
                  @include('be.component.name_add')
                </div>
                <div class="col-md-12 mb-3">
                    @include('be.component.parent_add')
                </div>
                <div class="col-md-12 mb-3">
                  @include('be.component.image_add')
                </div>
                <div class="col-md-12 mb-3">
                    @include('be.component.hideshow_add')
                </div>
            </div>
            <div class="col-md-9">
                <div class="col-md-12 mb-3">
                    @include('be.component.description_add')
                </div>
                <div class="col-md-12 mb-3">
                   @include('be.component.content_add')
                </div>
            </div>
            @include('be.component.seo-create')
            @include('be.component.button_submit',['model'=>'product_category_2'])
        </div>
    </form>
</div>
@endsection

