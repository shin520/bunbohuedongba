@extends('be.layouts.app')
@section('content')
    <div class="card-body">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">THÊM CẤP ĐỘ
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Người dùng</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('be.level.index') }}">Cấp độ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <form action="{{ route('be.level.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" id="create_form">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                           @include('be.component.name_add')
                        </div>
                        <div class="col-md-12 mb-5">
                            <div class="form-group">
                                <label for="">SỐ ĐIỂM YÊU CẦU</label>
                                <input value="{{ old('exp') }}" type="number" class="form-control" name="exp">
                            </div>
                        </div>
                        <div class="col-md-12 mb-5">
                            @include('be.component.image_add')
                        </div>
                        @include('be.component.button_submit',['model'=>'level'])
                    </div>
                </div>
                <div class="col-md-9">
                    @include('be.component.content_add')
                </div>
            </div>
        </form>
    </div>
@endsection
