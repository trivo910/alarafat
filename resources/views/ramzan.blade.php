<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#090909">
    <meta name="description" content="Umrah is a pilgrimage to Mecca, Saudi Arabia that is performed by Muslims. It is a lesser pilgrimage compared to the Hajj, but it is still considered a">
    <title>Ramzan Umrah From Mumbai - Al Arafat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/ramzan.css') }}">
    @include('components.schema')
</head>
<body>
    @include('partials.site-header', ['activePage' => 'ramzan'])

    <main>
        <section class="umrah-hero" aria-label="Search Ramzan Umrah packages from Mumbai">
            <form class="booking-form umrah-booking" action="#ramzan-packages">
                <label class="booking-field location-field"><span class="field-icon" aria-hidden="true">⌖</span><span class="field-copy"><span>Location</span><input name="location" placeholder="Where are you going?" aria-label="Destination"></span></label>
                <label class="booking-field"><span class="field-icon" aria-hidden="true">▦</span><span class="field-copy"><span>Date</span><input type="date" name="date" aria-label="Departure date"></span></label><span class="date-arrow" aria-hidden="true">→</span>
                <label class="booking-field"><span class="field-icon" aria-hidden="true">▦</span><span class="field-copy"><span>Check out</span><input type="date" name="return" aria-label="Return date"></span></label>
                <button class="search-button" type="submit">Search</button>
            </form>
        </section>

        <section class="hajj-packages content-width umrah-packages" id="ramzan-packages">
            <div class="section-heading"><h1>Ramzan Umrah Packages from Mumbai</h1></div>
            <div class="package-grid">
                @if($packages->isNotEmpty())
                    @foreach($packages as $package)
                        @include('partials.package-card', ['package' => $package])
                    @endforeach
                @else
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/mumbai-umrah-packages-2026/"><img src="https://alarafat.com/wp-content/uploads/2026/09/mumbai-umrah-2026-450x300.png" alt="Mumbai Umrah Packages 2026" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/mumbai-umrah-packages-2026/">Mumbai Umrah Packages 2026</a></h2><p class="rating"><span>★</span> 0 <small>(No Review)</small></p><div class="package-price"><span>From <strong>₹80,786</strong></span><span aria-hidden="true">◷</span></div></div></article>
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-silver/"><img src="https://alarafat.com/wp-content/uploads/2026/09/from-mumbai-2026-silver-450x300.png" alt="15 Days Umrah Package From Mumbai Silver" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-silver/">15 Days Umrah Package From Mumbai – 2026 (Silver)</a></h2><p class="rating"><span>★</span> 0 <small>(No Review)</small></p><div class="package-price"><span>From <strong>₹95,786</strong></span><span aria-hidden="true">◷</span></div></div></article>
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-gold/"><img src="https://alarafat.com/wp-content/uploads/2022/12/umrah-package-from-mumbai-2026-gold-450x300.png" alt="15 Days Umrah Package From Mumbai Gold" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-gold/">15 Days Umrah Package From Mumbai – 2026 (Gold)</a></h2><p class="rating"><span>★</span> 5 <small>(3 Reviews)</small></p><div class="package-price"><span>From <strong>₹108,786</strong></span><span aria-hidden="true">◷</span></div></div></article>
                @endif
            </div>
        </section>

        <article class="hajj-article content-width umrah-guide">
            <header class="article-heading"><h2>The Spiritual and Physical Benefits of Umrah</h2></header>
            <div class="article-opening">
                <p>Umrah is a pilgrimage to Mecca, Saudi Arabia that is performed by Muslims. It is a lesser pilgrimage compared to the Hajj, but it is still considered a significant and spiritual journey for those who undertake it. And you can choose low price umrah packages according to your convenience with us.</p>
                <p>Experience the spiritual fulfillment of performing umrah in Ramadan. Join the millions of pilgrims making their way to Mecca, and be part of the sacred rituals of this holy month. Perform the ritual circumambulation of the Kaaba, pray at the Masjid-al-Haram, and seek forgiveness in the Holy City.</p>
                <p>The spiritual benefits of Umrah include:</p>
                <p>Forgiveness of sins — The pilgrimage is a time for Muslims to reflect on their actions and seek forgiveness for any wrongdoings. The rituals of Umrah are believed to wash away the sins of the pilgrim, providing a fresh start and a clean slate.</p>
                <p>Spiritual purification — The pilgrimage is a time for spiritual renewal and growth. The pilgrim is expected to focus on their relationship with Allah and strive to improve their character and behavior.</p>
                <p>Increased devotion and faith — The pilgrimage is a reminder of the oneness of Allah and the importance of submission to His will. The pilgrim is expected to strengthen their devotion and faith through the rituals and experiences of Umrah.</p>
                <p>The physical benefits of Umrah include:</p>
                <p>Exercise and physical activity — The pilgrimage involves a lot of walking and physical exertion, which can be beneficial for overall health and fitness.</p>
                <p>Improved health and well-being — The pilgrimage can be a time for rest and relaxation, allowing the pilgrim to disconnect from their daily routine and take care of their physical and mental health.</p>
                <p>Increased energy and vitality — The pilgrimage can be a time for spiritual renewal and rejuvenation, which can lead to increased energy and vitality.</p>
            </div>
        </article>

        <section class="hajj-reviews umrah-reviews">
            <div class="content-width">
                <h2>What our clients say</h2>
                <div class="review-strip">
                    <div class="review-brand">
                        <strong>AL-Arafat Tours And Travels</strong>
                        <span>33 Google reviews</span>
                        <b>★★★★★</b>
                    </div>
                    <article>
                        <strong>Hashim Khan</strong>
                        <small>1 year ago</small>
                        <b>★★★★★</b>
                        <p>This user only left a rating.</p>
                    </article>
                    <article>
                        <strong>Ayaz Qureshi</strong>
                        <small>1 year ago</small>
                        <b>★★★★★</b>
                        <p>This user only left a rating.</p>
                    </article>
                    <article>
                        <strong>Ashraf Khan</strong>
                        <small>1 year ago</small>
                        <b>★★★★★</b>
                        <p>This user only left a rating.</p>
                    </article>
                </div>
            </div>
        </section>
    </main>

    @include('partials.site-footer')
    <script src="{{ asset('js/hajj.js') }}" defer></script>
</body>
</html>
