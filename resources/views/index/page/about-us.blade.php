@extends('index.layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 main-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" title="home"><i
                                    class="ti-home"></i>{{ __('trang chủ') }}</a></li>

                        <li class="breadcrumb-item">{{ __('giới thiệu') }}</li>

                    </ol>
                </nav>
                {{-- <div class="main-title text-center mb-2">
                    <h1 class="title font-weight-bold">{{ __('GIỚI THIỆU') }}</h1>
                </div> --}}
            </div>
        </div>
        
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 main-content">
            <article class="post mb-5">
                <div style="overflow: hidden" class="post-content" id="post_content">
                    <div class="main-title ">
                        <h2 style="font-size: 1.5rem" class="font-weight-bold text-center">{{ $data->name }}</h2>
                    </div>
                    {!! $data->content !!}
                </div>
            </article>
        </div>
    </div>
@endsection
