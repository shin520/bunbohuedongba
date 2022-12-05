@extends('be.layouts.app')
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Google Analytics</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Google Analytics</a></li>
                            <li class="breadcrumb-item active">Tổng quan</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="box box-success">
                <div class="row">
                    @include('be.api-google-analytics.8-col-dashboard')
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="row">
                                <section class="col-lg-7 connectedSortable">
                                        @include('be.api-google-analytics.thongketruycap')
                                        @include('be.api-google-analytics.thongkequocgia')
                                        @include('be.api-google-analytics.thongkesite')
                                </section>
                                <section class="col-lg-5 connectedSortable">
                                        @include('be.api-google-analytics.thongketrinhduyet')
                                        @include('be.api-google-analytics.thongkethietbi')
                                        @include('be.api-google-analytics.nguonkhachhang')
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
