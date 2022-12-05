@extends('index.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 main-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('page', $share['all_post_menu']->slug) }}"><i
                        class="ti-home"></i> Tin tức</a></li>
                    <li class="breadcrumb-item active" a    ria-current="page">{{ $data->name }}</li>
                </ol>
            </nav>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 main-content">
        <article class="post mb-5">
            <div style="overflow: hidden" class="post-content" id="post_content">
                <div class="main-title ">
                    <h1 style="font-size: 1.5rem" class="font-weight-bold text-center">{{ $data->name }}</h1>
                 </div>
                {!! $data->content !!}
            </div>
        </article>
        </div>
    </div>
    <div class="main-title text-center">
        <p>Tin tức khác</p>
    </div>
    <div class="row">
        @foreach ($datarelated as $item)
        <div class="col-md-3 col-6 mb-4">
            <figure>
                <div class="thumbnail-news mb-2">
                    <a href="{{ route('post',$item->slug) }}">
                        <img src="/storage/uploads/{{ $item->img }}"
                            class="img-fluid border__shadow__img" alt="{{ $item->title }}"
                            title="{{ $item->title }}">
                    </a>
                </div>
                <figcaption>
                    <div class="title__news mt-4 mb-3">
                        <h3><a href="{{ route('post',$item->slug) }}">{{ $item->name }}</a></h3>
                    </div>
                    <div class="des_news ellipsis_three_row">
                       {!! $item->descriptions !!}
                    </div>
                </figcaption>
            </figure>
        </div>
        @endforeach
    </div>
</div>
@endsection
