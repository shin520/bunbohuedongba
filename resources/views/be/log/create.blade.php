@extends('be.layouts.app')
@section('content')
    <div class="card-body">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">THÊM DANH MỤC BÀI VIẾT
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('be.posttype.index') }}">Danh Mục Bài Viết</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <form action="{{ route('be.posttype.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" id="create_form">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="">TÊN</label>
                                <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                    id="name_new">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="">ẢNH ĐẠI DIỆN</label>
                                <img id="imgpreview" src="{{ asset('storage/uploads') }}/placeholder.png" class="img-fluid mb-2">
                                <input type="file" name="img" class="form-control" data-toggle="tooltip" data-placement="top" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="">TRẠNG THÁI</label>
                                <select name="hideshow" class="form-control">
                                    <option selected value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="">TÓM TẮT</label>
                                <textarea name="description" class="form-control" id="description_new" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="">NỘI DUNG</label>
                                <textarea id="elm1" name="content" class="form-control" id=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
              @include('be.component.seo-create')
            </div>
        </form>
    </div>
@endsection
