<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=20261007">
    <meta name="theme-color" content="#090909">
    <meta name="description" content="Book your Umrah Package from Mumbai with Al Arafat Haj &amp; Umrah Tours. Affordable prices, expert guidance, and comfortable travel arrangements for a hassle-free spiritual journey.">
    <title>Umrah Package From Mumbai | Al Arafat Haj &amp; Umrah Tours</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css?v=0') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/home.css?v=0') }}">
    @include('components.schema')
</head>
<body>
    @include('partials.site-header', ['activePage' => 'home'])

    <main id="top">
        <section class="hero" aria-label="Featured pilgrimage packages">
            <div class="hero-track">
                <a class="hero-slide is-active" href="#packages" aria-label="Explore Umrah packages"><img src="https://alarafat.com/wp-content/uploads/2025/08/1600-X-474-1.jpg" alt="Hajj and Umrah journey from Al Arafat"></a>
                <a class="hero-slide" href="#packages" aria-label="Explore our travel packages"><img src="https://alarafat.com/wp-content/uploads/2022/08/web-banner-1.jpg" alt="Al Arafat pilgrimage travel banner" loading="lazy"></a>
                <a class="hero-slide" href="#packages" aria-label="Book your next journey"><img src="https://alarafat.com/wp-content/uploads/2025/10/web-banner-2.jpg" alt="Al Arafat Hajj and Umrah offers" loading="lazy"></a>
            </div>
            <button class="hero-arrow hero-previous" type="button" aria-label="Previous slide">‹</button>
            <button class="hero-arrow hero-next" type="button" aria-label="Next slide">›</button>
            <div class="hero-dots" aria-label="Choose a banner"></div>
        </section>

        <section class="booking-wrap" aria-label="Search travel packages">
            <form class="booking-form" action="#packages">
                <label class="booking-field location-field"><span class="field-icon" aria-hidden="true">⌖</span><span class="field-copy"><span>Location</span><input name="location" placeholder="Where are you going?" aria-label="Destination"></span></label>
                <label class="booking-field"><span class="field-icon" aria-hidden="true">▦</span><span class="field-copy"><span>Date</span><input type="date" name="date" aria-label="Departure date"></span></label>
                <span class="date-arrow" aria-hidden="true">→</span>
                <label class="booking-field"><span class="field-icon" aria-hidden="true">▦</span><span class="field-copy"><span>Check out</span><input type="date" name="return" aria-label="Return date"></span></label>
                <button class="search-button" type="submit">Search</button>
            </form>
        </section>

        <section class="intro content-width" id="about">
            <div class="intro-gallery">
                <img class="intro-image intro-image-tall" src="https://alarafat.com/wp-content/uploads/2025/07/28.png" alt="Makkah clock tower" loading="lazy">
                <img class="intro-image intro-image-short" src="https://alarafat.com/wp-content/uploads/2025/07/29.png" alt="A minaret in Makkah" loading="lazy">
            </div>
            <div class="intro-copy">
                <!-- <p class="eyebrow">A journey guided by care</p> -->
                <h1>Welcome to Al Arafat Tours &amp; Travels</h1>
                <p><strong>Al Arafat Tours &amp; Travels</strong> — your devoted partner in fulfilling the sacred call to Hajj and Umrah. With deep respect for the spiritual significance of your pilgrimage, we ensure a journey rooted in comfort, trust, and devotion. At Al Arafat, we handle every detail with dedication and care, allowing you to concentrate fully on your worship. Let us accompany you on this blessed path to Makkah and Madinah, where faith meets fulfillment.</p>
            </div>
        </section>

        <section class="packages-section content-width" id="packages">
            <div class="section-heading"><h2>Best Umrah &amp; Hajj Packages From Mumbai</h2></div>
            <div class="package-grid">
                @forelse($trendingPackages as $package)
                    <article class="package-card">
                        <a class="package-image" href="{{ route('packages.show', $package->slug) }}">
                            @if($package->featured_image_url)
                                <img src="{{ $package->featured_image_url }}" alt="{{ $package->image_alt_text ?: $package->title }}" loading="lazy">
                            @else
                                <span class="package-image-placeholder">{{ implode(', ', $package->categories ?: [$package->category]) }} Package</span>
                            @endif
                        </a>
                        <div class="package-info">
                            <h3><a href="{{ route('packages.show', $package->slug) }}">{{ $package->title }}</a></h3>
                            <p class="rating"><span>★</span> 0 <small>(No Review)</small></p>
                            <div class="package-price">
                                <span>{{ $package->price !== null ? 'From' : 'Contact for price' }} @if($package->price !== null)<strong>₹{{ number_format((float) $package->price) }}</strong>@endif</span>
                                <span aria-hidden="true">◷</span>
                            </div>
                        </div>
                    </article>
                @empty
                <article class="package-card">
                    <a class="package-image" href="https://alarafat.com/st-tour/mumbai-umrah-packages-2026/"><img src="https://alarafat.com/wp-content/uploads/2026/09/mumbai-umrah-2026-450x300.png" alt="Mumbai Umrah Packages 2026" loading="lazy"></a>
                    <div class="package-info"><h3><a href="https://alarafat.com/st-tour/mumbai-umrah-packages-2026/">Mumbai Umrah Packages 2026</a></h3><p class="rating"><span>★</span> 0 <small>(No Review)</small></p><div class="package-price"><span>From <strong>₹80,786</strong></span><span aria-hidden="true">◷</span></div></div>
                </article>
                <article class="package-card">
                    <a class="package-image" href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-silver/"><img src="https://alarafat.com/wp-content/uploads/2026/09/from-mumbai-2026-silver-450x300.png" alt="15 Days Umrah Package from Mumbai Silver" loading="lazy"></a>
                    <div class="package-info"><h3><a href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-silver/">15 Days Umrah Package From Mumbai – 2026 (Silver)</a></h3><p class="rating"><span>★</span> 0 <small>(No Review)</small></p><div class="package-price"><span>From <strong>₹95,786</strong></span><span aria-hidden="true">◷</span></div></div>
                </article>
                <article class="package-card">
                    <a class="package-image" href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-bronze-plus/"><img src="https://alarafat.com/wp-content/uploads/2026/09/from-mumbai-2026-bronze-plus-450x300.png" alt="15 Days Umrah Package from Mumbai Bronze Plus" loading="lazy"></a>
                    <div class="package-info"><h3><a href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-bronze-plus/">15 Days Umrah Package From Mumbai – 2026 (Bronze Plus)</a></h3><p class="rating"><span>★</span> 0 <small>(No Review)</small></p><div class="package-price"><span>From <strong>₹88,786</strong></span><span aria-hidden="true">◷</span></div></div>
                </article>
                @endforelse
            </div>
        </section>

        <section class="commitments content-width" id="commitments">
            <div class="section-heading"><h2>Our Commitments</h2></div>
            <div class="commitment-grid">
                <article class="commitment"><span class="commitment-icon" aria-hidden="true">₹</span><h3>No Hidden Costs</h3><p>Every package comes with a promise that you won't have to pay anything extra.</p></article>
                <article class="commitment"><span class="commitment-icon" aria-hidden="true">☆</span><h3>Best Price Guarantee</h3><p>We make sure that our packages are beyond compare in the market.</p></article>
                <article class="commitment"><span class="commitment-icon" aria-hidden="true">♧</span><h3>Complete Support</h3><p>Complete guidance is provided to clients from planning to coming back.</p></article>
                <article class="commitment"><span class="commitment-icon" aria-hidden="true">☺</span><h3>Freedom To Choose</h3><p>We help our clients choose and design their Umrah package.</p></article>
            </div>
        </section>

        <section class="newsletter content-width">
            <div class="newsletter-art" role="img" aria-label="A pilgrim at the holy mosque"></div>
            <form class="newsletter-panel">
                <h2>Get special offers, and more from Al Arafat</h2>
                <!-- <p>Subscribe to see secret deals prices drop the moment you sign up!</p>
                <div class="newsletter-input"><label class="visually-hidden" for="newsletter-email">Email address</label><input id="newsletter-email" type="email" placeholder="Your email address" required><button type="submit" aria-label="Subscribe">→</button></div>
                <p class="form-message" aria-live="polite"></p> -->
            </form>
        </section>

        <section class="testimonials" id="testimonials">
            <div class="content-width testimonial-inner"><p class="eyebrow">Testimonials</p><h2>Take a Look Our Haji Says</h2>
                <div class="testimonial-grid">
                    <article class="testimonial-card"><p>We traveled as a family, including seniors, and the team went above and beyond to support us. A five-star experience!</p><div class="reviewer"><span class="reviewer-avatar">SK</span><span><strong>Sadia Khan</strong><small>Mumbai</small></span></div></article>
                    <article class="testimonial-card"><p>From visa to Ziyarah, everything was perfectly organized. I was able to focus on ibadah completely. Highly recommended!</p><div class="reviewer"><span class="reviewer-avatar">AS</span><span><strong>Areeba Sheikh</strong><small>Hyderabad</small></span></div></article>
                    <article class="testimonial-card"><p>Professional, caring, and spiritually uplifting. Al-Arafat Tours turned our Umrah into an unforgettable journey.</p><div class="reviewer"><span class="reviewer-avatar">MF</span><span><strong>Mohammad Faheem</strong><small>Delhi</small></span></div></article>
                </div>
            </div>
        </section>

        <section class="partners" aria-label="Travel and pilgrimage partners"><div class="partner-track">
            <img src="https://alarafat.com/wp-content/uploads/2022/09/Final-Ministry-of-Hajj.jpg" alt="Ministry of Hajj" loading="lazy">
            <img src="https://alarafat.com/wp-content/uploads/2022/09/Final-Ministry-of-Minority.jpg" alt="Ministry of Minority Affairs" loading="lazy">
            <img src="https://alarafat.com/wp-content/uploads/2022/09/Maqam-Final-1.jpg" alt="Maqam" loading="lazy">
            <img src="https://alarafat.com/wp-content/uploads/2022/09/Vision-2030.jpg" alt="Saudi Vision 2030" loading="lazy">
            <img src="https://alarafat.com/wp-content/uploads/2022/09/AIHUTOA.jpg" alt="AIHUTOA" loading="lazy">
        </div></section>
    </main>

    @include('partials.site-footer')
    <script src="{{ asset('js/home.js') }}" defer></script>
</body>
</html>
