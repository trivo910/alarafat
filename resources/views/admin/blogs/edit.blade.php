@extends('admin.layout', ['pageTitle' => 'Edit blog'])

@push('head')
    @vite('resources/js/blog-editor.js')
@endpush

@section('content')
    <section class="admin-panel form-panel">
        <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data" class="admin-form">
            @csrf
            @method('PUT')
            <label>Title<input name="title" value="{{ old('title', $blog->title) }}" required></label>
            <label>Slug<input name="slug" value="{{ old('slug', $blog->slug) }}" required></label>

            <label>Featured image
                @if($blog->featured_image)
                    <img class="package-preview" src="{{ $blog->featured_image_url }}" alt="{{ $blog->image_alt_text ?: $blog->title }}">
                @endif
                <input name="featured_image" type="file" accept="image/jpeg,image/png,image/webp">
            </label>
            <label>Image alt text<input name="image_alt_text" value="{{ old('image_alt_text', $blog->image_alt_text) }}"></label>

            <div class="form-columns">
                <label>Meta title<input name="meta_title" value="{{ old('meta_title', $blog->meta_title) }}"></label>
                <label>Status<select name="status"><option value="draft" {{ old('status', $blog->status) === 'draft' ? 'selected' : '' }}>Draft</option><option value="published" {{ old('status', $blog->status) === 'published' ? 'selected' : '' }}>Published</option></select></label>
            </div>
            <label>Meta description<textarea name="meta_description">{{ old('meta_description', $blog->meta_description) }}</textarea></label>
            <div class="blog-editor-field">
                <label for="blog-content-editor">Content</label>
                <textarea class="blog-content-source" name="content" aria-hidden="true" tabindex="-1">{{ old('content', $blog->content) }}</textarea>
                <div id="blog-content-editor" class="blog-rich-editor" data-blog-editor aria-label="Blog content editor"></div>
            </div>
            <div class="form-actions"><button class="button-primary" type="submit">Save changes</button><a class="button-secondary" href="{{ route('admin.blogs.index') }}">Cancel</a></div>
        </form>
    </section>
@endsection
