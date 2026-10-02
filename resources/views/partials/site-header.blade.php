<div class="contact-strip">
    <div class="contact-inner">
        <div class="contact-links">
            <a href="tel:+919867851046"><span aria-hidden="true">☎</span> +91 98678 51046</a>
            <a href="mailto:umrah@alarafat.com"><span aria-hidden="true">✉</span> umrah@alarafat.com</a>
        </div>
        <div class="social-links" aria-label="Social media">
            <a href="https://www.facebook.com/people/al-arafat/100085602021408/" aria-label="Facebook">f</a>
            <a href="https://twitter.com/alarafatmumbai/" aria-label="Twitter">𝕏</a>
            <a href="https://www.instagram.com/alarafat_official/" aria-label="Instagram">◎</a>
            <a href="https://www.linkedin.com/company/al-arafat-com/" aria-label="LinkedIn">in</a>
        </div>
    </div>
</div>
<header class="site-header">
    <a class="brand" href="{{ url('/') }}" aria-label="Al Arafat Tours & Travels home">
        <img src="{{ asset('storage/logo/Al-arafat-Logo-355-x-71 (1).png') }}" alt="Al Arafat Tours & Travels">
    </a>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="Open navigation"><span></span><span></span><span></span></button>
    <nav class="primary-nav" id="primary-navigation" aria-label="Main navigation">
        <a @class(['active' => ($activePage ?? '') === 'home']) href="{{ url('/') }}">Home</a>
        <a @class(['active' => ($activePage ?? '') === 'hajj']) href="{{ url('/hajj') }}">Hajj</a>
        <div class="nav-dropdown">
            <button class="nav-dropdown-trigger" type="button" aria-expanded="false" aria-controls="umrah-submenu">Umrah</button>
            <div class="nav-submenu" id="umrah-submenu">
                <a @class(['active' => ($activePage ?? '') === 'umrah']) href="{{ url('/umrah-package-from-mumbai') }}">Umrah Package From Mumbai</a>
                <a @class(['active' => ($activePage ?? '') === 'ramzan']) href="{{ url('/ramzan-umrah-package-from-mumbai') }}">Ramzan Umrah From Mumbai</a>
            </div>
        </div>
        <a @class(['active' => ($activePage ?? '') === 'ziyarat']) href="{{ url('/ziyarat') }}">Ziyarat</a>
        <a @class(['active' => ($activePage ?? '') === 'blog']) href="{{ url('/blog') }}">Blog</a>
        <a @class(['active' => ($activePage ?? '') === 'about']) href="{{ url('/about') }}">About</a>
        <a @class(['active' => ($activePage ?? '') === 'contact']) href="{{ url('/contact') }}">Contact</a>
    </nav>
    <div class="header-tools"><span>INR</span><a class="account-button" href="mailto:umrah@alarafat.com" aria-label="Contact Al Arafat">♙</a></div>
</header>