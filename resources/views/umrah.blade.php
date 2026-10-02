<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#090909">
    <meta name="description" content="Discover the best Umrah package from Mumbai with comfort, affordable prices, and top-notch services for a peaceful and spiritual journey. Book your pilgrimage today!">
    <title>Best Umrah Package from Mumbai | Al-arafat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/umrah.css') }}">
</head>
<body>
    @include('partials.site-header', ['activePage' => 'umrah'])

    <main>
        <section class="umrah-hero" aria-label="Search Umrah packages from Mumbai">
            <form class="booking-form umrah-booking" action="#umrah-packages">
                <label class="booking-field location-field"><span class="field-icon" aria-hidden="true">⌖</span><span class="field-copy"><span>Location</span><input name="location" placeholder="Where are you going?" aria-label="Destination"></span></label>
                <label class="booking-field"><span class="field-icon" aria-hidden="true">▦</span><span class="field-copy"><span>Date</span><input type="date" name="date" aria-label="Departure date"></span></label><span class="date-arrow" aria-hidden="true">→</span>
                <label class="booking-field"><span class="field-icon" aria-hidden="true">▦</span><span class="field-copy"><span>Check out</span><input type="date" name="return" aria-label="Return date"></span></label>
                <button class="search-button" type="submit">Search</button>
            </form>
        </section>

        <section class="hajj-packages content-width umrah-packages" id="umrah-packages">
            <div class="section-heading"><h1>Umrah Packages from Mumbai</h1></div>
            <div class="package-grid">
                @if($packages->isNotEmpty())
                    @foreach($packages as $package)
                        @include('partials.package-card', ['package' => $package])
                    @endforeach
                @else
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/mumbai-umrah-packages-2026/"><img src="https://alarafat.com/wp-content/uploads/2026/09/mumbai-umrah-2026-450x300.png" alt="Mumbai Umrah Packages 2026" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/mumbai-umrah-packages-2026/">Mumbai Umrah Packages 2026</a></h2><p class="rating"><span>★</span> 0 <small>(No Review)</small></p><div class="package-price"><span>From <strong>₹80,786</strong></span><span aria-hidden="true">◷</span></div></div></article>
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-silver/"><img src="https://alarafat.com/wp-content/uploads/2026/09/from-mumbai-2026-silver-450x300.png" alt="15 Days Umrah Package From Mumbai Silver" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-silver/">15 Days Umrah Package From Mumbai – 2026 (Silver)</a></h2><p class="rating"><span>★</span> 0 <small>(No Review)</small></p><div class="package-price"><span>From <strong>₹95,786</strong></span><span aria-hidden="true">◷</span></div></div></article>
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-bronze-plus/"><img src="https://alarafat.com/wp-content/uploads/2026/09/from-mumbai-2026-bronze-plus-450x300.png" alt="15 Days Umrah Package From Mumbai Bronze Plus" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-bronze-plus/">15 Days Umrah Package From Mumbai – 2026 (Bronze Plus)</a></h2><p class="rating"><span>★</span> 0 <small>(No Review)</small></p><div class="package-price"><span>From <strong>₹88,786</strong></span><span aria-hidden="true">◷</span></div></div></article>
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-bronze/"><img src="https://alarafat.com/wp-content/uploads/2026/09/15-days-umrah-package-bronze-450x300.png" alt="15 Days Umrah Package From Mumbai Bronze" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-bronze/">15 Days Umrah Package From Mumbai – 2026 (Bronze)</a></h2><p class="rating"><span>★</span> 0 <small>(No Review)</small></p><div class="package-price"><span>From <strong>₹88,786</strong></span><span aria-hidden="true">◷</span></div></div></article>
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-saver/"><img src="https://alarafat.com/wp-content/uploads/2025/01/15-days-umrah-package-450x300.png" alt="15 Days Umrah Package From Mumbai Saver" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-saver/">15 Days Umrah Package From Mumbai – 2026 (Saver)</a></h2><p class="rating"><span>★</span> 5 <small>(3 Reviews)</small></p><div class="package-price"><span>From <strong>₹80,786</strong></span><span aria-hidden="true">◷</span></div></div></article>
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-gold/"><img src="https://alarafat.com/wp-content/uploads/2022/12/umrah-package-from-mumbai-2026-gold-450x300.png" alt="15 Days Umrah Package From Mumbai Gold" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-gold/">15 Days Umrah Package From Mumbai – 2026 (Gold)</a></h2><p class="rating"><span>★</span> 5 <small>(3 Reviews)</small></p><div class="package-price"><span>From <strong>₹108,786</strong></span><span aria-hidden="true">◷</span></div></div></article>
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-gold-plus/"><img src="https://alarafat.com/wp-content/uploads/2022/12/package-from-mumbai-gold-plus-450x300.png" alt="15 Days Umrah Package From Mumbai Gold Plus" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-gold-plus/">15 Days Umrah Package From Mumbai – 2026 (Gold Plus)</a></h2><p class="rating"><span>★</span> 5 <small>(5 Reviews)</small></p><div class="package-price"><span>From <strong>₹127,786</strong></span><span>14 Nights</span></div></div></article>
                @endif
            </div>
        </section>

        <article class="hajj-article content-width umrah-guide">
            <header class="article-heading"><h2>The Spiritual and Physical Benefits of Performing Umrah</h2></header>
            <div class="article-opening">
                <p>Are you looking to perform the sacred journey of Umrah at an affordable price? Explore the low-price Umrah packages offered by Al Arafat.</p>
                <p>For those planning a sacred journey from India, choosing the right Umrah package from Mumbai can make all the difference. Our packages balance cost, comfort, and ease of travel, with options that can include flights, visa processing, hotels, and ground transportation. This allows pilgrims to focus on their spiritual journey.</p>
                <p>Packages are available across different comfort levels, so travelers can find an option suited to their budget and preferences. Carefully planned arrangements help make the pilgrimage more satisfying and less stressful.</p>
                <p>Our packages include practical details such as accommodation close to the Haram, guided Ziyarat tours, and meal plans. Choose from available arrangements to find the support that suits your journey.</p>
            </div>
            <section class="umrah-guide-section">
                <h3>Why Choose Umrah Packages from Mumbai?</h3>
                <p>Mumbai is a convenient place to begin a pilgrimage to Saudi Arabia, with direct flight options and experienced travel companies. Choosing a trusted Umrah package can bring visa processing, flights, lodging, transport, and guided Ziyarat together in one arrangement.</p>
                <p>Having these details coordinated can save time and effort, letting travelers focus on their spiritual experience.</p>
            </section>
            <section class="article-feature article-feature-image-first umrah-feature">
                <img src="https://alarafat.com/wp-content/uploads/2022/12/ibrahim-uz-3Z3RvzpVAqM-unsplash-768x512.jpg" alt="Pilgrims performing Tawaf around the Kaaba" loading="lazy">
                <div><h3>The rituals of the Umrah pilgrimage</h3><ul class="ritual-list"><li><strong>Entering ihram</strong> — wearing simple clothing and making the intention for pilgrimage.</li><li><strong>Performing Tawaf</strong> — circling the Kaaba seven times in a counterclockwise direction.</li><li><strong>Completing Sa'i</strong> — walking between the hills of Safa and Marwah seven times.</li><li><strong>Trimming or shaving the hair</strong> — marking the completion of the Umrah rites.</li></ul></div>
            </section>
            <section class="article-feature article-feature-image-last umrah-feature">
                <div><h3>The cost of the Umrah pilgrimage</h3><p>The cost of Umrah varies depending on the package and travel provider. It can include airfare, accommodation, transportation, and meals.</p><p>Prices depend on the length of the trip and the level of service. Compare what is included and choose an option that suits your preferences and budget.</p><p>Many packages offer flexible options for duration and accommodation, helping pilgrims plan a journey that meets their needs.</p></div>
                <img src="https://alarafat.com/wp-content/uploads/2022/12/243-2435986_hajj-mecca-1-1024x1024.jpg" alt="A pilgrim at the Grand Mosque in Makkah" loading="lazy">
            </section>
            <section class="article-feature article-feature-image-first umrah-feature">
                <img src="https://alarafat.com/wp-content/uploads/2022/12/ziyarah_al_masjid_6f21f1147b-1536x1536.jpg" alt="Pilgrims visiting Al-Masjid an-Nabawi" loading="lazy">
                <div><h3>The significance of the Umrah pilgrimage</h3><p>Umrah is an opportunity to connect with Allah, reflect, and set aside the stresses of everyday life. Pilgrims can focus on worship and draw closer to their faith.</p><p>For many, the journey brings meaningful spiritual benefits. Well-planned, affordable packages can make this important experience accessible to more travelers.</p></div>
            </section>
            <section class="umrah-faq"><h2>Frequently Asked Questions</h2>
                <details><summary>Q1. Where can I find a reliable trusted guide?</summary><p>Book with a travel agency experienced in Umrah and ask about the guide, itinerary, and support included in your package.</p></details>
                <details><summary>Q2. Are luxury Umrah trips affordable from India?</summary><p>Costs vary by travel dates, hotels, and services. Compare package inclusions to find an option that fits your budget.</p></details>
                <details><summary>Q3. Can I book in advance with some amount?</summary><p>Advance booking and payment terms vary by package. Contact Al Arafat to confirm current availability and terms.</p></details>
                <details><summary>Q4. Can I book 10 days before the Umrah tour date?</summary><p>Late bookings depend on flight, visa, and accommodation availability. Contact the team as early as possible to check options.</p></details>
            </section>
        </article>

        <section class="hajj-reviews umrah-reviews"><div class="content-width"><h2>What our clients say</h2><div class="review-strip"><div class="review-brand"><strong>AL-ARAFAT</strong><span>TOURS AND TRAVELS</span><b>★★★★★</b><small>33 Google reviews</small></div><article><strong>Hashim Khan</strong><small>1 year ago</small><b>★★★★★</b><p>This user only left a rating.</p></article><article><strong>Ayaz Qureshi</strong><small>1 year ago</small><b>★★★★★</b><p>This user only left a rating.</p></article><article><strong>Ashraf Khan</strong><small>1 year ago</small><b>★★★★★</b><p>This user only left a rating.</p></article></div></div></section>
    </main>

    @include('partials.site-footer')
    <script src="{{ asset('js/hajj.js') }}" defer></script>
</body>
</html>
