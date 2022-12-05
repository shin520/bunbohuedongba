@extends('index.layouts.master')
@section('content')
    <section data-wow-delay="10s" class="wow fadeInUp">
        <div id="slider-banner" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($data['slider'] as $k => $item)
                    <li data-bs-target="#slider-banner" data-bs-slide-to="{{ $k }}"
                        class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($data['slider'] as $item)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ asset('storage/uploads') }}/{{ $item->img ?? null }}"
                            alt="{{ $item->name ?? null }}" title="{{ $item->name ?? null }}">
                    </div>
                @endforeach
            </div>
            @if ($data['slider']->count() > 1)
                <a class="carousel-control-prev" href="#slider-banner" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="false">
                    </span>
                    <span class="sr-only">Sau</span>
                </a>
                <a class="carousel-control-next" href="#slider-banner" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="false">
                    </span>
                    <span class="sr-only">Trước</span>
                </a>
            @endif
        </div>
    </section>


    <!-- MENU CHÍNH -->
    @if ($data['product_type']->count() > 0)
        <section class="area_test">
            @if ($data['product_type']->first()->product_index->count() > 0)
                <div class="container">
                    <div class="area_test__title mb-4">
                        <img class="img_cover" src="{{ asset('storage/uploads/backgound_title_index.png') }}"
                            alt="{{ $data['product_type']->first()->name ?? null }}">
                        <h2 class="area_test__title--name">{{ $data['product_type']->first()->name ?? null }}</h2>
                    </div>
                    <div class="row area_test__memu">
                        @foreach ($data['product_type']->first()->product_index as $pd)
                            <div class="col-lg-4 col-sm-12">
                                <div class="area_test__memu_item">
                                    <div class="area_test__memu_item--img">
                                        <a href="{{ route('product', $pd->slug ?? null) }}">
                                            <img src="{{ asset('storage/uploads/') }}/{{ $pd->img ?? null }}"
                                                alt="{{ $pd->name ?? null }}">
                                        </a>
                                    </div>
                                    <h3 class="area_test__memu_item--name"><a
                                            href="{{ route('product', $pd->slug ?? null) }}">{{ $pd->name ?? null }}</a>
                                    </h3>
                                    <div class="area_test__memu_item--price">
                                        @if($pd->price > 0)
                                        {{ number_format($pd->price) }} VNĐ
                                        @if($pd->fake_price > 0)
                                        <s class="fake_price"> {{ number_format($pd->fake_price) }} VNĐ</s>
                                        @endif
                                        @else
                                        LIÊN HỆ
                                        @endif    
                                    </div>
                                    <div class="area_test__memu_item--description">{!! $pd->description ?? null !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </section>
    @endif

    <!-- THƯƠNG HIỆU -->
    <section class="trademark">
        <div class="container">
            <h2 class="trademark__title pt-5">thương hiệu</h2>
            <div class="img">{!! $data['about_image_1'] ?? null !!}</div>
            <div class="row pb-5">
                <div class="col-lg-6">{!! $data['about_middle_content'] ?? null !!}</div>
                <div class="col-lg-6 pl-5">
                    {!! $data['about_image_2'] ?? null !!}
                </div>
            </div>
            <section class="slick_box pb-5">
                <div class="gallery_trademark">
                    @if ($data['gallery_about']->count() > 0)
                        @foreach ($data['gallery_about']->first()->images_index as $gl)
                            <div class="img">
                                <img class="img_cover" src="{{ asset('storage/uploads/' . $gl->image ?? null) }}"
                                    alt="{{ $gl->title ?? null }}">
                            </div>
                        @endforeach
                    @else
                    @endif
                </div>
            </section>
        </div>
    </section>
    <!-- MENU kèm -->
    @foreach ($data['product_type']->skip(1) as $cate)
        @if ($cate->product_index->count() > 0)
            <section class="area_test">
                <div class="container">
                    <div class="area_test__title mb-4">
                        <img class="img_cover" src="{{ asset('storage/uploads/backgound_title_index.png') }}"
                            alt="{{ $cate->name }}">
                        <h2 class="area_test__title--name">{{ $cate->name ?? null }}</h2>
                    </div>
                    <div class="row area_test__memu">
                        @foreach ($cate->product_index as $pd)
                            <div class="col-lg-4 col-sm-12">
                                <div class="area_test__memu_item">
                                    <div class="area_test__memu_item--img">
                                        <a href="{{ route('product', $pd->slug ?? null) }}"><img
                                                src="{{ asset('storage/uploads/') }}/{{ $pd->img ?? null }}"
                                                alt="{{ $pd->name ?? null }}"></a>
                                    </div>
                                    <h3 class="area_test__memu_item--name"><a
                                            href="{{ route('product', $pd->slug ?? null) }}">{{ $pd->name ?? null }}</a>
                                    </h3>
                                    <div class="area_test__memu_item--description">{!! $pd->description ?? null !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    <!-- ĐÁNH GIÁ TRẢI NGHIỆM KHÁCH HÀNG -->
    <section class="feed_back">
        <div class="container pt-5 pb-5">
            <div class="row pt-4 pb-5">
                <div class="col-lg-6">
                    <h2 class="feed_back__title"><span>Đánh giá</span> Khách hàng trải nghiệm</h2>
                    <div class="feed_back__sub_title">{!! $data['feedback_content'] !!} <span><a
                                href="{{ route('page', $share['all_feedback']->slug ?? null) }}">Xem tất cả bài đánh
                                giá</a></span></div>
                    <div class="row">
                        @foreach ($data['feedback_index']->skip(1) as $item)
                            <div class="col-lg-6">
                                <div class="feed_back__user">
                                    <div class="feed_back__user--avatar">
                                        <div class="user">
                                            <div class="effect_b"></div>
                                            <div class="effect_c"></div>
                                            <div class="effect_a">
                                                <img src="{{ asset('storage/uploads/' . $item->img ?? null) }}"
                                                    alt="image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="btn_open_video_feedback" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop{{ $item->id ?? null }}">
                                        <div class="notranslate feed_back__user--name">{{ $item->name ?? null }}</div>
                                    </div>
                                    <div class="feed_back__user--description">{!! $item->description ?? null !!}</div>

                                    <!-- Modal -->
                                    <div class="modal fade show_video_feedback" id="staticBackdrop{{ $item->id ?? null }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="notranslate modal-title" id="staticBackdropLabel">
                                                        {{ $item->name ?? null }}</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! $item->url ?? null !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    @if ($data['feedback_index']->count() > 0)
                        <div class="feed_back__img">
                            <img class="img_cover"
                                src="{{ asset('storage/uploads/' . $data['feedback_index']->first()->img ?? null) }}"
                                alt="image">
                            <div class="feed_back__img--outline_a"></div>
                            <div class="feed_back__img--outline_b"></div>
                        </div>
                        <h3 class="feed_back__user--name mt-4" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop{{ $data['feedback_index']->first()->id ?? null }}">
                            {{ $data['feedback_index']->first()->name ?? null }}</h3>
                        <h3 class="feed_back__user--description">{!! $data['feedback_index']->first()->description ?? null !!}</h3>
                        <!-- Modal -->
                        <div class="modal fade show_video_feedback"
                            id="staticBackdrop{{ $data['feedback_index']->first()->id ?? null }}"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">
                                            {{ $data['feedback_index']->first()->name ?? null }}</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $data['feedback_index']->first()->url ?? null !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- tìm kiếm -->
    <section class="search">
        <div class="container" style="margin-top: -70px; margin-bottom: 50px;">
            <div class="bg-light">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="search__left--item">
                            <h2 class="search__title"><span>Tìm kiếm</span> Quán bún bò huế ĐÔNG BA</h2>
                            <div class="search__sub">
                                <span>Gần bạn nhất</span>
                                <div rel="no-follow" href="" class="branch_btn branch_btn--open">tìm cửa hàng
                                </div>
                            </div>
                            @foreach ($share['branch'] as $item)
                                <div class="location_item" data-id="{{ $item->id ?? null }}">
                                    <div class="location_icon"><i class="fa-solid fa-location-dot"></i></div>
                                    <div class="location_info">
                                        <h3 class="notranslate location_info__title">{{ $item->name ?? null }}</h3>
                                        <div class="notranslate location_info__address">{{ $item->address ?? null }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="search__right--item">
                            <div id="dp_map">
                                {!! $data['branch_index']->first()->map ?? null !!}
                            </div>

                            <div class="location_item">
                                @if ($data['branch_index']->count() > 0)
                                    <div class="location_icon"><i class="fa-solid fa-location-dot"></i></div>
                                @else
                                @endif
                                <div class="location_info">
                                    <div id="dp_name" class="location_info__title">
                                        {{ $data['branch_index']->first()->name ?? null }}</div>
                                    <div id="dp_address" class="location_info__address">
                                        {{ $data['branch_index']->first()->address ?? null }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- dặt bàn -->
    <section class="order">
        <div class="container pt-5 pb-5">
            <div class="row align-items-stretch">
                <div class="col-lg-8 align-content-stretch mr-lg-0 pr-lg-0">
                    <div class="order__form">
                        <div class="order__form--title">Đặt bàn ngay</div>
                        <form class="form" action="{{ route('store.order.contact') }}" method="POST">
                            <div class="d-flex flex-column align-items-center gg-10">
                                @csrf
                                @if ($errors->any())
                                    <div id="error_contact" class="alert alert-danger">
                                        <ul style="padding-left: 0px;">
                                            @foreach ($errors->all() as $error)
                                                <li style="line-height: 32px;">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="hidden" name="recaptcha" id="recaptcha">
                                <input class="input" type="text" name="name" placeholder="Họ và tên" required>
                                <input class="input" type="text" name="phone" placeholder="Số điện thoại"
                                    required>
                                <input class="input" type="datetime-local"
                                    name="date"placeholder="Ngày bạn ghé quán" required>
                                <input class="input" type="text" name="people" placeholder="Bàn bạn mấy người"
                                    required>
                                <textarea class="input" name="branch" placeholder="Bạn muốn đi quán nào? Tìm quán gần bạn nhất" id=""
                                    rows="3"></textarea>
                                <div class="text-center"><button>Đặt ngay</button></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 ml-lg-0 pl-lg-0">
                    <div class="fanpage_site">
                        <div class="fb-page" data-rel="no-follow" href="{{ $setting->facebook ?? null }}"
                            data-tabs="timeline" data-width="" data-height="" data-small-header="false"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="{{ $setting->facebook ?? null }}" class="fb-xfbml-parse-ignore"><a
                                    rel="no-follow" href="{{ $setting->facebook ?? null }}">Fanpage</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('.location_item').on('click', function() {
                var id = $(this).attr('data-id');
                // var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ route('get_location.get') }}',
                    type: "GET",
                    data: {
                        // '_token': _token,
                        'id': id,
                    },
                    success: function(data) {
                        $('#dp_map').html(data.map);
                        $('#dp_name').html(data.name);
                        $('#dp_address').html(data.address);

                    }
                });
            });
        });
    </script>
@endpush
