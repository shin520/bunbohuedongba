{{-- @extends('auth.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center " style="height: 70vh;S">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading font-weight-bold">Register</div>
                <hr>
                @if($errors->any())
                    <b style="color: red">{{$errors->first()}}</b>

                @endif

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('2fa') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <p>Please enter the  <strong>OTP</strong> generated on your Authenticator App. <br> Ensure you submit the current one because it refreshes every 30 seconds.</p>
                            <label for="one_time_password" class="col-md-4 control-label">One Time Password</label>


                            <div class="col-md-6">
                                <input id="one_time_password" type="number" class="form-control" name="one_time_password" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('auth.layout')

@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Ch??o m???ng quay tr??? l???i !</h5>
                                    <p>Nh???p b???o m???t 2 l???p ????? ti???p t???c.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="auth-logo">
                            <a href="index.html" class="auth-logo-light">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>

                            <a href="{{ '/' }}" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" method="POST" action="{{ route('2fa') }}">
                                @csrf
                                <p>M??? ???ng d???ng <strong>Google Authenticator</strong> v?? ??i???n  <strong>OTP</strong> ???????c t???o ra. OTP s??? ???????c l??m m???i m???i 30s, h??y ch???c ch???n m??nh ??i???n ????ng !</p>
                                <div class="mb-3">
                                    <label for="email" class="form-label">M???t Kh???u 2 L???p</label>
                                    <input id="one_time_password" type="number" class="form-control" name="one_time_password"  autofocus>

                                        @if($errors->any())
                                        <b class="mt-2" style="color: red">{{$errors->first()}}</b>

                                    @endif

                                </div>

                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">????ng nh???p</button>
                                </div>

                                @if (Route::has('password.request'))
                                <div class="mt-4 text-center">
                                    <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Qu??n m???t kh???u?</a>
                                </div>
                                @endif
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
