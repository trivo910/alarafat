<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#090909">
    <meta name="description" content="Blog page consider as you are planning on going for Hajj or Umrah, then it is a good idea to consider a Zirayat tour package.">
    <title>Blog - Al Arafat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/blog.css') }}">
</head>
<body>
    @include('partials.site-header', ['activePage' => 'blog'])

    <main class="blog-shell">
        <div class="blog-breadcrumb"><a href="/">Home</a><span>›</span><span>Blog</span></div>

        <div class="blog-layout">
            <div class="main-stack">
                @foreach($blogs as $blog)
                    <article class="post-card">
                        @if($blog->featured_image)
                            <div class="post-hero">
                                <div class="post-hero-image">
                                    <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->image_alt_text ?: $blog->title }}">
                                </div>
                            </div>
                        @endif
                        <div class="post-body">
                            <span class="post-label">Blog</span>
                            <h2><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h2>
                            <div class="meta-row">
                                <span class="avatar">A</span>
                                <span>By Al Arafat Tours &amp; Travels</span>
                                <span>•</span>
                                <span>{{ optional($blog->published_at)->format('F j, Y') ?: 'Recently' }}</span>
                            </div>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 320) }}</p>
                        </div>
                    </article>
                @endforeach

            </div>

            <aside class="side-panel">
                <div class="panel">
                    <h3>Search</h3>
                    <div class="search-box">
                        <input type="text" value="Search..." aria-label="Search blog posts">
                        <button type="button" aria-label="Search">⌕</button>
                    </div>
                </div>

                <div class="panel">
                    <h3>Popular posts</h3>
                    <div class="popular-list">
                        <a class="popular-item" href="#">
                            <img src="https://alarafat.com/wp-content/uploads/2022/12/ziyarah_al_masjid_6f21f1147b-1536x1536.jpg" alt="Begin your blessed journey">
                            <div>
                                <strong>Begin Your Blessed Journey – Umrah Packages from Mumbai</strong>
                                <span>November 1, 2025</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="panel">
                    <h3>Categories</h3>
                    <div class="category-list">
                        <div class="category-item"><div class="left"><span class="dot" style="background:#c89d57"></span>Blog</div><span class="count">6</span></div>
                        <div class="category-item"><div class="left"><span class="dot" style="background:#d86f56"></span>Booking</div><span class="count">0</span></div>
                        <div class="category-item"><div class="left"><span class="dot" style="background:#7ba7df"></span>Hotel</div><span class="count">0</span></div>
                        <div class="category-item"><div class="left"><span class="dot" style="background:#8bc38d"></span>Stays</div><span class="count">0</span></div>
                        <div class="category-item"><div class="left"><span class="dot" style="background:#d3a064"></span>Travel</div><span class="count">0</span></div>
                        <div class="category-item"><div class="left"><span class="dot" style="background:#72c7c1"></span>Umrah</div><span class="count">3</span></div>
                        <div class="category-item"><div class="left"><span class="dot" style="background:#b99ed0"></span>Uncategorized</div><span class="count">0</span></div>
                    </div>
                </div>

            </aside>
        </div>
    </main>
    @include('partials.site-footer')
    <script src="{{ asset('js/home.js') }}" defer></script>
</body>
</html>
