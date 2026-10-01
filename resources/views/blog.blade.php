<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#090909">
    <meta name="description" content="Al Arafat blog featuring affordable Umrah packages and travel guides.">
    <title>Blog | Al Arafat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/blog.css') }}">
</head>
<body>
    <div class="contact-strip">
        <div class="contact-inner">
            <div class="contact-links"><a href="tel:+919867851046"><span aria-hidden="true">☎</span> +91 98678 51046</a><a href="mailto:umrah@alarafat.com"><span aria-hidden="true">✉</span> umrah@alarafat.com</a></div>
            <div class="social-links" aria-label="Social media"><a href="https://www.facebook.com/people/al-arafat/100085602021408/" aria-label="Facebook">f</a><a href="https://twitter.com/alarafatmumbai/" aria-label="Twitter">𝕏</a><a href="https://www.instagram.com/alarafat_official/" aria-label="Instagram">◎</a><a href="https://www.linkedin.com/company/al-arafat-com/" aria-label="LinkedIn">in</a></div>
        </div>
    </div>
    <header class="site-header">
        <a class="brand" href="/" aria-label="Al Arafat Tours & Travels home"><img src="https://alarafat.com/wp-content/uploads/2022/04/Al-arafat-Logo-355-x-71.png" alt="Al Arafat Tours & Travels"></a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="Open navigation"><span></span><span></span><span></span></button>
        <nav class="primary-nav" id="primary-navigation" aria-label="Main navigation">
            <a href="/">Home</a><a href="/hajj">Hajj</a>
            <div class="nav-dropdown"><button class="nav-dropdown-trigger" type="button" aria-expanded="false" aria-controls="umrah-submenu">Umrah</button><div class="nav-submenu" id="umrah-submenu"><a href="/umrah-package-from-mumbai">Umrah Package From Mumbai</a><a href="/ramzan-umrah-package-from-mumbai">Ramzan Umrah From Mumbai</a></div></div>
            <a href="/ziyarat">Ziyarat</a><a class="active" href="/blog">Blog</a><a href="/about">About</a><a href="/contact">Contact</a>
        </nav>
        <div class="header-tools"><span>INR</span><a class="account-button" href="mailto:umrah@alarafat.com" aria-label="Contact Al Arafat">♙</a></div>
    </header>

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
    <footer class="site-footer" id="contact">
        <div class="footer-main content-width">
            <div class="footer-about"><a href="/"><img src="https://alarafat.com/wp-content/uploads/2022/09/Al-arafat-Logo-300-x-60.png" alt="Al Arafat Tours & Travels" loading="lazy"></a><p>A long standing and successful travel company which has always strived to provide its customers with the best of travel experiences.</p></div>
            <div class="footer-column"><h2>Company</h2><a href="/umrah-package-from-mumbai">⊙ &nbsp; Package</a><a href="/blog">⊙ &nbsp; Blog</a><a href="https://alarafat.com/faq/">⊙ &nbsp; FAQ</a><a href="https://alarafat.com/privacy-policy/">⊙ &nbsp; Privacy Policy</a><a href="https://alarafat.com/terms-conditions/">⊙ &nbsp; Terms &amp; Conditions</a><a href="/contact">⊙ &nbsp; Contact</a></div>
            <div class="footer-column"><h2>Need help?</h2><p>Call Us</p><a class="footer-contact" href="tel:+919867851046">+91 98678 51046</a><p>Email for Us</p><a class="footer-contact" href="mailto:umrah@alarafat.com">umrah@alarafat.com</a><p>Follow Us</p><div class="footer-social"><a href="https://www.facebook.com/people/al-arafat/100085602021408/" aria-label="Facebook">f</a><a href="https://twitter.com/alarafatmumbai/" aria-label="Twitter">𝕏</a><a href="https://www.instagram.com/alarafat_official/" aria-label="Instagram">◎</a></div></div>
            <div class="footer-column office-column"><h2>Our Offices</h2><p>Ground floor-154, No. 01, 1229, Motilal Nagar No. 1, near Sai Baba Mandir, Prarthana Society, Motilal Nagar I, Goregaon West, Mumbai, Maharashtra 400104</p></div>
        </div>
        <div class="footer-bottom">© Al Arafat. ALL RIGHT RESERVED 2021-22 · DESIGNED &amp; MARKETED BY <strong>trivo.</strong></div>
    </footer>
    <script src="{{ asset('js/home.js') }}" defer></script>
</body>
</html>
