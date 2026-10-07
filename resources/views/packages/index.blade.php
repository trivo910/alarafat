<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=20261007">
    <meta name="theme-color" content="#090909">
    <meta name="description" content="Explore all published Umrah, Hajj, Ramzan, and Ziyarat packages from Al Arafat Tours & Travels.">
    <title>All Packages | Al Arafat Tours &amp; Travels</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/all-packages.css') }}">
    @include('components.schema')
</head>
<body>
    @include('partials.site-header')

    <main>
        <form class="all-packages-filters" method="GET" action="{{ route('packages.index') }}">
            <div class="all-packages-search-band">
                <label class="all-packages-search">
                    <span aria-hidden="true">⌕</span>
                    <input type="search" name="q" value="{{ request('q') }}" placeholder="Where are you going?" aria-label="Search packages">
                    <button class="search-button" type="submit">Search</button>
                </label>
            </div>
            <div class="all-packages-filter-band">
                <div class="all-packages-filter-inner">
                    <label class="filter-control"><span class="visually-hidden">Category</span>
                        <select name="category">
                            <option value="">Categories</option>
                            @foreach(['Umrah', 'Hajj', 'Ramzan', 'Ziyarat'] as $category)
                                <option value="{{ $category }}" @selected(request('category') === $category)>{{ $category }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="filter-control"><span class="visually-hidden">Sort by price</span>
                        <select name="price">
                            <option value="">Sort by</option>
                            <option value="low" @selected(request('price') === 'low')>Price: low to high</option>
                            <option value="high" @selected(request('price') === 'high')>Price: high to low</option>
                        </select>
                    </label>
                    <label class="filter-control"><span class="visually-hidden">Duration</span>
                        <select name="duration">
                            <option value="">Durations</option>
                            @foreach($durations as $duration)
                                <option value="{{ $duration }}" @selected(request('duration') === $duration)>{{ $duration }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="filter-control"><span class="visually-hidden">Language</span>
                        <select name="language">
                            <option value="">Languages</option>
                            @foreach($languages as $language)
                                <option value="{{ $language }}" @selected(request('language') === $language)>{{ $language }}</option>
                            @endforeach
                        </select>
                    </label>
                    <button class="filter-submit" type="submit">Apply filters</button>
                    @if(request()->hasAny(['q', 'category', 'price', 'duration', 'language']))
                        <a class="filter-reset" href="{{ route('packages.index') }}">Clear</a>
                    @endif
                </div>
            </div>
        </form>

        <section class="all-packages-results content-width">
            <div class="all-packages-results-bar">
                <p>{{ $packages->count() }} {{ \Illuminate\Support\Str::plural('tour', $packages->count()) }} found</p>
                <span>Sort by {{ request('price') === 'low' ? 'price: low to high' : (request('price') === 'high' ? 'price: high to low' : 'latest') }}</span>
            </div>
            @if($packages->isNotEmpty())
                <div class="all-packages-grid">
                    @foreach($packages as $package)
                        <article class="package-card">
                            <a class="package-image" href="{{ route('packages.show', $package->slug) }}">
                                @if($package->featured_image_url)
                                    <img src="{{ $package->featured_image_url }}" alt="{{ $package->image_alt_text ?: $package->title }}" loading="lazy">
                                @else
                                    <span class="package-image-placeholder">{{ implode(', ', $package->categories ?: [$package->category]) }} Package</span>
                                @endif
                                <span class="favorite" aria-hidden="true">♡</span>
                            </a>
                            <div class="package-info">
                                <h2><a href="{{ route('packages.show', $package->slug) }}">{{ $package->title }}</a></h2>
                                <p class="rating"><span>★</span> 0 <small>(No Review)</small></p>
                                <div class="package-price">
                                    <span>{{ $package->price !== null ? 'From' : 'Contact for price' }} @if($package->price !== null)<strong>₹{{ number_format((float) $package->price) }}</strong>@endif</span>
                                    @if($package->duration)
                                        <span>◷ {{ $package->duration }}</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <p class="all-packages-empty">No packages match your search. Try changing or clearing the filters.</p>
            @endif
        </section>
    </main>

    @include('partials.site-footer')
</body>
</html>
