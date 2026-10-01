<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }} | Al Arafat Admin</title>
    <link rel="stylesheet" href="{{ asset('css/pages/admin.css') }}">
    @stack('head')
</head>
<body class="admin-body">
    <aside class="admin-sidebar">
        <a class="admin-brand" href="{{ route('admin.dashboard') }}" aria-label="Al Arafat Admin">AL-ARAFAT <small>TOURS &amp; TRAVELS</small></a>
        <nav class="admin-nav" aria-label="Admin navigation">
            <span class="nav-section-label">Overview</span>
            <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="nav-section-label">Content</span>
            <a class="{{ request()->routeIs('admin.packages.*') ? 'active' : '' }}" href="{{ route('admin.packages.index') }}">Packages</a>
            <a class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}">Blog</a>
            <span class="nav-section-label">Operations</span>
            <a class="{{ request()->routeIs('admin.enquiries') ? 'active' : '' }}" href="{{ route('admin.enquiries') }}">Enquiries</a>
        </nav>
        <form class="sidebar-logout" method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">Log out</button>
        </form>
    </aside>
    <main class="admin-main">
        <header class="admin-header"><h1>{{ $pageTitle }}</h1></header>
        <div class="admin-content">
            @if(session('success'))
                <div class="notice-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="notice-error">{{ $errors->first() }}</div>
            @endif
            @yield('content')
        </div>
    </main>
</body>
</html>