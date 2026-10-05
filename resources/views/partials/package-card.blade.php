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
        <div class="package-price">
            <span>
                @if($package->price !== null)
                    From <strong>₹{{ number_format((float) $package->price) }}</strong>
                @else
                    Contact for price
                @endif
            </span>
            @if($package->duration)
                <span>◷ {{ $package->duration }}</span>
            @endif
        </div>
    </div>
</article>