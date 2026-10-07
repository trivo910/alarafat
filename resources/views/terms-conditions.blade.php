<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=20261007">
    <meta name="theme-color" content="#090909">
    <meta name="description" content="Read the terms and conditions for using the Al Arafat Tours & Travels website and its travel information and services.">
    <title>Terms &amp; Conditions - Al Arafat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/terms-conditions.css') }}">
    @include('components.schema')
</head>
<body>
    @include('partials.site-header')

    <main class="terms-page">
        <section class="terms-banner">
            <div class="content-width">
                <h1>Terms &amp; Conditions</h1>
            </div>
        </section>

        <nav class="terms-breadcrumb content-width" aria-label="Breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <span aria-hidden="true">›</span>
            <span aria-current="page">Terms &amp; Conditions</span>
        </nav>

        <article class="terms-content content-width">
            <h2>Terms &amp; Conditions</h2>
            <p>Welcome to Al Arafat Tours &amp; Travels. These terms and conditions explain the rules for using our website and the information and services available through it.</p>
            <p>By accessing this website, you agree to these terms. If you do not agree, please do not use the website. These terms apply to website use; the terms that apply to a specific tour, booking, or travel service will be provided as part of that service and may include additional conditions.</p>
            <p>In these terms, “Al Arafat”, “we”, “us”, and “our” refer to Al Arafat Tours &amp; Travels. “You” refers to the person visiting or using this website.</p>

            <h2>Cookies</h2>
            <p>Our website may use cookies and similar technologies to support site functionality and understand how visitors use the site. By continuing to use the website, you agree to the use of cookies as described in our <a href="{{ route('privacy-policy') }}">Privacy Policy</a>. You can manage cookies through your browser settings; disabling some cookies may affect website functionality.</p>

            <h2>Use of website content</h2>
            <p>Unless otherwise stated, website text, design, images, and other materials are owned by or used with permission by Al Arafat. You may view and use the website for personal, non-commercial purposes. You must not, without our prior written permission:</p>
            <ul>
                <li>Republish substantial website content as your own.</li>
                <li>Sell, rent, or sublicense website materials.</li>
                <li>Copy, reproduce, or redistribute materials for commercial purposes.</li>
                <li>Use the website in a way that damages, disrupts, or interferes with the site or other users.</li>
            </ul>
            <p>You may share links to public pages provided that the link is fair, lawful, and does not misrepresent our business or imply an endorsement or association that does not exist.</p>

            <h2>User submissions and comments</h2>
            <p>If the website allows you to submit comments, reviews, or other content, you are responsible for what you submit and must have the rights and permissions needed to share it. Submissions must not be unlawful, misleading, abusive, defamatory, discriminatory, or infringe another person’s rights.</p>
            <p>By submitting content, you give us permission to display and use it in connection with operating and promoting the website, subject to applicable law. We may review, moderate, or remove submitted content where appropriate, but we are not required to monitor every submission.</p>

            <h2>Travel information and bookings</h2>
            <p>Information about packages, itineraries, prices, availability, inclusions, and travel requirements on this website is provided for general guidance and may change. A booking is subject to confirmation and the specific itinerary, service details, payment terms, cancellation conditions, and other booking documents provided to you.</p>
            <p>Airline, accommodation, visa, transport, and other travel services may be provided by third parties and may be subject to their own terms and conditions. Travel requirements can change; travelers are responsible for checking that they meet applicable passport, visa, health, and entry requirements. Please contact our team to confirm details before making travel decisions.</p>

            <h2>Links to other websites</h2>
            <p>Our website may link to third-party websites for convenience or reference. We do not control those websites and are not responsible for their content, availability, or policies. A link does not necessarily mean that we endorse the linked website or its operator.</p>

            <h2>Frames and website presentation</h2>
            <p>You may not create frames around our webpages or present our website content in a way that changes its appearance or misrepresents its source without our prior written permission.</p>

            <h2>Website availability and content</h2>
            <p>We aim to keep website information useful and up to date, but we do not guarantee that every page or feature will always be available, uninterrupted, or free of errors. Website content is provided for general information and does not replace written confirmation of a specific travel service or booking.</p>

            <h2>Your privacy</h2>
            <p>Please read our <a href="{{ route('privacy-policy') }}">Privacy Policy</a> to understand how information may be handled when you use this website or contact us.</p>

            <h2>Reservation of rights</h2>
            <p>We reserve the right to update or remove website content, restrict access to parts of the website, and revise these terms. Changes will be posted on this page. Your continued use of the website after a change is posted means that you accept the revised terms.</p>

            <h2>Disclaimer and limitation of liability</h2>
            <p>To the extent permitted by applicable law, the website and its general information are provided on an “as is” and “as available” basis. Nothing in these terms excludes or limits a liability that cannot legally be excluded or limited.</p>
            <p>To the extent permitted by law, we are not liable for indirect or consequential loss arising from general use of the website, reliance on information that has not been confirmed for a booking, or the unavailability of the website. This does not affect rights or remedies that apply to a confirmed travel service under its booking terms or applicable law.</p>

            <h2>Contact us</h2>
            <p>If you have questions about these terms, please contact Al Arafat Tours &amp; Travels at <a href="mailto:umrah@alarafat.com">umrah@alarafat.com</a> or call <a href="tel:+919867851046">+91 98678 51046</a>.</p>
        </article>
    </main>

    @include('partials.site-footer')
    <script src="{{ asset('js/home.js') }}" defer></script>
</body>
</html>
