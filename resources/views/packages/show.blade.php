@php
    $packageCategories = $package->categories ?: [$package->category];
    $galleryImages = collect($package->gallery_images ?? [])
        ->map(fn (string $image): string => Str::startsWith($image, ['http://', 'https://', '/']) ? $image : asset('storage/' . $image))
        ->prepend($package->featured_image_url)
        ->filter()
        ->take(5)
        ->values();
    $relatedOptions = collect([
        ['category' => 'Hajj', 'title' => 'Hajj packages from Mumbai', 'url' => '/hajj', 'image' => 'https://alarafat.com/wp-content/uploads/2025/11/Gemini_Generated_Image_li0mg6li0mg6li0m-450x300.png'],
        ['category' => 'Umrah', 'title' => 'Umrah packages from Mumbai', 'url' => '/umrah-package-from-mumbai', 'image' => 'https://alarafat.com/wp-content/uploads/2026/09/mumbai-umrah-2026-450x300.png'],
        ['category' => 'Ramzan', 'title' => 'Ramzan Umrah packages', 'url' => '/ramzan-umrah-package-from-mumbai', 'image' => 'https://alarafat.com/wp-content/uploads/2026/09/from-mumbai-2026-silver-450x300.png'],
        ['category' => 'Ziyarat', 'title' => 'Ziyarat tours', 'url' => '/ziyarat', 'image' => 'https://alarafat.com/wp-content/uploads/2022/12/71-768x512.jpg'],
    ])->reject(fn (array $option): bool => in_array($option['category'], $packageCategories, true))->values();
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#090909">
    <meta name="description" content="{{ $package->meta_description ?: Str::limit(strip_tags($package->description ?? ''), 160) }}">
    <title>{{ $package->meta_title ?: $package->title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/package-show.css') }}">
    @include('components.schema')
</head>
<body>
    @include('partials.site-header', ['activePage' => $activePage])

    <nav class="package-breadcrumb content-width" aria-label="Breadcrumb">
        <a href="{{ url('/') }}">Home</a><span aria-hidden="true">›</span>
        <a href="{{ url($categoryUrl) }}">{{ implode(', ', $packageCategories) }}</a><span aria-hidden="true">›</span>
        <span>{{ $package->title }}</span>
    </nav>

    <main class="package-detail">
        <div class="package-heading content-width">
            <h1>{{ $package->title }}</h1>
            <p class="package-rating"><span aria-hidden="true">★</span> 0 <small>(No Review)</small></p>
        </div>

        <section class="package-gallery content-width gallery-count-{{ $galleryImages->count() }}" aria-label="{{ $package->title }} photos">
            @forelse($galleryImages as $image)
                <img src="{{ $image }}" alt="{{ $package->image_alt_text ?: $package->title }}" loading="{{ $loop->first ? 'eager' : 'lazy' }}">
            @empty
                <div class="package-gallery-placeholder">{{ implode(', ', $packageCategories) }} package</div>
            @endforelse
        </section>

        <section class="package-facts content-width" aria-label="Package information">
            <div class="package-fact"><span class="fact-icon" aria-hidden="true">◷</span><span><strong>Duration</strong><small>{{ $package->duration ?: 'On request' }}</small></span></div>
            <div class="package-fact"><span class="fact-icon" aria-hidden="true">♧</span><span><strong>Tour type</strong><small>{{ $package->tour_type ?: 'Guided tour' }}</small></span></div>
            <div class="package-fact"><span class="fact-icon" aria-hidden="true">♙</span><span><strong>Group size</strong><small>{{ $package->group_size ?: 'Contact us' }}</small></span></div>
            <div class="package-fact"><span class="fact-icon" aria-hidden="true">文</span><span><strong>Languages</strong><small>{{ $package->languages ?: 'English' }}</small></span></div>
        </section>

        <div class="package-content-layout content-width">
            <article class="package-main-content">
                <section class="package-tour-copy">
                    <h2>About this tour</h2>
                    @if($package->description)
                        <div class="package-description">{!! $package->description !!}</div>
                    @else
                        <p>Contact Al Arafat Tours &amp; Travels for details about this {{ strtolower(implode(', ', $packageCategories)) }} package.</p>
                    @endif
                </section>

                @if($package->itinerary)
                    <section class="package-detail-section">
                        <h2>Itinerary</h2>
                        <div class="package-itinerary">
                            @foreach($package->itinerary as $item)
                                <article><h3>{{ $item['days_label'] ?? '' }}</h3><div>{!! $item['description'] ?? '' !!}</div></article>
                            @endforeach
                        </div>
                    </section>
                @endif

                @if($package->included || $package->excluded)
                    <section class="package-detail-section">
                        <h2>Included / Excluded</h2>
                        <div class="package-inclusions">
                            @if($package->included)
                                <div><h3>Included</h3><ul>@foreach($package->included as $item)<li>{{ $item }}</li>@endforeach</ul></div>
                            @endif
                            @if($package->excluded)
                                <div><h3>Not included</h3><ul>@foreach($package->excluded as $item)<li>{{ $item }}</li>@endforeach</ul></div>
                            @endif
                        </div>
                    </section>
                @endif

                @if($package->map_embed)
                    <section class="package-detail-section package-location">
                        <h2>Tour's location</h2>
                        <div class="package-map">{!! $package->map_embed !!}</div>
                    </section>
                @endif
            </article>

            <aside class="package-sidebar">
                <form class="package-enquiry" method="POST" action="{{ route('packages.enquiry', ['slug' => $package->slug], false) }}">
                    @csrf
                    <p class="booking-price"><small>From:</small> <strong>₹{{ $package->price !== null ? number_format((float) $package->price) : 'Contact us' }}</strong></p>
                    <h2>Enquire About This Package</h2>
                    @if (session('status'))
                        <p class="enquiry-status" role="status">{{ session('status') }}</p>
                    @endif
                    @if ($errors->any())
                        <div class="enquiry-errors" role="alert">
                            <p>Please correct the following errors:</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label class="visually-hidden" for="enquiry-name">Your name</label>
                    <input id="enquiry-name" name="name" type="text" autocomplete="name" placeholder="Your Name*" value="{{ old('name') }}" required>
                    <label class="visually-hidden" for="enquiry-email">Your email</label>
                    <input id="enquiry-email" name="email" type="email" autocomplete="email" placeholder="Your Email*" value="{{ old('email') }}" required>
                    <label class="visually-hidden" for="enquiry-phone">Phone number</label>
                    <input id="enquiry-phone" name="phone" type="tel" autocomplete="tel" placeholder="Phone Number" value="{{ old('phone') }}">
                    <label class="visually-hidden" for="enquiry-message">Your message</label>
                    <textarea id="enquiry-message" name="message" placeholder="Your Message" required>{{ old('message') }}</textarea>
                    <button class="booking-submit" type="submit">Send Enquiry</button>
                </form>

                <section class="package-contact-card">
                    <h2>Information Contact</h2>
                    <p><strong>Email</strong><a href="mailto:umrah@alarafat.com">umrah@alarafat.com</a></p>
                    <p><strong>Website</strong><a href="https://alarafat.com/">https://alarafat.com/</a></p>
                    <p><strong>Phone</strong><a href="tel:+919867851046">+91 98678 51046</a></p>
                </section>
            </aside>
        </div>

        <section class="related-packages content-width">
            <h2>Explore other options</h2>
            @if($relatedPackages->isNotEmpty())
                <div class="package-grid">
                    @foreach($relatedPackages as $package)
                        @include('partials.package-card', ['package' => $package])
                    @endforeach
                </div>
            @else
                <div class="package-grid">
                    @foreach($relatedOptions as $option)
                        <article class="package-card">
                            <a class="package-image" href="{{ url($option['url']) }}"><img src="{{ $option['image'] }}" alt="{{ $option['title'] }}" loading="lazy"></a>
                            <div class="package-info"><h3><a href="{{ url($option['url']) }}">{{ $option['title'] }}</a></h3><div class="package-price"><span>Explore {{ strtolower($option['category']) }} packages</span></div></div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    </main>

    @include('partials.site-footer')
    <script src="{{ asset('js/hajj.js') }}" defer></script>
</body>
</html>
