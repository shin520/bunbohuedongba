@extends('be.layouts.app')
@push('style')
    <link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
    @push('script')
        <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

                fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
                    window.opener.fmSetLink(fileUrl);
                    window.close();
                });
            });
        </script>fi
    @endpush
@endpush
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">QUẢN LÍ FILE
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">File Manager</li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="col-md-12" id="fm-main-block">
                <div id="fm"></div>
            </div>
        </div>
    </div>
@endsection
