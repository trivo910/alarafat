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
    @include('components.schema')
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
                        @foreach($popularBlogs as $popularBlog)
                            <a class="popular-item" href="{{ route('blog.show', $popularBlog->slug) }}">
                                @if($popularBlog->featured_image)
                                    <img src="{{ $popularBlog->featured_image_url }}" alt="{{ $popularBlog->image_alt_text ?: $popularBlog->title }}">
                                @else
                                    <span class="popular-placeholder" aria-hidden="true"></span>
                                @endif
                                <div>
                                    <strong>{{ $popularBlog->title }}</strong>
                                    <span>{{ optional($popularBlog->published_at)->format('F j, Y') ?: 'Recently' }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </main>
    @include('partials.site-footer')
    <script src="{{ asset('js/home.js') }}" defer></script>
</body>
</html>
