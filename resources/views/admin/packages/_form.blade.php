@php
    $isEditing = $package !== null;
    $includedItems = old('included', $package?->included ?? []);
    $excludedItems = old('excluded', $package?->excluded ?? []);
    $itineraryItems = old('itinerary', $package?->itinerary ?? []);
@endphp

<form method="POST" action="{{ $formAction }}" enctype="multipart/form-data" class="admin-form package-form">
    @csrf
    @if($isEditing)
        @method('PUT')
    @endif

    <section class="package-form-section">
        <h3>Basic info</h3>
        <div class="package-form-grid">
            <label>Title<input name="title" value="{{ old('title', $package?->title) }}" required></label>
            <label>Category
                <select name="category" required>
                    @foreach(['Umrah', 'Hajj', 'Ziyarat'] as $category)
                        <option value="{{ $category }}" {{ old('category', $package?->category) === $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <label>Slug<input name="slug" value="{{ old('slug', $package?->slug) }}" placeholder="Generated from title if left blank"></label>
        <div class="blog-editor-field">
            <label for="package-description-editor">Description</label>
            <textarea class="blog-content-source" name="description" aria-hidden="true" tabindex="-1">{{ old('description', $package?->description) }}</textarea>
            <div id="package-description-editor" class="blog-rich-editor package-description-editor" data-blog-editor data-source-name="description" aria-label="Package description editor"></div>
        </div>
    </section>

    <section class="package-form-section">
        <h3>Status</h3>
        <div class="package-form-grid package-publish-grid">
            <label>Status
                <select name="status">
                    <option value="draft" {{ old('status', $package?->status ?? 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $package?->status) === 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </label>
            <label class="checkbox-label"><input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $package?->is_featured) ? 'checked' : '' }}> Feature this package</label>
        </div>
        <label class="checkbox-label"><input type="checkbox" name="show_in_trending" value="1" {{ old('show_in_trending', $package?->show_in_trending) ? 'checked' : '' }}> Show in “Trending Packages”</label>
    </section>

    <section class="package-form-section">
        <h3>Pricing &amp; duration</h3>
        <div class="package-form-grid">
            <label>Price<input name="price" type="number" min="0" step="0.01" value="{{ old('price', $package?->price) }}"></label>
            <label>Duration<input name="duration" value="{{ old('duration', $package?->duration) }}"></label>
        </div>
        <div class="package-form-grid package-form-grid-three">
            <label>Tour type<input name="tour_type" value="{{ old('tour_type', $package?->tour_type) }}"></label>
            <label>Group size<input name="group_size" value="{{ old('group_size', $package?->group_size) }}"></label>
            <label>Languages<input name="languages" value="{{ old('languages', $package?->languages) }}"></label>
        </div>
        <label>Map embed (iframe / HTML)<textarea name="map_embed" rows="3">{{ old('map_embed', $package?->map_embed) }}</textarea></label>
    </section>

    <section class="package-form-section">
        <h3>Images</h3>
        <div class="image-upload-group">
            <div class="image-upload-title">Package thumbnail</div>
            <p class="field-help">Single image shown on package cards and social sharing previews.</p>
            @if($package?->featured_image)
                <img class="package-preview" src="{{ $package->featured_image_url }}" alt="{{ $package->image_alt_text ?: $package->title }}">
                <span class="field-help">Current thumbnail</span>
            @endif
            <input name="featured_image" type="file" accept="image/jpeg,image/png">
            <span class="field-help">JPG or PNG, up to 4MB. Replacing the thumbnail is optional.</span>
            <label>Thumbnail alt text<input name="image_alt_text" value="{{ old('image_alt_text', $package?->image_alt_text) }}"></label>
            <span class="field-help">Describe the image for screen readers and search engines.</span>
        </div>

        @if($package?->gallery_images)
            <div class="image-upload-group">
                <div class="image-upload-title">Current gallery images</div>
                <div class="gallery-preview-grid">
                    @foreach($package->gallery_images as $galleryImage)
                        <label class="gallery-preview-item">
                            <img src="{{ asset('storage/' . $galleryImage) }}" alt="Package gallery image">
                            <span><input type="checkbox" name="remove_gallery_images[]" value="{{ $galleryImage }}"> Remove</span>
                        </label>
                    @endforeach
                </div>
            </div>
        @endif

        <label>Add gallery images<input name="gallery_images[]" type="file" accept="image/jpeg,image/png" multiple></label>
        <span class="field-help">JPG or PNG, up to 4MB each. New images are appended to the gallery.</span>
    </section>

    <section class="package-form-section">
        <h3>Inclusions</h3>
        <div class="package-form-grid">
            @foreach([
                ['Included', 'included', $includedItems, 'Add included item'],
                ['Excluded', 'excluded', $excludedItems, 'Add excluded item'],
            ] as [$label, $key, $items, $addLabel])
                <div class="repeatable-field">
                    <h4>{{ $label }}</h4>
                    <div class="repeatable-list" id="{{ $key }}-list">
                        @foreach($items as $item)
                            <div class="repeatable-row" data-repeat-row>
                                <input name="{{ $key }}[]" value="{{ $item }}" aria-label="{{ $label }} item">
                                <button class="remove-row" type="button" data-remove-row aria-label="Remove {{ strtolower($label) }} item">×</button>
                            </div>
                        @endforeach
                    </div>
                    <template id="{{ $key }}-template"><div class="repeatable-row" data-repeat-row><input name="{{ $key }}[]" aria-label="{{ $label }} item"><button class="remove-row" type="button" data-remove-row aria-label="Remove {{ strtolower($label) }} item">×</button></div></template>
                    <button class="add-row" type="button" data-add-row="{{ $key }}">+ {{ $addLabel }}</button>
                </div>
            @endforeach
        </div>
    </section>

    <section class="package-form-section">
        <h3>Itinerary overview</h3>
        <p class="field-help">Each entry is one itinerary item. Add a days label and description.</p>
        <div class="repeatable-list itinerary-list" id="itinerary-list" data-next-index="{{ count($itineraryItems) }}">
            @foreach($itineraryItems as $index => $item)
                <div class="itinerary-row" data-repeat-row>
                    <div class="itinerary-row-header"><strong>Item {{ $loop->iteration }}</strong><button class="remove-row" type="button" data-remove-row aria-label="Remove itinerary item">×</button></div>
                    <label>Days label<input name="itinerary[{{ $index }}][days_label]" value="{{ $item['days_label'] ?? '' }}"></label>
                    <label>Description<textarea name="itinerary[{{ $index }}][description]" rows="3">{{ $item['description'] ?? '' }}</textarea></label>
                </div>
            @endforeach
        </div>
        <template id="itinerary-template">
            <div class="itinerary-row" data-repeat-row>
                <div class="itinerary-row-header"><strong>New item</strong><button class="remove-row" type="button" data-remove-row aria-label="Remove itinerary item">×</button></div>
                <label>Days label<input name="itinerary[__INDEX__][days_label]"></label>
                <label>Description<textarea name="itinerary[__INDEX__][description]" rows="3"></textarea></label>
            </div>
        </template>
        <button class="add-row" type="button" data-add-row="itinerary">+ Add itinerary</button>
    </section>

    <section class="package-form-section">
        <h3>SEO</h3>
        <div class="package-form-grid">
            <label>Meta title<input name="meta_title" value="{{ old('meta_title', $package?->meta_title) }}"></label>
            <label>Meta description<textarea name="meta_description" rows="2">{{ old('meta_description', $package?->meta_description) }}</textarea></label>
        </div>
    </section>

    <div class="form-actions">
        <button class="button-primary" type="submit">{{ $isEditing ? 'Save changes' : 'Save package' }}</button>
        <a class="button-secondary" href="{{ route('admin.packages.index') }}">Cancel</a>
    </div>
</form>