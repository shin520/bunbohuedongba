@extends('index.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
                <nav aria-label="breadcrumb" class="mt-4" >
                    <ol class="breadcrumb shadow-sm">
                        <li class="breadcrumb-item"><a href="{{url('/')}}" title=""><i class="ti-home"></i>{{ __('Trang chủ') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Sản Phẩm') }}</li>
                    </ol>
                </nav>
                <div class="main-title text-center mb-5">
                    <h1 class="title font-weight-bold ttu">{{ __('Danh Sách Sản Phẩm') }}</h1>
                </div>
                <div class="row">
                    @foreach ($items as $item)
                    <div class="col-md-4 col-lg-3 mb-4 col-6">
                        <div class="product-box">
                            <div class="thumbnail-news mb-2">
                                <a href="{{route('product', $item->slug)}}"
                                    title="{{ $item->title }}">
                                    <div class="img-demo position-relative product_card_image">
                                        <img src="/storage/uploads/{{$item->img}}" class="img-fluid border__shadow__img" alt="{{ $item->title }}"
                                        title="{{ $item->title }}">
                                        @if($item->discount > 0)
                                            <div class="icon_km">-{{ $item->discount }}%</div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                            <div class="title_news mt-3 mb-3">
                                <h3 class="text-center product__name">
                                    <a href="{{route('product', $item->slug)}}"
                                        title="{{ $item->title }}">{{ $item->name }}</a>
                                </h3>
                                <div class="product__price text-center">
                                    @if($item->price > 0)
                                    {{ number_format($item->price) }} VNĐ
                                    @if($item->fake_price > 0)
                                    <s class="fake_price"> {{ number_format($item->fake_price) }} VNĐ</s>
                                    @endif
                                    @else
                                    LIÊN HỆ
                                    @endif
                                </div>
                            </div>
                        </div>
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
