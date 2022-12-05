    <!-- footer -->
    <footer>
        <div class="container pt-4 pb-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer__title">Bún Bò Huế Đông Ba</div>
                    <ul>
                        {!! $static['about_footer_content'] !!}
                    </ul>
                    <div class="footer__content d-flex justify-content-start gg-10">
                        <div class="footer_sns__icon">
                            @foreach ($share['social_network'] as $item)
                                <a href="{{ $item->url }}">
                                    {{ $item->name }}
                                    <img src="{{ asset('storage/upload') }}/{{ $item->img }}"
                                        alt="{{ $item->name }}">
                                </a>
                            @endforeach
                            {{-- <i class="fa-brands fa-tiktok"></i>
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-youtube"></i> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer__title">Hệ Thống</div>
                    <ul>
                        @foreach ($share['static_page'] as $item)
                            <li class="footer__content">
                                <a href="{{ route('page', $item->slug) }}">{{ $item->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="footer__content d-flex justify-content-center">
                        <div class="branch_btn branch_btn--open">tìm cửa hàng</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer__title">Chính Sách</div>
                    <ul>
                        @foreach ($share['policy'] as $item)
                            <li class="footer__content"><a
                                    href="{{ route('policy', $item->slug) }}">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>

                    @php $bct = ""; @endphp
                    @if ($bct == 'true')
                        <div class="footer__content d-flex justify-content-end">
                            <img class="jxl img_cover " src="https://shin520.download/Untitled-1.png" alt="">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="bottom_information">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="bottom_information--author">Copyright ©@if (date('Y') > '2022')
                            2022 - {{ date('Y') }}@else{{ date('Y') }}
                        @endif. {{ $setting->name }} - {{ $setting->phone }}. All
                        rights reserved. Designed by <a href="https://aib.vn">AIB.VN</a> 09311.73711 (MaiPham Zalo 24/7)
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <a class="to_topz"><i class="fa-regular fa-up-to-line"></i></a>

    <div class="sns__area">
        <div class="sns__item branch_btn--open">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>

        <div class="sns__item d-none d-lg-block">
            <a href="https://zalo.me/{{ $setting->zalo }}">
                <img src="{{ asset('storage/uploads') }}/202211081438zalo-icon.png" class="img_cover" alt="zalo">
            </a>
        </div>
    </div>
    @include('index.component.action_btn_mobile')

    <script src="{{ asset('assets') }}/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/libs/menu/js/plugins/wow.min.js"></script>
    <script src="{{ asset('assets') }}/libs/menu/js/plugins/some-plugins.js"></script>
    <script src="{{ asset('assets') }}/libs/menu/js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="{{ asset('bunbodongba') }}/slick/slick.js"></script>
    <script src="{{ asset('bunbodongba') }}/js/custom-slick.js"></script>
    <script src="{{ asset('bunbodongba') }}/js/jquery.cookie.min.js"></script>
    <script src="{{ asset('bunbodongba') }}/js/google-translate.js"></script>
    <script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script>

    <script>
        AOS.init();
        var btn = $('.to_topz');
        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, '300');
        });
    </script>
    @include('index.component.js_view_popup')

    @include('sweetalert::alert')

    <script src="https://www.google.com/recaptcha/api.js?render={{ $setting->captcha_sitekey }}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ $setting->captcha_sitekey }}', {
                action: 'contact'
            }).then(function(token) {
                if (token) {
                    document.getElementById('recaptcha').value = token;
                }
            });
        });
    </script>
    <script>
        var has_errors = {{ $errors->count() > 0 ? 'true' : 'false' }};
        if (has_errors) {
            Swal.fire({
                title: '{{ __('error') }}...!',
                icon: 'error',
                html: jQuery('#error_contact').html(),
                showCloseButton: true,
            });
        }
    </script>

    @stack('script')

    </body>

    </html>
