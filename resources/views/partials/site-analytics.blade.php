@php
    $siteName = config('app.name', 'Al Arafat Tours & Travels');
    $defaultDescription = 'Book trusted Hajj and Umrah packages from Mumbai with Al Arafat Tours & Travels.';
    $pageTitle = $title ?? $siteName;
    $pageDescription = $description ?? $defaultDescription;
    $pageUrl = url()->current();
    $geoLatitude = '19.1573604';
    $geoLongitude = '72.8382534';
    $googleTagId = config('services.google.tag_id', env('GOOGLE_TAG_ID', 'G-KYVL6BJH6D'));
    $googleVerification = trim((string) config('services.google.site_verification', env('GOOGLE_SITE_VERIFICATION', '')));
@endphp

@if($googleVerification !== '')
    <meta name="google-site-verification" content="{{ $googleVerification }}">
@endif
<meta name="geo.region" content="IN-MH">
<meta name="geo.placename" content="Mumbai, Maharashtra, India">
<meta name="geo.position" content="{{ $geoLatitude }};{{ $geoLongitude }}">
<meta name="ICBM" content="{{ $geoLatitude }}, {{ $geoLongitude }}">
<meta name="language" content="en-IN">
<meta property="og:locale" content="en_IN">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:url" content="{{ $pageUrl }}">
<meta property="og:image" content="{{ asset('images/umrahpage/Al-Arafat-Website-Work.png') }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:image" content="{{ asset('images/umrahpage/Al-Arafat-Website-Work.png') }}">

@if($googleTagId)
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $googleTagId }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $googleTagId }}');
    </script>
@endif
