@extends('index.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
                <nav aria-label="breadcrumb" style="margin-top: 10px">
                    <ol class="breadcrumb shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" title="Post"><i
                                    class="ti-home"></i>{{ __('Trang chủ') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Tin tức') }}</li>
                    </ol>
                </nav>
                <div class="main-title text-center mb-5">
                    <h1 class="title font-weight-bold">{{ __('Tin tức') }}</h1>
                </div>
                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-md-3 mb-4 col-6">
                            <figure>
                                <div class="thumbnail-news mb-2">
                                    <a href="{{ route('post', $item->slug) }}" title="{{ $item->title }}">
                                        <img src="/storage/uploads/{{ $item->img }}" class="img-fluid"
                                            alt="{{ $item->title }}" title="{{ $item->title }}">
                                    </a>
                                </div>
                                <figcaption>

                                    <div class="title_news mt-4 mb-3">
                                        <h3>
                                            <a href="{{ route('post', $item->slug) }}"
                                                title="">{{ $item->name }}</a>
                                        </h3>
                                    </div>
                                    <div class="des_news">
                                        {!! $item->descriptions !!}
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
                <nav class="mb-5">
                    <ul class="pagination justify-content-center mb-4">
                        {{ $items->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
