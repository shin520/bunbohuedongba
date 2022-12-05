@extends('index.layouts.master')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
                <nav aria-label="breadcrumb" class="mt-4">
                    <ol class="breadcrumb ttu shadow-sm">
                        <li class="breadcrumb-item"> <a href="{{ url('/') }}" title=""><i class="ti-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"> <a href="{{ route('page', $share["all_product_menu"]->slug) }}">Sản phẩm</a> </li>
                        <li class="breadcrumb-item {{ $data ? '' : 'd-none' }}"> <a href="">{{ $data->parent->name ?? '' }}</a> </li>
                        <li class="breadcrumb-item ">{{ $data->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                <article class="post">
                    <div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-sm-12 order-lg-1 order-sm-1 col-lg-4 col-xl-4 mb-4">
                                <div class="app-figure product__avatar  " id="zoom-fig">
                                    <a id="Zoom-1" class="MagicZoom" title="{{ $data->title }}"
                                        href="/storage/uploads/{{ $data->img }}">
                                        <img class="img_cover" src="/storage/uploads/{{ $data->img }}" srcset="/storage/uploads/{{ $data->img }}"
                                            alt="Hình ảnh" />
                                    </a>
                                    <div class="selectors">
                                        {{-- @foreach ($data->images as $item)
                                            <a data-zoom-id="Zoom-1"
                                                href="/storage/uploads/products/{{ $item->imgs }}"
                                                data-image="/storage/uploads/products/{{ $item->imgs}}">
                                                <img srcset="/storage/uploads/products/{{ $item->imgs }}"
                                                    src="/storage/uploads/products/{{ $item->imgs }}" />
                                            </a>
                                        @endforeach --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-sm-12 order-lg-2 order-sm-3 col-lg-8    col-xl-8   mb-b">
                                <ul class="list-group product-info-right clearfix">
                                    <li class="list-group-item"><div class="product_detail__name">{{ $data->name }}</div></li>
                                    <li class="list-group-item price-product">
                                        @if ($data->price > 0)
                                            {{ product_price($data->price) }} VNĐ
                                            @if ($data->fake_price > 0)
                                                <s class="sale_off_price">
                                                    {{ product_price($data->fake_price) }} VNĐ</s>
                                                <span class=""></span>
                                            @endif
                                        @else
                                            LIÊN HỆ
                                        @endif
                                    </li>

                                    <li class="list-group-item"><b>Mô tả</b> {!! $data->description !!} </li>
                                    {{-- <li class="list-group-item">
                                        <form method="post" action="{{ route('order.now.quantity') }}"
                                            accept-charset="UTF-8" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="product" value="{{ $data->id }}"
                                                class="form-control">
                                            <input type="hidden" name="productid_hidden" value="{{ $data->id }}">
                                            <label class="attr-label-pro-detail d-block"><b>Số lượng:</b></label>
                                            <div class="product-action clearfix">
                                                <div class="attr-content-pro-detail d-block">
                                                    <div class="quantity-pro-detail">
                                                        <span class="quantity-minus-pro-detail">-</span>
                                                        <input type="number" class="qty-pro" name="qty" min="1"
                                                            value="1" readonly="">
                                                        <span class="quantity-plus-pro-detail">+</span>
                                                    </div>
                                                </div>
                                                <div class="group__btn__buy">
                                                    <input type="submit" name="buy_now" class="btn__buy__now hvr-grow"
                                                        value="Mua ngay">
                                                    <button type="submit" name="add buy_add_to_cart"
                                                        class="buy_add_to_cart hvr-grow">
                                                        Thêm giỏ hàng
                                                    </button>

                                                </div>

                                            </div>
                                        </form>
                                    </li> --}}
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
                <div id="tabs">
                    <ul id="ultabs">
                        <li class="tab__title bottom_line">Thông tin sản phẩm</li>
                    </ul>
                    <div style="clear:both"></div>

                    <div id="content_tabs">
                        <div class="tab">
                            {!! $data->content !!}
                        </div>
                    </div>
                     {{-- <a href="tel:{{ Str::of($setting->hotline_1)->replace(' ', '') }}" class="img_call_now" > --}}
                    {{-- <img class="img_call_now" src="" alt="gif"> --}}
                </a>
                    <!---END #content_tabs-->
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-title ttu bottom_line mb-4 text-right">
                    <h2 class="title font-weight-bold">Sản phẩm cùng danh mục</h2>
                </div>
            </div>
            @foreach ($datarelated as $item)
                <div class="col-6 col-sm-12 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="product-box">
                        <a href="{{route('product', $item->slug)}}"
                            title="{{ $item->name }}">
                            <div class="product_card_image hover15">
                                <figure class="position-relative">
                                    <img class="card-img-top border__shadow__img" src="/storage/uploads/{{ $item->img }}" alt="{{ $item->name }}">
                                    @if ($item->discount > 0)
                                        <div class="icon_km">-{{ $item->discount }}%</div>
                                    @endif
                                </figure>
                            </div>
                        </a>
                        <div class="product__info">
                            <h3 class="text-center product__name "><a href="{{route('product', $item->slug)}}" title="{{ $item->name }}">{{ $item->name }}</a></h3>
                            <div class="text-center">
                                @if ($item->price > 0)
                                    {{ product_price($item->price) }}
                                    @if ($item->fake_price > 0)
                                        <s class="fake_price"> {{ product_price($item->fake_price) }}</s>
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
    </div>
@endsection

@push('style')
    <style>
        .card-body {
            padding: 0;
        }

        .goi_trong {
            background: #ecdada;
            padding: 20px;
            border-radius: 10px;
            margin-top: 1rem;
        }

        .goi_trong p.ti_goi {
            background: url('{{ asset('core/frontend/img/tuvan1.png') }}') no-repeat left center;
            padding: 10px 0px 10px 60px;
            font-size: 14px;
        }

        div#dknt {
            max-width: 350px;
        }

        .goi_trong form#frm_dknt {
            background: none;
            position: relative;
            margin: 0 !important;
            height: 49px;
            margin-top: 0.5rem !important;
        }

        form#frm_dknt {
            background: #fff;
            height: 40px;
            margin: 10px 0;
        }

        .goi_trong form#frm_dknt input[type='text'] {
            width: 100%;
            padding: 14px 10px;
            background: #fff;
            border: 1px solid #dedede;
            outline: none;
            color: #000;
            margin-top: 0;
        }

        form#frm_dknt input[type='text'] {
            width: 75%;
            padding: 0px 8px;
            float: left;
            margin-top: 12px;
            border: none;
            background: none;
            outline: none;
            color: #000;
            outline: none;
        }

        .goi_trong form#frm_dknt input[type='submit'] {
            background: #d70b0b;
            color: #fff;
            padding: 15px 20px;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            outline: none;
            position: absolute;
            top: 0;
            right: 0;
            transition: all 0.6s;
        }



        div#tabs {
            margin: 1rem 0;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        div#tabs ul#ultabs {
            list-style: none;
            border-bottom: 1px solid rgba(0, 0, 0, .125);
        }

        div#tabs ul#ultabs li {
            padding: 10px;
            margin-right: 10px;
            cursor: pointer;
            border-bottom: none;
            font-size: 13px;
            text-transform: uppercase;
            font-weight: bold;
            display: inline-block;
            color: #6c757d;
        }

        div#tabs ul#ultabs li.active,
        div#tabs ul#ultabs li:hover {
            color: #e2004f;
        }

        div#content_tabs {
            border-top: none;
            padding: 15px;
        }

        p img {
            display: block;
            width: auto !important;
            height: auto !important;
        }
    </style>
@endpush
@push('script')
    <script>
        $(document).ready(function(e) {
            $('.spkhac').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: false,
                infinite: true,
                centerMode: false,
                focusOnSelect: false,
                arrows: false,
                vertical: false,
                verticalSwiping: false,
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [{
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                }, {
                    breakpoint: 750,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                }]
            });
        });
    </script>
    <script>
        $("body").on("click", ".quantity-pro-detail span", function() {
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue > 1) var newVal = parseFloat(oldValue) - 1;
                else var newVal = 1;
            }
            $button.parent().find("input").val(newVal);
        });
    </script>
@endpush
