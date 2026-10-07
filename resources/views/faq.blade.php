<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#090909">
    <meta name="description" content="Find answers to common questions about Al Arafat Umrah packages, travel services, visas, and pilgrimage support.">
    <title>Frequently Asked Questions - Al Arafat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/faq.css') }}">
    @include('components.schema')
</head>
<body>
    @include('partials.site-header')

    <main class="faq-page">
        <section class="faq-intro">
            <h1>Frequently Asked Questions</h1>
            <p>Al-Arafat Tours &amp; Travels – Your Trusted Partner in Spiritual Journeys</p>
        </section>

        <section class="faq-grid content-width" aria-label="Frequently asked questions about Umrah">
            <div class="faq-column">
                <details class="faq-item">
                    <summary>Q1: What is Umrah and how is it different from Hajj?</summary>
                    <p>Umrah is a voluntary pilgrimage to Makkah that can be performed at any time of the year. It involves fewer rituals compared to Hajj and can be completed in a few hours. While Hajj is obligatory once in a lifetime for every able Muslim and has fixed dates during Dhul Hijjah, Umrah is highly recommended but not mandatory. Many Muslims perform Umrah to seek closeness to Allah and spiritual purification.</p>
                </details>
                <details class="faq-item">
                    <summary>Q2: What services does Al-Arafat Tours &amp; Travels provide?</summary>
                    <p>At Al-Arafat Tours &amp; Travels, we offer complete Umrah and Hajj travel solutions. This includes visa processing, round-trip airfare, hotel accommodation near the Haram, meals, guided tours (Ziyarah), ground transportation, and 24/7 support during your journey. We also provide religious guidance from experienced scholars and ensure all aspects of your pilgrimage are handled with care and professionalism.</p>
                </details>
                <details class="faq-item">
                    <summary>Q3: What documents are needed for the Umrah visa?</summary>
                    <p>To apply for an Umrah visa, you’ll need a passport valid for at least 6 months, passport-sized photographs, a confirmed return flight, proof of hotel booking, and valid vaccination certificates (including COVID-19 and meningitis). Our team assists you in compiling and submitting all necessary documents to make the visa process smooth and stress-free.</p>
                </details>
                <details class="faq-item">
                    <summary>Q4: Are your Umrah packages available year-round?</summary>
                    <p>Yes, we offer Umrah packages throughout the year, including special Ramadan and off-season deals. You can choose from our regular group departures or request customized travel based on your preferred dates. We also offer options for solo travelers, families, and senior citizens, ensuring flexibility and comfort for everyone.</p>
                </details>
            </div>
            <div class="faq-column">
                <details class="faq-item">
                    <summary>Q5: Do you provide guided support during the pilgrimage?</summary>
                    <p>Absolutely. Our groups are accompanied by knowledgeable religious guides who assist pilgrims through each stage of Umrah or Hajj — from wearing Ihram and making Niyyah, to completing Tawaf, Sa’i, and other rituals. Our guides are available for questions, spiritual support, and to help you perform your worship correctly and peacefully.</p>
                </details>
                <details class="faq-item">
                    <summary>Q6: What if I need to cancel or reschedule my trip?</summary>
                    <p>We understand that travel plans can change. Our cancellation and refund policy depends on the stage of booking, visa status, and airline or hotel terms. If cancellation occurs before the visa or tickets are confirmed, partial refunds may be available. For full details, please contact our support team, who will guide you based on your specific situation.</p>
                </details>
                <details class="faq-item">
                    <summary>Q7: How are meals and transportation handled during the trip?</summary>
                    <p>Most of our packages include daily buffet meals, typically Indian, Pakistani, or Arabic cuisine. We also provide private or group transportation using air-conditioned buses for airport transfers, intercity travel (Makkah to Madinah), and Ziyarah tours. Our aim is to make your journey comfortable, well-organized, and spiritually fulfilling.</p>
                </details>
                <details class="faq-item">
                    <summary>Q8: Can women travel for Umrah without a male guardian?</summary>
                    <p>Women under the age of 45 must be accompanied by a Mahram according to Saudi regulations. However, women above 45 may be allowed to travel in organized groups with appropriate authorization. We ensure that female travelers are provided with safe and respectful arrangements, including separate accommodation and group leaders when needed.</p>
                </details>
            </div>
        </section>

        <!-- <section class="faq-promo content-width">
            <div class="faq-promo-art" role="img" aria-label="A pilgrim at the holy mosque"></div>
            <div class="faq-promo-copy">
                <h2>Get special offers, and more from Al Arafat</h2>
                <p>Explore our Umrah packages and find the journey that’s right for you.</p>
                <a href="{{ route('packages.index') }}">Explore packages</a>
            </div>
        </section> -->
    </main>

    @include('partials.site-footer')
    <script src="{{ asset('js/home.js') }}" defer></script>
</body>
</html>
