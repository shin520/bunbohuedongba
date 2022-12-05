@extends('index.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 main-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti-home"></i> trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $data->name }}</li>
                </ol>
            </nav>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 main-content">
        <article class="post mb-5">
            <div style="overflow: hidden" class="post-content" id="post_content">
                <div class="main-title ">
                    <h2 style="font-size: 1.5rem" class="font-weight-bold text-center">{{ $data->name }}</h2>
                </div>
                <div class="data_address"><b>Địa chỉ: </b>{{ $data->address }}</div>
                <div class="data_phone mb-4"><b>Điện thoại liên hệ: </b>{{ $data->phone }}</div>
                <div class="data_map">{!! $data->map !!}</div>
                <div class="row justify-content-center mt-5 mb-4">
                    @foreach ($data->images as $gl)
                        <div class="col-lg-4 col-md-6">
                            <div class="img">
                                <img class="img_cover" src="{{ asset('storage/uploads/' . $gl->image) }}"
                                    alt="{{ $gl->name }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>
        </div>
    </div>
</div>
@endsection
