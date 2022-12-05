@extends('index.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
                <nav aria-label="breadcrumb" style="margin-top: 10px">
                    <ol class="breadcrumb shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" title="branch"><i
                                    class="ti-home"></i>{{ __('Trang chủ') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Chi nhánh') }}</li>
                    </ol>
                </nav>
                <div class="main-title text-center mb-5">
                    <h2 class="title font-weight-bold">{{ __('CHI NHÁNH') }}</h2>
                </div>
                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-lg-6 col-md-12 mb-4">
                            <a class="branch_item" href="{{ route('branch', $item->slug) }}" style="display: block">
                                <h3 class="notranslate name">{{ $item->name }}</h3>
                                <div class="address"><b>Địa chỉ: </b> {{ $item->address }}</div>
                            </a>
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
