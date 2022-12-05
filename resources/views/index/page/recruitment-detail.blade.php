@extends('index.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 main-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('page', $share['all_recruitment_menu']->slug) }}"><i
                        class="ti-home"></i> Tuyển dụng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $data->name }}</li>
                </ol>
            </nav>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 main-content">
        <article class="post mb-5">
            <div style="overflow: hidden" class="post-content" id="post_content">
                <div class="main-title ">
                    <h1 style="font-size: 1.5rem" class="font-weight-bold text-center">{{ $data->name }}</h1>
                 </div>

                 <div class="description mb-3">
                    <div class="title"><b>Mô tả</b></div>
                    {!! $data->description !!}
                </div>
                <div class="content">
                    <div class="title"><b>Nội dung</b></div>
                    {!! $data->content !!}
                </div>
            </div>
        </article>
        </div>
    </div>
</div>
@endsection
