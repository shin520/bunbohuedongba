@extends('be.layouts.app')

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Cài đặt trang web
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Cài đặt</a></li>
                            <li class="breadcrumb-item active">Thông tin website</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Thông tin</a>
                <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Hình ảnh</a>
                <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">SEO</a>
                <a class="nav-link mb-2" id="v-pills-configs-tab" data-bs-toggle="pill" href="#v-pills-configs" role="tab" aria-controls="v-pills-configs" aria-selected="false">Cấu hình</a>
                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Xem trước</a>
                <button class="btn btn-success" id="submit_form">
                    Lưu
                </button>
                </div>
            </div>
            <div class="col-md-9">
                <form id="form-update" method="POST" action="{{ route('update_info_web') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <section>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Tên website</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">URL trang</label>
                                        <input type="text" class="form-control" name="url"
                                            value="{{ $data->url }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">SĐT</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $data->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">SĐT phụ ( nếu có)</label>
                                        <input type="text" class="form-control" name="phone_2"
                                            value="{{ $data->phone_2 }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $data->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Email phụ ( nếu có)</label>
                                        <input type="text" class="form-control" name="email_2"
                                            value="{{ $data->email_2 }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $data->address }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Địa chỉ phụ ( nếu có)</label>
                                        <input type="text" class="form-control" name="address_2"
                                            value="{{ $data->address_2 }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Link Facebook</label>
                                        <input type="text" class="form-control" name="facebook"
                                            value="{{ $data->facebook }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Link Zalo</label>
                                        <input type="text" class="form-control" name="zalo"
                                            value="{{ $data->zalo }}">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Link bản đồ</label>
                                       <textarea name="maps" class="form-control" cols="30" rows="10">{{ $data->maps ?? old('maps') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <section>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Logo</label>
                                        <img id="imgpreview" class="img-thumbnail mb-2"
                                            src="{{ asset('storage') }}/uploads/{{ $data->logo }}"
                                            alt="{{ $data->name }}">
                                        <input type="file" name="logo" class="form-control"
                                            value="{{ $data->logo }}" data-toggle="tooltip" data-placement="top"
                                            oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">

                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Logo Tối</label>
                                        <img id="imgpreview2" class="img-thumbnail mb-2"
                                            src="{{ asset('storage') }}/uploads/{{ $data->logo_dark }}"
                                            alt="{{ $data->name }}">
                                        <input type="file" name="logo_dark" class="form-control"
                                            value="{{ $data->logo_dark }}" data-toggle="tooltip" data-placement="top"
                                            oninput="imgpreview2.src=window.URL.createObjectURL(this.files[0])">

                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Favicon</label>
                                        <img id="imgpreview2" class="img-thumbnail mb-2"
                                            src="{{ asset('storage') }}/uploads/{{ $data->favicon }}"
                                            alt="{{ $data->name }}">
                                        <input type="file" name="favicon" class="form-control"
                                            value="{{ $data->img }}" data-toggle="tooltip" data-placement="top"
                                            oninput="imgpreview2.src=window.URL.createObjectURL(this.files[0])">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Ảnh hiển thị khi chia sẻ link</label>
                                        <img id="imgpreview3" class="img-fluid mb-2"
                                            src="{{ asset('storage') }}/uploads/{{ $data->img_share }}"
                                            alt="{{ $data->name }}">
                                        <input type="file" name="img_share" class="form-control"
                                            value="{{ $data->img }}" data-toggle="tooltip" data-placement="top"
                                            oninput="imgpreview3.src=window.URL.createObjectURL(this.files[0])">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <section>
                            <div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label for="">Robots Tag</label>
                                            <input type="text" class="form-control" name="robots" placeholder="noodp,index,follow" value="{{ $data->robots ?? old('robots') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label for="">Lang</label>
                                            <input type="text" class="form-control" name="lang" placeholder="vi" value="{{ $data->lang ?? old('lang') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label for="">Author</label>
                                            <input type="text" class="form-control" name="author" value="{{ $data->author ?? old('author') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label for="">Publisher</label>
                                            <input type="text" class="form-control" name="publisher" value="{{ $data->publisher ?? old('publisher') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $data->title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label for="">Keyword</label>
                                            <textarea name="keyword" id="" class="form-control" cols="10" rows="5">{!! $data->keyword !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label for="">Mô tả</label>
                                            <textarea name="description" id="" class="form-control" cols="10" rows="9">{!! $data->description !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="v-pills-configs" role="tabpanel" aria-labelledby="v-pills-configs-tab">
                        <section>
                            <div>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label for="">Link nhúng</label>
                                           <textarea name="js_body" class="form-control" cols="30" rows="10">{{ $data->js_body ?? old('js_body') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label>RECAPTCHA SECRET V3 <span ><a target="_blank" href="https://www.google.com/recaptcha/admin/">Đăng kí</a></span></label>
                                            <input type="text" name="captcha_secret" value="{{ $data->captcha_secret ?? old('captcha_secret')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label>RECAPTCHA SITEKEY V3</label>
                                            <input type="text" name="captcha_sitekey" value="{{ $data->captcha_sitekey ?? old('captcha_sitekey')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="">Ngày đăng web</label>
                                        <input type="text" name="created_at" value="{{ $data->created_at }}" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="">Ngày cập nhật web</label>
                                        <input value="{{ $data->updated_at }}" type="text" name="updated_at" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="show-web">
                                        <div class="url">{{ $data->url }} <i class="fas fa-angle-down"></i>
                                        </div>
                                        <h3><a target="_blank" href="{{ '/' }}">{{ $data->title }}
                                            </a>
                                        </h3>
                                        <div>
                                            <p>{{ $data->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Lưu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        .form-group label {
            font-weight: bold;
            color: #28a745;
        }
    </style>
@endpush
@push('script')
    <script src="{{ asset('assets') }}/js/pages/form-wizard.init.js"></script>
    <script src="{{ asset('assets') }}/libs/jquery-steps/build/jquery.steps.min.js"></script>

    <script>
        function update_info() {
            $('#form-update').submit();
        }
        $('#submit_form').on('click',function(){
            update_info();
        })
        $('#form-update input, textarea').on('change',function(){
            var value = $(this).val();
            var name = $(this).attr('name');
            var _token = $('meta[name=csrf-token]').attr('content');
            $.ajax({
                url : "{{ route('ajax_update_info_web') }}",
                type:'POST',
                data:{
                    value : value,
                    name:name,
                    _token:_token
                },
            success:function(data){
                Toast.fire({
                icon: 'success',
                title: 'Đã cập nhật dữ liệu !'
                })
            }
            });
        });
    </script>
@endpush
