@extends('be.layouts.app')
@section('content')
    <div class="card-body pt-3 pb-3">
        <div class="container">
            <div class="row">
                    @include('be.profile.sidebar')
                <div class="col-md-9">
                    @yield('content_profile')
                </div>
            </div>
        </div>

    </div>
@endsection
