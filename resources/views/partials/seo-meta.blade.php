@php
    $rawPath = request()->path() ?: '/';
    $canonicalPath = preg_replace('#^/?public/?#', '/', $rawPath);
    $canonicalPath = preg_replace('#/+#', '/', $canonicalPath);
    $canonicalPath = $canonicalPath === '' ? '/' : $canonicalPath;
    $canonicalScheme = parse_url(config('app.url', request()->root()), PHP_URL_SCHEME) ?: request()->getScheme();
    $canonicalHost = preg_replace('/^www\./i', '', parse_url(config('app.url', request()->root()), PHP_URL_HOST) ?: request()->getHost());
    $canonicalUrl = $canonicalHost
        ? $canonicalScheme . '://' . $canonicalHost . $canonicalPath
        : url($canonicalPath);
@endphp
<link rel="canonical" href="{{ $canonicalUrl }}">
