<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#090909">
    <meta name="description" content="About Al Arafat - Al Arafat is one of the first travel agencies to offer hajj and umrah tours with the main focus of creating affordable packages,">
    <title>About Al Arafat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/about.css') }}">
</head>
<body>
    @include('partials.site-header', ['activePage' => 'about'])

    <main class="about-page">
        <div class="about-banner content-width"><img src="https://alarafat.com/wp-content/uploads/2025/11/About-Us-banner-2-1.jpg" alt="About Al Arafat Tours and Travels"></div>
        <section class="about-introduction content-width">
            <h1>About Al Arafat</h1>
            <div class="about-copy">
                <p>Al Arafat Hajj and Umrah Packages Agency is one of the first travel agencies to offer Hajj and Umrah tours, with a focus on creating affordable packages for youth and elderly travelers. We continue to update and improve our Hajj and Umrah packages each year, designing them to serve pilgrims nationwide with comfort and a range of budgets. We are certified by the Saudi Ministry of Hajj and the ARC, and registered under the Government of India.</p>
                <p>About Al Arafat Travel is a full-service travel agency providing both leisure and corporate travel services. We are a team of travel professionals who are passionate about travel and committed to providing the best possible travel experience for our clients.</p>
                <p>We offer a wide range of travel services, from airline ticketing and hotel reservations to tour packages and travel insurance. We also offer corporate travel services, from business travel management to event planning and coordination.</p>
            </div>
        </section>

        <section class="about-promise content-width">
            <img class="about-collage" src="https://alarafat.com/wp-content/uploads/2025/07/WhatsApp-Image-2025-07-04-at-15.34.51_8335353c.jpg" alt="Sacred places visited by Al Arafat pilgrims" loading="lazy">
            <div class="promise-copy">
                <h2>A Sacred Journey, A Promise Fulfilled</h2>
                <p>Hajj and Umrah are not merely trips — they are divine invitations from the House of Allah, answered by souls yearning for mercy, transformation, and nearness to their Creator. At <strong>Al Arafat Tours and Travels</strong>, we recognize the deep spiritual weight this journey carries — for some, it is a once-in-a-lifetime fulfillment; for others, a dream nurtured for years.</p>
                <p>Our purpose is rooted in devotion: to ensure your pilgrimage is not only seamless and secure, but filled with meaning, sincerity, and sacred purpose. From the moment you decide to go until your return, every step is handled with care, respect, and a heartfelt commitment to your spiritual success.</p>
                <p>At <strong>Al Arafat</strong>, we don't just guide your travel — we honor your journey.</p>
            </div>
        </section>

        <section class="about-mission content-width">
            <h2>Our Mission and Vision</h2>
            <div class="mission-grid">
                <article class="mission-card"><span class="mission-icon" aria-hidden="true">♙</span><h3>To become the most trusted</h3><p>We aim to be the first name people think of when planning their pilgrimage, synonymous with honesty, quality, and spiritual care in every journey we facilitate.</p></article>
                <article class="mission-card"><span class="mission-icon" aria-hidden="true">⌃</span><h3>To continuously improve</h3><p>By actively listening to our clients and embracing new technologies, we aim to evolve and enhance every aspect of the pilgrimage experience year after year.</p></article>
                <article class="mission-card"><span class="mission-icon" aria-hidden="true">♧</span><h3>To offer exceptional support</h3><p>Our dedicated team provides 24/7 support, clear communication, and hands-on guidance to remove stress and confusion from the pilgrimage process.</p></article>
                <article class="mission-card"><span class="mission-icon" aria-hidden="true">✓</span><h3>To maintain consistent quality</h3><p>From pre-departure planning to on-site execution, we focus on delivering a seamless and stress-free experience marked by professionalism and sincerity.</p></article>
            </div>
        </section>

        <!-- <section class="hajj-reviews about-reviews"><div class="content-width"><h2>What our clients say</h2><div class="review-strip"><div class="review-brand"><strong>AL-ARAFAT</strong><span>TOURS AND TRAVELS</span><b>★★★★★</b><small>33 Google reviews</small></div><article><strong>Hashim Khan</strong><small>1 year ago</small><b>★★★★★</b><p>This user only left a rating.</p></article></div></div></section> -->

        <section class="hajj-reviews about-reviews">
    <div class="content-width">

        <h2>What our clients say</h2>

        <div class="review-strip">

            <!-- Business -->
            <div class="review-brand">
                <strong>Al-Arafat Tours And Travels</strong>
                <span></span>
                <b>★★★★★</b>
                <small>33 Google reviews</small>
            </div>

            <!-- Review 1 -->
            <article>
                <strong>Shaikh Munaam</strong>
                <small>1 year ago</small>
                <b>★★★★★</b>
                <p>This user only left a rating.</p>
            </article>

            <!-- Review 2 -->
            <article>
                <strong>Hashim Khan</strong>
                <small>1 year ago</small>
                <b>★★★★★</b>
                <p>This user only left a rating.</p>
            </article>

            <!-- Review 3 -->
            <article>
                <strong>Ayaz Qureshi</strong>
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
