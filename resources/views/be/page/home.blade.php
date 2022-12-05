@extends('be.layouts.app')

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Bảng điều khiển</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Tổng quan</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-lg-6 col-6 mb-2">
                <div class="card">
                    <div class="card-body bsd color-box bg-info bg-soft">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-log-in-circle"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Tổng truy cập</h5>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-12">
                                <div class="text-muted mt-4">
                                    <h4>{{ Counter::count() }} <i class="mdi mdi-chevron-up text-success"></i></h4>

                                </div>
                            </div>
                            <div class="col-xl-9 col-12">
                                <div>
                                    <div id="total_access" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-6 mb-2">
                <div class="card">
                    <div class="card-body bsd color-box bg-warning bg-soft">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-down-arrow-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Tổng lượt tải</h5>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-12">
                                <div class="text-muted mt-4">
                                    <h4>{{ App\Models\Download::count() }} <i class="mdi mdi-chevron-up text-success"></i>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-xl-9 col-12">
                                <div>
                                    <div id="total_link" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <div class="card">
                    <div class="card-body bsd color-box bg-success bg-soft">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-log-in-circle"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Truy cập hôm nay</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{ $data['get_access_today'] }} <i
                                    class="mdi mdi-chevron-{{ $data['get_access_today'] > $data['get_access_yesterday'] ? 'up' : 'down' }} ms-1 text-{{ $data['get_access_today'] > $data['get_access_yesterday'] ? 'success' : 'danger' }}"></i>
                            </h4>
                            <div class="d-flex">
                                <span
                                    class="badge badge-soft-{{ $data['get_access_today'] > $data['get_access_yesterday'] ? 'success' : 'danger' }} font-size-12">
                                    {{ $data['get_access_today'] > $data['get_access_yesterday'] ? '+' : '-' }}
                                    {{ $data['%access'] }}% </span> <span class="ms-2 text-truncate">So với hôm qua</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <div class="card">
                    <div class="card-body bsd color-box bg-danger
                     bg-soft">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-down-arrow-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Lượt tải hôm nay</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{ $data['get_link_today'] }} <i
                                    class="mdi mdi-chevron-{{ $data['get_link_today'] > $data['get_link_yesterday'] ? 'up' : 'down' }} ms-1 text-{{ $data['get_link_today'] > $data['get_link_yesterday'] ? 'success' : 'danger' }}"></i>
                            </h4>
                            <div class="d-flex">
                                <span
                                    class="badge badge-soft-{{ $data['get_link_today'] > $data['get_link_yesterday'] ? 'success' : 'danger' }} font-size-12">
                                    {{ $data['get_link_today'] > $data['get_link_yesterday'] ? '+' : '-' }}
                                    {{ $data['%link'] }}% </span> <span class="ms-2 text-truncate">So với hôm qua</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-4">
                <div class="card mini-stats-wid color-box bg-primary bg-soft">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Thư Liên Hệ</p>
                                <h4 class="mb-0">{{ App\Models\Contact::count() }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bxs-grid-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid color-box bg-primary bg-soft">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Tin Tức</p>
                                <h4 class="mb-0">{{ App\Models\Post::count() }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bxs-inbox font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid color-box bg-primary bg-soft">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Sản Phẩm</p>
                                <h4 class="mb-0">{{ App\Models\Product::count() }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-link font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <figure class="highcharts-figure">
            <div class="card">
                <div class="card-body bsd">
                    <div class="apex-charts" id="area-chart" dir="ltr"></div>
                </div>
            </div>
        </figure>
        <div class="card-body bsd">
        <form id="shortday" action="{{ route('backend.shortday.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="box-body ">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i>
                                {{ __('Chọn tháng') }}</label>
                            <select class="form-control" name="getmonth" id="getmonth">
                                @for ($i = 1; $i <= 12; $i++)
                                    @if ($i == Carbon\Carbon::now()->month && $i < 10)
                                        <option selected value="0{{ Carbon\Carbon::now()->month }}"> {{ $i }}
                                        </option>
                                    @elseif($i == Carbon\Carbon::now()->month && $i > 10)
                                        <option selected value="{{ Carbon\Carbon::now()->month }}"> {{ $i }}
                                        </option>
                                    @elseif ($i < 10)
                                        <option selected value="0{{ $i }}"> {{ $i }}</option>
                                    @else
                                        <option value="{{ $i }}"> {{ $i }}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i>
                                {{ __('Chọn năm') }}</label>
                            <select class="form-control" id="getyear" name="getyear">
                                @for ($i = Carbon\Carbon::now()->year; $i <= 2040; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i>
                                {{ __('Tra cứu') }}</label>
                            <button type="submit" style="background: #14a2b8;color:white"
                                class="btn form-control xemthongke">{{ __('Kết quả') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form></div>
        <hr>
        {{-- <div class="row mt-3 ">
            <div class="col-xl-12">
                <div class="card bg-primary bg-soft">
                    <div>
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Chào mừng quay trở lại!</h5>
                                    <p>Thông tin tài khoản Fshare của bạn</p>

                                    <ul class="ps-3 mb-0">
                                        <li class="py-1">ID : {{ $responseBody['id'] ?? '' }}</li>
                                        <li class="py-1">Cấp : {{ $responseBody['level'] ?? '' }} </li>
                                        <li class="py-1">Tổng point : {{ $responseBody['totalpoints'] ?? '' }}</li>
                                        <li class="py-1">Hạn vip :
                                            {{ \Carbon\Carbon::createFromTimestamp($responseBody['expire_vip'] ?? '')->addHours(7)->toDateTimeString() }}
                                        </li>
                                        <li class="py-1">Loại tài khoản : {{ $responseBody['account_type'] ?? '' }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="p-4">
                        <h5 class="text-primary">Đăng Nhập Fshare</h5>
                        <form action="{{ route('login_fshare') }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <input type="text" placeholder="Tài khoản" value="{{ $fshare->username ?? '' }}"
                                    class="form-control" name="user_email">
                            </div>
                            <div class="form-group mb-2">
                                <input type="password" value="{{ $fshare->password ?? '' }}" placeholder="Mật khẩu"
                                    class="form-control" name="password">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" placeholder="App_Key" value="{{ $fshare->app_key ?? '' }}"
                                    class="form-control" name="app_key">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" placeholder="User_Agent" value="{{ $fshare->app_name ?? '' }}"
                                    class="form-control" name="user_agent">
                            </div>
                            <button class="btn btn-success waves-effect waves-light" type="submit">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-9 col-sm-8">
                            <div class="p-4">
                                <h5 class="text-primary">Thông tin Fshare</h5>
                                <div class="text-muted">
                                    <p class="mb-1"><i class="mdi mdi-circle-medium align-middle text-primary me-1"></i>
                                        Tài khoản : {{ $fshare->username ?? '' }}</p>
                                    <p class="mb-1"><i
                                            class="mdi mdi-circle-medium align-middle text-primary me-1"></i>Mật khẩu :
                                        {{ $fshare->password ?? '' }}</p>
                                    <p class="mb-0"><i
                                            class="mdi mdi-circle-medium align-middle text-primary me-1"></i>App_Key :
                                        {{ $fshare->app_key ?? '' }}</p>
                                    <p class="mb-0"><i
                                            class="mdi mdi-circle-medium align-middle text-primary me-1"></i>App_Name :
                                        {{ $fshare->app_name ?? '' }}</p>
                                    <p class="mb-0"><i
                                            class="mdi mdi-circle-medium align-middle text-primary me-1"></i>Token :
                                        {{ $fshare->token ?? '' }}</p>
                                    <p class="mb-0"><i
                                            class="mdi mdi-circle-medium align-middle text-primary me-1"></i>Session :
                                        {{ $fshare->session ?? '' }}</p>
                                </div>
                                <a class="btn btn-danger" href="{{ route('logout_fshare') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-fshare-form').submit();">
                                    {{ __('Đăng xuất') }}
                                </a>
                                <form id="logout-fshare-form" action="{{ route('logout_fshare') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 align-self-center">
                            <div>
                                <img src="assets/images/crypto/features-img/img-1.png" alt=""
                                    class="img-fluid d-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets') }}/libs/apexcharts/apexcharts.min.js"></script>
    <script>
        var API_URL = "{{ route('home') }}";
        $.get(API_URL + "/thong-ke-truy-cap").then(function(response) {
            var options = {
                    series: [{
                            name: "Truy cập",
                            data: response.access
                        },
                        {
                            name: "Lượt tải",
                            data: response.download
                        }
                    ],
                    chart: {
                        height: 350,
                        type: "area",
                        toolbar: {
                            show: false
                        }
                    },
                    colors: ["#556ee6", "#f1b44c"],
                    dataLabels: {
                        enabled: !1
                    },
                    title: {
                        text: 'Biểu đồ thống kê truy cập website tháng {{ \Carbon\Carbon::now()->month }} - {{ \Carbon\Carbon::now()->year }}',
                    },
                    stroke: {
                        curve: "smooth",
                        width: 2
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            shadeIntensity: 1,
                            inverseColors: !1,
                            opacityFrom: .45,
                            opacityTo: .05,
                            stops: [20, 100, 100, 100]
                        }
                    },
                    xaxis: {
                        categories: response.day,
                    },
                    markers: {
                        size: 3,
                        strokeWidth: 3,
                        hover: {
                            size: 4,
                            sizeOffset: 2
                        }
                    },
                    legend: {
                        position: "top",
                        horizontalAlign: "right"
                    }
                },
                chart = new ApexCharts(document.querySelector("#area-chart"), options);
            chart.render();


            var options2 = {
                    series: [{
                        name: "Truy cập",
                        data: response.access
                    }, ],
                    chart: {
                        height: 100,
                        type: "line",
                        toolbar: {
                            show: false
                        }
                    },
                    title: {
                        style: {
                            fontSize:  '10px',
                            fontWeight:  'normal',
                            color:  '#495057'
                            },
                        text: 'Truy cập website tháng này',
                    },
                    colors: ["#556ee6"],

                    stroke: {
                        curve: "smooth",
                        width: 1
                    },
                    xaxis: {
                        lines: {
                            show: false,
                        },
                        labels: {
                            show: false,
                        }
                    },
                    yaxis: {
                        show: false
                    },

                },
                chart2 = new ApexCharts(document.querySelector("#total_access"), options2);
            chart2.render();

            var options3 = {
                    series: [{
                        name: "Lượt tải",
                        data: response.download
                    }, ],
                    chart: {
                        height: 100,
                        type: "line",
                        toolbar: {
                            show: false
                        }
                    },
                    title: {
                        style: {
                            fontSize:  '10px',
                            fontWeight:  'normal',
                            color:  '#495057'
                            },
                        text: 'Lượt tải tháng này',
                    },
                    colors: ["#f1b44c"],
                    stroke: {
                        curve: "smooth",
                        width: 1
                    },
                    xaxis: {
                        lines: {
                            show: false,
                        },
                        labels: {
                            show: false,
                        }
                    },
                    yaxis: {
                        show: false
                    },

                },
                chart3 = new ApexCharts(document.querySelector("#total_link"), options3);
            chart3.render();
        });
    </script>

    <script>
        $("#shortday").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var get_month = $('#getmonth').val();
            var get_year = $('#getyear').val();
            var url = form.attr("action");
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data) {

                    var options = {
                        series: [],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: !1
                            }
                        },
                        colors: ["#556ee6", "#f1b44c"],
                        dataLabels: {
                            enabled: !1
                        },
                        title: {
                            text: 'Biểu đồ thống kê truy cập website tháng ' + get_month + ' - ' +
                                get_year,
                        },
                        stroke: {
                            curve: "smooth",
                            width: 2
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .45,
                                opacityTo: .05,
                                stops: [20, 100, 100, 100]
                            }
                        },
                        xaxis: {
                            categories: data.day
                        },
                        markers: {
                            size: 3,
                            strokeWidth: 3,
                            hover: {
                                size: 4,
                                sizeOffset: 2
                            }
                        },
                        legend: {
                            position: "top",
                            horizontalAlign: "right"
                        },

                    };

                    chart = new ApexCharts(document.querySelector("#area-chart"), options);
                    chart.render();
                    chart.updateSeries([{
                        name: 'Truy cập',
                        data: data.access
                    }, {
                        name: "Lượt tải",
                        data: data.download
                    }])
                },
            });
        });
    </script>
@endpush
