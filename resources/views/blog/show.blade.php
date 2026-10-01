<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $blog->meta_title ?: $blog->title }}</title>
    <meta name="description" content="{{ $blog->meta_description ?: strip_tags(Str::limit($blog->content, 160)) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/blog-show.css') }}">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="/" aria-label="Al Arafat Tours & Travels home">
            <img src="https://alarafat.com/wp-content/uploads/2022/04/Al-arafat-Logo-355-x-71.png" alt="Al Arafat Tours & Travels">
        </a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="Open navigation"><span></span><span></span><span></span></button>
        <nav class="primary-nav" id="primary-navigation" aria-label="Main navigation">
            <a href="/">Home</a>
            <a href="/hajj">Haj</a>
            <div class="nav-dropdown">
                <button class="nav-dropdown-trigger" type="button" aria-expanded="false" aria-controls="umrah-submenu">Umrah</button>
                <div class="nav-submenu" id="umrah-submenu">
                    <a href="/umrah-package-from-mumbai">Umrah Package From Mumbai</a>
                    <a href="/ramzan-umrah-package-from-mumbai">Ramzan Umrah From Mumbai</a>
                </div>
            </div>
            <a href="/ziyarat">Ziyarat</a>
            <a href="/blog">Blog</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>
        <div class="header-tools"><span>INR</span><a class="account-button" href="mailto:umrah@alarafat.com" aria-label="Contact Al Arafat">♙</a></div>
    </header>

    <main class="blog-page">
        @if($blog->featured_image)
            <section class="blog-hero">
                <div class="blog-thumb">
                    <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->image_alt_text ?: $blog->title }}">
                </div>
            </section>
        @endif

        <section class="blog-content">
            <article class="article">
                <p class="eyebrow">Blog</p>
                <h1>{{ $blog->title }}</h1>
                <div class="meta">By Al Arafat Tours &amp; Travels | {{ $blog->published_at ? $blog->published_at->format('F j, Y') : 'Recently' }}</div>
                <div class="blog-copy">{!! \App\Support\BlogContentSanitizer::sanitize($blog->content) !!}</div>

                <div class="article-social" aria-label="Follow Al Arafat on social media">
                    <a href="https://www.facebook.com/people/al-arafat/100085602021408/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.4 21v-8.2h2.8l.4-3.2h-3.2V7.5c0-.9.3-1.6 1.6-1.6h1.7V3.1c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2.3H7.2v3.2H10V21h3.4Z" fill="currentColor"/></svg>
                    </a>
                    <a href="https://www.instagram.com/alarafat_official/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="3.5" width="17" height="17" rx="5" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="17.7" cy="6.5" r="1.2" fill="currentColor"/></svg>
                    </a>
                    <a href="https://x.com/alarafatmumbai" target="_blank" rel="noopener noreferrer" aria-label="X">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18.9 2H22l-6.8 7.8L23.2 22h-6.3L12 14.7 5.6 22H2.4l7.3-8.4L1.9 2h6.5l4.5 6.7L18.9 2Zm-1.1 18h1.7L7.3 3.9H5.5L17.8 20Z" fill="currentColor"/></svg>
                    </a>
                </div>
            </article>

            <aside class="sidebar">
                <h3>Latest Posts</h3>
                @forelse($latestBlogs as $latestBlog)
                    <div class="card">
                        <a href="{{ route('blog.show', $latestBlog->slug) }}">{{ $latestBlog->title }}</a>
                        <div class="meta">{{ optional($latestBlog->published_at)->format('F j, Y') ?: 'Recently' }}</div>
                    </div>
                @empty
                    <div class="card"><a href="/blog">Browse all blog posts</a></div>
                @endforelse

                <h3>Popular Posts</h3>
                <div class="card"><a href="/blog">Browse all blog posts</a></div>
                <div class="card"><a href="/umrah-package-from-mumbai">Umrah Package From Mumbai</a></div>
                <div class="card"><a href="/hajj">Hajj Packages</a></div>
                <div class="card"><a href="/ziyarat">Ziyarat Tours</a></div>
            </aside>
        </section>
    </main>

    <footer class="site-footer" id="contact">
        <div class="footer-main content-width">
            <div class="footer-about"><a href="/"><img src="https://alarafat.com/wp-content/uploads/2022/09/Al-arafat-Logo-300-x-60.png" alt="Al Arafat Tours & Travels" loading="lazy"></a><p>A long standing and successful travel company which has always strived to provide its customers with the best of travel experiences.</p></div>
            <div class="footer-column"><h2>Company</h2><a href="/">⊙ &nbsp; Home</a><a href="/blog">⊙ &nbsp; Blog</a><a href="/about">⊙ &nbsp; About</a><a href="/contact">⊙ &nbsp; Contact</a><a href="/hajj">⊙ &nbsp; Hajj</a><a href="/ziyarat">⊙ &nbsp; Ziyarat</a></div>
            <div class="footer-column"><h2>Need help?</h2><p>Call Us</p><a class="footer-contact" href="tel:+919867851046">+91 98678 51046</a><p>Email for Us</p><a class="footer-contact" href="mailto:umrah@alarafat.com">umrah@alarafat.com</a></div>
            <div class="footer-column office-column"><h2>Our Offices</h2><p>Ground floor-154, No. 01, 1229, Motilal Nagar No. 1, near Sai Baba Mandir, Prarthana Society, Motilal Nagar I, Goregaon West, Mumbai, Maharashtra 400104</p></div>
        </div>
        <div class="footer-bottom">© Al Arafat. ALL RIGHT RESERVED 2021-22 · DESIGNED &amp; MARKETED BY <strong>trivo.</strong></div>
    </footer>
    <script src="{{ asset('js/home.js') }}" defer></script>
</body>
</html>
