@extends('be.layouts.app')

@section('content')
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3 col-6 mb-2">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ Counter::count() }}</h3>
                        <p>Tổng truy cập</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 mb-2">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ App\Models\Link::count() }}</h3>
                        <p>Tổng lượt tải</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-chart-bar"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{  $data['get_access_today']->count() }}</h3>
                        <p>Truy cập hôm nay</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{  $data['get_link_today']->count() }}</h3>
                        <p>Lượt tải hôm nay</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>

                </div>
            </div>
        </div>
        <figure class="highcharts-figure">
            <div id="chart"></div>
            <p class="highcharts-description">
            </p>
        </figure>
        <div class="box box-success">
            <form id="shortday" action="{{ route('backend.shortday.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="box-body">
                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> {{ __('Chọn tháng') }}</label>
                                <select class="form-control" name="getmonth" id="getmonth">
                                    @for ($i = 1; $i <= 12; $i++)
                                        @if($i == Carbon\Carbon::now()->month && $i<10)
                                        <option selected value="0{{ Carbon\Carbon::now()->month }}"> {{ $i }}</option>
                                        @elseif($i == Carbon\Carbon::now()->month && $i>10)
                                        <option selected value="{{ Carbon\Carbon::now()->month }}"> {{ $i }}</option>
                                        @elseif ($i < 10)
                                            <option value="0{{ $i }}"> {{ $i }}</option>
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
                                <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> {{ __('Chọn năm') }}</label>
                                <select class="form-control" id="getyear" name="getyear">
                                    @for ($i =  Carbon\Carbon::now()->year ; $i <= 2040; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> {{ __('Tra cứu') }}</label>
                                <button type="submit" style="background: #14a2b8;color:white" class="btn form-control xemthongke">{{ __('Kết quả') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @push('script')
            <script src="{{ asset('assets') }}/js/highcharts/highcharts.js"></script>
            <script src="{{ asset('assets') }}/js/highcharts/exporting.js"></script>
            <script src="{{ asset('assets') }}/js/highcharts/export-data.js"></script>
            <script src="{{ asset('assets') }}/js/highcharts/accessibility.js"></script>
            {{-- <script src="{{ asset('assets') }}/js/highcharts/dark-unica.js"></script> --}}
            <script>
                var API_URL = "{{ route('home') }}";
                $.get(API_URL + "/thong-ke-truy-cap").then(function(response) {
                });
            </script>
            <script>
                $.get(API_URL + "/thong-ke-truy-cap").then(function(response) {
                    Highcharts.setOptions({
                        chart: {
                            style: {
                                fontFamily: "Roboto Condensed",
                            },
                        },
                    });
                    Highcharts.chart("chart", {
                        chart: {
                            type: "column",
                        },
                        title: {
                            text: "Biểu đồ truy cập : <?php echo $month; ?> - <?php echo $year; ?> ",
                        },
                        subtitle: {
                            text: 'Nguồn: <a href="">API Website</a>',
                        },
                        xAxis: {
                            type: "category",
                            labels: {
                                rotation: -45,
                                style: {
                                    fontSize: "13px",
                                    fontFamily: "Roboto Condensed, sans-serif",
                                },
                            },
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: "Lượt truy cập",
                            },
                        },
                        legend: {
                            enabled: false,
                        },
                        tooltip: {
                            pointFormat: "<b>{point.y:.1f} truy cập</b>",
                        },
                        series: [{
                            name: "Lượt truy cập",

                            data: response,
                            dataLabels: {
                                enabled: true,
                                rotation: -90,
                                color: "#FFFFFF",
                                align: "right",
                                format: "{point.y:.1f}", // one decimal
                                y: 10, // 10 pixels down from the top
                                style: {
                                    fontSize: "13px",
                                    fontFamily: "Roboto Condensed, sans-serif",
                                },
                            },
                        }, ],
                    });
                });
            </script>
            <script>
                // this is the id of the form
                $("#shortday").submit(function(e) {
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                    var form = $(this);
                    var get_month = $('#getmonth').val();
                    var get_year = $('#getyear').val();
                    var url = form.attr("action");
                    // alert(url);
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(), // serializes the form's elements.
                        success: function(data) {
                            // alert(data); // show response from the php script.
                            Highcharts.chart("chart", {
                                chart: {
                                    type: "column",
                                },
                                title: {
                                    text: "Thống kê truy cập tháng : " + get_month + ' - ' + get_year,
                                },
                                subtitle: {
                                    text: 'Nguồn: <a href="">API Website</a>',
                                },
                                xAxis: {
                                    type: "category",
                                    labels: {
                                        rotation: -45,
                                        style: {
                                            fontSize: "13px",
                                            fontFamily: "Verdana, sans-serif",
                                        },
                                    },
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: "Lượt truy cập",
                                    },
                                },
                                legend: {
                                    enabled: false,
                                },
                                tooltip: {
                                    pointFormat: "Tổng <b>{point.y:.1f} Lượt truy cập</b>",
                                },
                                series: [{
                                    name: "Lượt truy cập",

                                    data: data,
                                    dataLabels: {
                                        enabled: true,
                                        rotation: -90,
                                        color: "#FFFFFF",
                                        align: "right",
                                        format: "{point.y:.1f}", // one decimal
                                        y: 10, // 10 pixels down from the top
                                        style: {
                                            fontSize: "13px",
                                            fontFamily: "Verdana, sans-serif",
                                        },
                                    },
                                }, ],
                            });
                        },
                    });
                });
            </script>
        @endpush

    </div>
@endsection
