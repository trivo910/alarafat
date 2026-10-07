<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=20261007">
    <meta name="theme-color" content="#090909">
    <meta name="description" content="If You have any Query feel free to Contact Al Arafat">
    <title>Contact Al Arafat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/contact.css') }}">
    @include('components.schema')
</head>
<body>
    @include('partials.site-header', ['activePage' => 'contact'])

    <main class="contact-page">
        <section class="contact-title"><h1>Contact with us</h1><p>If you have any Query feel free to Contact Al Arafat</p></section>
        <div class="contact-map"><iframe title="Al-Arafat Tours And Travels location map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23516.15085843252!2d72.80220451083984!3d19.1573604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b740f32dea0f%3A0xc49f71f25572890d!2sAL-Arafat%20Tours%20And%20Travels!5e1!3m2!1sen!2sus!4v1790425110774!5m2!1sen!2sus" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe></div>
        <section class="contact-content content-width">
            <div class="contact-details">
                <h2>Contact information</h2>
                <address>
                    <div class="contact-detail"><span class="contact-detail-icon" aria-hidden="true">♦</span><p>1st floor-154, no. 01, 1229, Motilal Nagar No. 1, near Sai Baba Mandir, Prarthana Society, Motilal Nagar I, Goregaon West, Mumbai, Maharashtra 400104</p></div>
                    <a class="contact-detail" href="tel:+919867851046"><span class="contact-detail-icon" aria-hidden="true">☎</span><p>+91 98678 51046</p></a>
                    <a class="contact-detail" href="mailto:umrah@alarafat.com"><span class="contact-detail-icon" aria-hidden="true">✉</span><p>umrah@alarafat.com</p></a>
                </address>
            </div>
            <form class="contact-form" action="{{ route('contact.submit', [], false) }}" method="post">
                @csrf
                <h2>Send a message</h2>
                @if (session('status'))
                    <p role="status">{{ session('status') }}</p>
                @endif
                @if ($errors->any())
                    <div role="alert">
                        <p>Please correct the following errors:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="contact-fields"><label><span class="visually-hidden">Your name</span><input name="name" autocomplete="name" placeholder="Your name*" value="{{ old('name') }}" required></label><label><span class="visually-hidden">Phone number</span><input name="phone" type="tel" autocomplete="tel" placeholder="Phone number" value="{{ old('phone') }}"></label><label class="contact-email"><span class="visually-hidden">Your email</span><input name="email" type="email" autocomplete="email" placeholder="Your email*" value="{{ old('email') }}" required></label><label class="contact-message"><span class="visually-hidden">Message</span><textarea name="message" placeholder="Message" required>{{ old('message') }}</textarea></label></div>
                <button type="submit" class="search-button">Submit</button>
            </form>
        </section>
    </main>

    @include('partials.site-footer')
    <script src="{{ asset('js/hajj.js') }}" defer></script>
</body>
</html>
