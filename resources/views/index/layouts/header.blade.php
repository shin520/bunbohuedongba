<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/uploads') }}/{{ $setting->favicon }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google" content="notranslate" />
    @include('index.layouts.seo')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets') }}/libs/menu/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/libs/menu/css/style.css">
    <link rel="stylesheet" href="{{ asset('bunbodongba') }}/css/vendor/vendor.min.css"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('bunbodongba') }}/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bunbodongba') }}/slick/slick.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bunbodongba') }}/css/menu.css">
    <link rel="stylesheet" href="{{ asset('bunbodongba') }}/css/mystyle.css">
    <link rel="stylesheet" href="{{ asset('bunbodongba') }}/font-awesome-6/css/all.min.css">
    
</head>

<body>

{!! $setting->js_body !!}

@include('index.component.popup')

{{-- Fanpage embeder  --}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0"
    nonce="lz1jgsTl"></script>

{{-- AIB.VN --}}
<h1 class="d-none">aib.vn</h1>
