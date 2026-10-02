<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#090909">
    <meta name="description" content="Ziyarat Al Arafat - Al Arafat is one of the first travel agencies to offer hajj and umrah tours with the main focus of creating affordable packages,">
    <title>Ziyarat Al Arafat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/ziyarat.css') }}">
</head>
<body>
    @include('partials.site-header', ['activePage' => 'ziyarat'])

    <main>
        <section class="ziyarat-hero" aria-label="Search Ziyarat and Umrah tours">
            <form class="booking-form ziyarat-booking" action="#ziyarat-packages">
                <label class="booking-field location-field"><span class="field-icon" aria-hidden="true">⌖</span><span class="field-copy"><span>Location</span><input name="location" placeholder="Where are you going?" aria-label="Destination"></span></label>
                <label class="booking-field"><span class="field-icon" aria-hidden="true">▦</span><span class="field-copy"><span>Date</span><input type="date" name="date" aria-label="Departure date"></span></label><span class="date-arrow" aria-hidden="true">→</span>
                <label class="booking-field"><span class="field-icon" aria-hidden="true">▦</span><span class="field-copy"><span>Check out</span><input type="date" name="return" aria-label="Return date"></span></label>
                <button class="search-button" type="submit">Search</button>
            </form>
        </section>

        <section class="hajj-packages content-width ziyarat-packages" id="ziyarat-packages">
            <div class="section-heading"><h1>Ziyarat Packages</h1></div>
            <div class="package-grid">
                @if($packages->isNotEmpty())
                    @foreach($packages as $package)
                        @include('partials.package-card', ['package' => $package])
                    @endforeach
                @else
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/mumbai-umrah-packages-2026/"><img src="https://alarafat.com/wp-content/uploads/2026/09/mumbai-umrah-2026-450x300.png" alt="Mumbai Umrah Packages 2026" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/mumbai-umrah-packages-2026/">Mumbai Umrah Packages 2026</a></h2><p class="rating"><span>★</span> 0 <small>(No Review)</small></p><div class="package-price"><span>From <strong>₹80,786</strong></span><span aria-hidden="true">◷</span></div></div></article>
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-silver/"><img src="https://alarafat.com/wp-content/uploads/2026/09/from-mumbai-2026-silver-450x300.png" alt="15 Days Umrah Package From Mumbai 2026 Silver" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-silver/">15 Days Umrah Package From Mumbai – 2026 (Silver)</a></h2><p class="rating"><span>★</span> 0 <small>(No Review)</small></p><div class="package-price"><span>From <strong>₹95,786</strong></span><span aria-hidden="true">◷</span></div></div></article>
                <article class="package-card"><a class="package-image" href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-bronze-plus/"><img src="https://alarafat.com/wp-content/uploads/2026/09/from-mumbai-2026-bronze-plus-450x300.png" alt="15 Days Umrah Package From Mumbai 2026 Bronze Plus" loading="lazy"><span class="favorite" aria-hidden="true">♡</span></a><div class="package-info"><h2><a href="https://alarafat.com/st-tour/15-days-umrah-package-from-mumbai-2026-bronze-plus/">15 Days Umrah Package From Mumbai – 2026 (Bronze Plus)</a></h2><p class="rating"><span>★</span> 0 <small>(No Review)</small></p><div class="package-price"><span>From <strong>₹88,786</strong></span><span aria-hidden="true">◷</span></div></div></article>
                @endif
            </div>
        </section>

        <article class="hajj-article content-width ziyarat-article">
            <header class="article-heading"><h2>Exploring the History and Cultural Significance of the Ziyarat</h2></header>
            <div class="article-opening">
                <p>Ziyarat is a sacred visit to religious sites and shrines. Ziyarat tour packages can help visitors explore places of spiritual importance, connect with Islamic history, and travel with guided tours, transportation, and accommodation arranged in advance.</p>
                <p>Across the Islamic tradition, these journeys have offered believers a way to reflect on their faith and learn about the people and events that shaped it. Each site carries its own history and significance.</p>
                <p>Guided visits can include important places in Makkah, Madinah, and other destinations. Knowledgeable guides help explain their history and meaning, while practical arrangements make it easier to focus on the journey.</p>
                <p>Ziyarat also has a social and cultural dimension. Families and travelers from different backgrounds come together to visit these places, share the experience, and deepen their understanding of the Islamic tradition.</p>
            </div>
            <section class="article-feature article-feature-image-first">
                <img src="https://alarafat.com/wp-content/uploads/2022/12/pexels-mutahir-jamil-11667462-1536x1536.jpg" alt="Pilgrims on a Ziyarat visit to a sacred mosque" loading="lazy">
                <div><h3>History and cultural significance of Ziyarat</h3><p>Ziyarat can include visits to sites connected with key figures and events in Islamic history. In Madinah, pilgrims visit the Prophet's Mosque and other places of deep religious importance.</p><p>These visits offer an opportunity to learn about the history of each place, reflect on its meaning, and remember the people whose lives shaped the Muslim community.</p><p>Traveling together can make the experience especially meaningful for families and fellow pilgrims.</p></div>
            </section>
            <section class="article-feature article-feature-image-last">
                <div><h3>Importance of exploring its history and cultural significance</h3><p>Learning about the sites before visiting can deepen the experience. Understanding their histories and traditions helps travelers approach each stop with care and appreciation.</p><p>A guided itinerary can connect individual visits into a richer picture of Islamic history. Local context also helps travelers better understand the customs and stories associated with each destination.</p><p>Thoughtful planning leaves more time to focus on the spiritual side of the journey.</p></div>
                <img src="https://alarafat.com/wp-content/uploads/2022/12/haidan-zY26j3pA65Y-unsplash-1024x1024.jpg" alt="Minarets and courtyard at a sacred mosque" loading="lazy">
            </section>
            <section class="article-feature article-feature-image-first ziyarat-last-feature">
                <img src="https://alarafat.com/wp-content/uploads/2022/12/pexels-mustafa-fathy-5620451-1-1536x1536.jpg" alt="Travelers visiting an illuminated mosque" loading="lazy">
                <div><h3>Choose Ziyarat Tour Packages as per your Preference</h3><p>Ziyarat tour packages make it easier to plan visits to important religious sites. Depending on the itinerary, they can include transport, accommodation, and guidance from experienced tour leaders.</p><p>Al Arafat Tours &amp; Travels helps travelers choose an itinerary that fits their time and preferences. Contact our team to ask about available tours and travel arrangements.</p><p>Join a Ziyarat tour and experience the history, beauty, and spiritual significance of these sacred places.</p></div>
            </section>
        </article>

        <section class="hajj-reviews ziyarat-reviews"><div class="content-width"><h2>What our clients say</h2><div class="review-strip"><div class="review-brand"><strong>AL-ARAFAT</strong><span>TOURS AND TRAVELS</span><b>★★★★★</b><small>33 Google reviews</small></div><article><strong>Shaikh Shifa</strong><small>1 year ago</small><b>★★★★★</b><p>Best umrah travel agency in Mumbai.</p></article><article><strong>Azim Khan</strong><small>1 year ago</small><b>★★★★★</b><p>Best service.</p></article><article><strong>Junaid Khan</strong><small>1 year ago</small><b>★★★★★</b><p>This user only left a rating.</p></article></div></div></section>
    </main>

    @include('partials.site-footer')
    <script src="{{ asset('js/hajj.js') }}" defer></script>
</body>
</html>
