{{-- <div class="scrollup">
    <img class="bounce2" src="{{ asset('bunbodongba/images/totop.png') }}" alt="icon">
</div> --}}
<a class="btn-phone btn-frame text-decoration-none"
    href="tel:{{ Str::of(Str::of($setting->phone)->replace(' ', ''))->replace('.', '') }}">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img class="ringring" src="{{ asset('bunbodongba/images/icon-sms/hl.png') }}" alt="Hotline"></i>
</a>
<a class="d-none d-lg-block d-sm-block" href="https://zalo.me/{{ Str::of($setting->phone)->replace(' ', '') }}"
    rel="nofollow" target="_blank">
    <div class="zalo-btn">
    </div>
</a>
<div class="chat-nav d-block d-lg-none d-md-none">
    <ul>
        <li>
            <a href="{{ route('page', $share['all_branch_menu']->slug) }}"
                rel="nofollow">
                <i class="ticon-heart "></i>{{__('Tìm đường')}}
            </a>
        </li>
        <li>
            <a href="https://zalo.me/{{$setting->zalo}}" rel="nofollow" target="_blank">
                <i class="ticon-zalo-circle2"></i>{{__('Chat zalo')}}
            </a>
        </li>
        <li>
            <a href="tel:{{$setting->phone}}" rel="nofollow" class="call-mobile ">
                <div class="call-mobile-style">
                    <i class="icon-phone-w call" aria-hidden="true"></i>
                </div>
                <span class="btn_phone_txt">{{__('Gọi điện')}}</span>
            </a>
        </li>
        <li>
            <a href="{{$setting->facebook}}" rel="nofollow" target="_blank">
                <i class="ticon-zalo-circle3"></i>Facebook
            </a>
        </li>
        <li>
            <a href="sms:{{ $setting->phone ?? $setting->phone_2 }}" class="chat_animation">
                <i class="ticon-chat-sms" aria-hidden="true" title="Nhắn tin SMS"></i>
                Nhắn tin SMS
            </a>
        </li>
    </ul>
</div>

<style>
    .scrollup {
        overflow: hidden;
        width: 40px;
        height: 40px;
        position: fixed;
        border-radius: 3px;
        bottom: 80px;
        right: 20px;
        color: #fff;
        line-height: 40px;
        text-align: center;
        display: none;
        z-index: 99999999;
        background-color: #ffb337;
        cursor: pointer;
        border: 1px solid white;
    }

    .scrollup img{
        width: 30px;
        height: 30px;
        object-fit: cover;
    }

    .show {
        display: block;
    }

    .zalo-btn {
        animation: play 2s ease infinite;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        backface-visibility: hidden;
        overflow: hidden;
        /* border-radius: 50%; */
        border-radius: 50%;
        background: url('{{ asset('bunbodongba/images/icon-sms/iconzalo.png') }}') no-repeat;
        background-size: contain;
        width: 50px;
        height: 50px;
        position: fixed;
        right: 20px;
        bottom: 150px;
        z-index: 99;
    }
.bounce2 {
  animation: bounce2 3s ease infinite;
}
@keyframes bounce2 {
	0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
	40% {transform: translateY(-20px);}
	60% {transform: translateY(-10px);}
}
    @keyframes play {
        0% {
            transform: scale(1);
        }

        15% {
            box-shadow: 0 0 0 5px rgba(22, 139, 212, 0.4);
        }

        25% {
            box-shadow: 0 0 0 10px rgba(22, 139, 212, 0.4),
                0 0 0 20px rgba(22, 139, 212, 0.2);
        }

        25% {
            box-shadow: 0 0 0 15px rgba(22, 139, 212, 0.4),
                0 0 0 30px rgba(22, 139, 212, 0.2);
        }
    }

    @keyframes play_cart {
        0% {
            transform: scale(1);
        }

        15% {
            box-shadow: 0 0 0 5px rgba(107, 212, 22, 0.4);
        }

        25% {
            box-shadow: 0 0 0 10px rgba(107, 212, 22, 0.4),
                0 0 0 20px rgba(107, 212, 22, 0.2);
        }

        25% {
            box-shadow: 0 0 0 15px rgba(107, 212, 22, 0.4),
                0 0 0 30px rgba(107, 212, 22, 0.2);
        }
    }

    .btn-frame {
        display: block;
        width: 50px;
        height: 50px;
        position: fixed;
        right: 20px;
        z-index: 10;
        cursor: pointer;
    }

    .btn-frame i {
        display: flex;
        display: -ms-flex;
        justify-content: center;
        align-items: center;
        -ms-flex-align: center;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #1182fc;
        position: relative;
        z-index: 1;
    }

    .btn-frame i img {
        vertical-align: middle;
        width: 70%;
    }

    .btn-frame .animated.infinite {
        animation-iteration-count: infinite;
    }

    .btn-frame .kenit-alo-circle {
        width: 60px;
        height: 60px;
        top: -5px;
        right: -5px;
        position: absolute;
        background-color: transparent;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        border: 2px solid rgba(7, 41, 103, 0.8);
        opacity: 0.1;
        border-color: #1182fc;
        opacity: 0.5;
    }

    .btn-frame .zoomIn {
        animation-name: zoomIn;
    }

    .btn-frame .animated {
        animation-duration: 1s;
        animation-fill-mode: both;
    }

    .btn-frame .kenit-alo-circle-fill {
        width: 70px;
        height: 70px;
        top: -10px;
        right: -10px;
        position: absolute;
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -ms-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        border: 2px solid transparent;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        background-color: rgba(7, 41, 103, 0.35);
        opacity: 0.4;
    }

    .btn-frame .pulse {
        animation-name: pulse;
    }

    .btn-phone {
        bottom: 250px;
    }

    /*! CSS Used keyframes */
    @-webkit-keyframes zoomIn {
        0% {
            opacity: 0;
            -webkit-transform: scale3d(0.3, 0.3, 0.3);
            transform: scale3d(0.3, 0.3, 0.3);
        }

        50% {
            opacity: 1;
        }
    }

    @keyframes zoomIn {
        0% {
            opacity: 0;
            -webkit-transform: scale3d(0.3, 0.3, 0.3);
            transform: scale3d(0.3, 0.3, 0.3);
        }

        50% {
            opacity: 1;
        }
    }

    @-webkit-keyframes pulse {
        0% {
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
        }

        50% {
            -webkit-transform: scale3d(1.05, 1.05, 1.05);
            transform: scale3d(1.05, 1.05, 1.05);
        }

        to {
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
        }
    }

    @keyframes pulse {
        0% {
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
        }

        50% {
            -webkit-transform: scale3d(1.05, 1.05, 1.05);
            transform: scale3d(1.05, 1.05, 1.05);
        }

        to {
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
        }
    }

    .ringring {
        -webkit-animation: coccoc-alo-circle-img-anim 1s infinite ease-in-out;
        -moz-animation: coccoc-alo-circle-img-anim 1s infinite ease-in-out;
        -ms-animation: coccoc-alo-circle-img-anim 1s infinite ease-in-out;
        -o-animation: coccoc-alo-circle-img-anim 1s infinite ease-in-out;
        animation: coccoc-alo-circle-img-anim 1s infinite ease-in-out;
    }

    @-moz-keyframes coccoc-alo-circle-img-anim {
        0% {
            transform: rotate(0) scale(1) skew(1deg)
        }

        10% {
            transform: rotate(-25deg) scale(1) skew(1deg)
        }

        20% {
            transform: rotate(25deg) scale(1) skew(1deg)
        }

        30% {
            transform: rotate(-25deg) scale(1) skew(1deg)
        }

        40% {
            transform: rotate(25deg) scale(1) skew(1deg)
        }

        50% {
            transform: rotate(0) scale(1) skew(1deg)
        }

        100% {
            transform: rotate(0) scale(1) skew(1deg)
        }
    }

    @-webkit-keyframes coccoc-alo-circle-img-anim {
        0% {
            transform: rotate(0) scale(1) skew(1deg)
        }

        10% {
            transform: rotate(-25deg) scale(1) skew(1deg)
        }

        20% {
            transform: rotate(25deg) scale(1) skew(1deg)
        }

        30% {
            transform: rotate(-25deg) scale(1) skew(1deg)
        }

        40% {
            transform: rotate(25deg) scale(1) skew(1deg)
        }

        50% {
            transform: rotate(0) scale(1) skew(1deg)
        }

        100% {
            transform: rotate(0) scale(1) skew(1deg)
        }
    }

    @-o-keyframes coccoc-alo-circle-img-anim {
        0% {
            transform: rotate(0) scale(1) skew(1deg)
        }

        10% {
            transform: rotate(-25deg) scale(1) skew(1deg)
        }

        20% {
            transform: rotate(25deg) scale(1) skew(1deg)
        }

        30% {
            transform: rotate(-25deg) scale(1) skew(1deg)
        }

        40% {
            transform: rotate(25deg) scale(1) skew(1deg)
        }

        50% {
            transform: rotate(0) scale(1) skew(1deg)
        }

        100% {
            transform: rotate(0) scale(1) skew(1deg)
        }
    }

    @keyframes coccoc-alo-circle-img-anim {
        0% {
            transform: rotate(0) scale(1) skew(1deg)
        }

        10% {
            transform: rotate(-25deg) scale(1) skew(1deg)
        }

        20% {
            transform: rotate(25deg) scale(1) skew(1deg)
        }

        30% {
            transform: rotate(-25deg) scale(1) skew(1deg)
        }

        40% {
            transform: rotate(25deg) scale(1) skew(1deg)
        }

        50% {
            transform: rotate(0) scale(1) skew(1deg)
        }

        100% {
            transform: rotate(0) scale(1) skew(1deg)
        }
    }

    .chat-nav {
        position: fixed;
        left: 13px;
        background: #fff;
        border-radius: 5px;
        width: auto;
        z-index: 150;
        bottom: 200px;
        padding: 10px 0;
        border: 1px solid #f2f2f2;
    }

    .chat-nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .chat-nav ul li {
        list-style: none !important;
    }

    .chat-nav ul>li a {
        border: none;
        padding: 3px;
        display: block;
        border-radius: 5px;
        text-align: center;
        font-size: 10px;
        line-height: 15px;
        color: #515151;
        font-weight: 700;
        max-width: 75px;
        max-height: 55px;
        text-decoration: none;
    }

    .chat-nav ul>li .chat_animation {
        display: none;
    }

    .chat-nav ul>li a i.ticon-heart {
        background: url('{{ asset('bunbodongba/images/icon-sms/icon-map.png') }}') no-repeat;
        background-size: contain;
        width: 36px;
        height: 36px;
        display: block;
    }

    .chat-nav ul>li a i.ticon-zalo-circle2 {
        background: url('{{ asset('bunbodongba/images/icon-sms/iconzalo.png') }}') no-repeat;
        background-size: contain;
        width: 36px;
        height: 36px;
        display: block;
    }

    .chat-nav ul>li a i.ticon-zalo-circle3 {
        background: url('{{ asset('bunbodongba/images/icon-sms/facebook.png') }}') no-repeat;
        background-size: contain;
        width: 36px;
        height: 36px;
        display: block;
    }

    .chat-nav ul>li a i {
        width: 33px;
        height: 33px;
        display: block;
        margin: auto;
    }

    .chat-nav ul>li a i.ticon-chat-sms {

        background: url('{{ asset('bunbodongba/images/icon-sms/icon-sms.jpeg') }}') no-repeat;
        background-size: contain;
        width: 36px;
        height: 36px;
        display: block;
    }

    .chat-nav ul>li a .call-mobile-style {
        animation: call 3s linear infinite;

        background: url('{{ asset('bunbodongba/images/icon-sms/widget_icon_click_to_call.svg') }}') no-repeat;
        background-size: contain;
        width: 36px;
        height: 36px;
        display: block;
        margin: auto;
    }

    @media only screen and (max-width: 768px) {
        .cp__header {
            display: flex;
            flex-direction: column;
        }

        .cp__header .cp__item {
            margin: 5px 0px;
            grid-gap: 5px;
        }

        .chat-nav li .call-mobile {
            position: relative;
        }

        .chat-nav li .call-mobile-style {
            box-shadow: none;
            position: absolute;
            top: -16px;
            left: 50%;
            transform: translate(-50%, 0);
            width: 50px !important;
            height: 50px !important;
            border-radius: 100%;
            line-height: 15px;
            border: 2px solid white;
        }

        .chat-nav li .call-mobile .btn_phone_txt {
            position: relative;
            top: 35px;
            font-size: 10px;
            font-weight: bold;
            text-transform: none;
        }

        .chat-nav ul>li a i {
            width: 100%;
        }

        .chat-nav li .chat_animation {
            display: block !important;
        }

        .chat-nav ul>li a {
            padding: 0;
            margin: 0 auto;
        }

        .chat-nav {
            background: white;
            width: 100%;
            border-radius: 0;
            color: #fff;
            height: 70px;
            line-height: 50px;
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 999;
            padding: 5px;
            margin: 0;
            box-shadow: 0 4px 10px 0 #000;
        }

        .chat-nav li {
            float: left;
            width: 20%;
            list-style: none;
            height: 50px;
        }
    }
    .cart-fixed {
    animation: play_cart 2s ease infinite;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
    position: fixed;
    right: 20px;
    bottom: 350px;
    z-index: 10;
    background: #55b03a;
    width: 50px;
    height: 50px;
    text-align: center;
    color: #fff;
    border-radius: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.cart-fixed span {
    position: absolute;
    top: 0px;
    right: -5px;
    color: #fff;
    width: 25px;
    height: 25px;
    background: #D21313;
    text-align: center;
    line-height: 25px;
    font-size: 11px;
    border-radius: 100%;
}
</style>
