<meta name="theme-color" content="#004d78" />
<meta name="google" content="notranslate" />
<meta name="msapplication-navbutton-color" content="#004d78" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta name="DC.title" content="{{ $setting->name }}" />
<meta name="geo.region" content="VN" />
<meta name="geo.placename" content="{{ $setting->address }}" />
{{-- <meta name="geo.position" content="{{ $setting->latitude }};{{ $setting->longitude }}" />
<meta name="ICBM" content="{{ $setting->latitude }}, {{ $setting->longitude }}" /> --}}
<meta name="DC.identifier" content="{{ $setting->url }}" />
<meta name="format-detection" content="telephone=no">
<link rel="canonical" href="{{ URL::current() }}" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="robots" content="{{ $setting->robots }}" />
<meta name="googlebot" content="NOODP" />
<meta name="revisit-after" content="1 days" />
{!! $setting->googlesiteverification !!}
<meta name="author" content="{{ $setting->author }}" />
<meta name="copyright" content="{{ $setting->name }} [{{ $setting->email }}]" />
<title>{{ $master['title'] }}</title>
<meta name="title" content="{{ $master['title'] }}" />
<meta name="keywords" content="{{ $master['keyword'] }}" />
<meta name="description" content="{{ $master['description'] }}" />
<meta itemprop="name" content="{{ $master['title'] }}" />
<meta itemprop="description" content="{{ $master['description'] }}" />
<meta itemprop="image" content="{{ url('/storage/uploads/' . $master['img']) }}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="{{ $setting->author }}" />
<meta name="twitter:title" content="{{ $master['title'] }}" />
<meta name="twitter:description" content="{{ $master['description'] }}" />
<meta name="twitter:creator" content="{{ $setting->author }}" />
<meta name="twitter:image" content="{{ url('/storage/uploads/' . $master['img']) }}" />
<meta property="og:title" content="{{ $master['title'] }}" />
<meta property="og:type" content="{{ $master['type'] ?? '' }}" />
<meta property="og:url" content="{{ URL::current() }}" />
<meta property="og:image" content="{{ url('/storage/uploads/' . $master['img']) }}" />
<meta property="og:image:secure_url" content="{{ url('/storage/uploads/' . $master['img']) }}" />
{{-- <meta property="og:image:width"
    content="{{ $master['img'] ? ([$width] = getimagesize(url('/storage/uploads/' . $master['img']))[0]) : '' }}" />
<meta property="og:image:height"
    content="{{ $master['img'] ? ([$height] = getimagesize(url('/storage/uploads/' . $master['img']))[1]) : '' }}" /> --}}
<meta property="og:image:alt" content="{{ $master['title'] }}" />
<meta property="og:description" content="{{ $master['description'] }}" />
<meta property="og:site_name" content="{{ $master['title'] }}" />
<meta property="og:site_property" content="{{ URL::current() }}" />
<meta property="og:locale" content="vi_VN" />
<meta property="article:publisher" content="{{ $setting->publisher }}" />
{{-- <meta property="article:author" content="{{ route('frontend.author.index') }}" /> --}}
<meta property="blog:published_time" content="{{ $master['created_at'] }}" />
<meta property="blog:modified_time" content="{{ $master['updated_at'] }}" />
<meta property="blog:section" content="{{ $master['title'] }}" />
