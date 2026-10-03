@extends('admin.layout', ['pageTitle' => 'Blog'])

@push('head')
    @vite('resources/js/blog-editor.js')
@endpush

@section('content')
    <div class="page-actions"><a class="button-primary" href="#create-form">New post</a></div>
    <section class="admin-panel">
        @if($blogs->isEmpty())
            <p class="empty-state">No blog posts yet.</p>
        @else
            <div class="table-scroll">
                <table class="admin-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>SEO</th>
                        <th>Published</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>
                                <strong>{{ $blog->title }}</strong>
                                <small class="subline">/{{ $blog->slug }}</small>
                            </td>
                            <td><span class="status-pill {{ $blog->status }}">{{ ucfirst($blog->status) }}</span></td>
                            <td>{{ $blog->meta_title ? 'Yes' : 'No' }}</td>
                            <td>{{ $blog->published_at ? $blog->published_at->format('d M Y') : 'Draft' }}</td>
                            <td class="table-actions">
                                <a href="{{ route('blog.show', $blog->slug) }}" target="_blank">View</a>
                                <a href="{{ route('admin.blogs.edit', $blog) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}" onsubmit="return confirm('Delete this blog?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button-link danger-link">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        @endif
    </section>

    <section class="admin-panel form-panel" id="create-form">
        <h2 class="panel-title">Create blog post</h2>
        <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" class="admin-form">
            @csrf
            <label>Title<input name="title" value="{{ old('title') }}" required></label>
            <label>Slug<input name="slug" value="{{ old('slug') }}"></label>
            <label>Featured image<input name="featured_image" type="file" accept="image/jpeg,image/png,image/webp"></label>
            <label>Image alt text<input name="image_alt_text" value="{{ old('image_alt_text') }}"></label>
            <label>Meta title<input name="meta_title" value="{{ old('meta_title') }}"></label>
            <label>Meta description<textarea name="meta_description" rows="3">{{ old('meta_description') }}</textarea></label>
            <div class="blog-editor-field">
                <label for="blog-content-editor">Content</label>
                <textarea class="blog-content-source" name="content" aria-hidden="true" tabindex="-1">{{ old('content') }}</textarea>
                <div id="blog-content-editor" class="blog-rich-editor" data-blog-editor aria-label="Blog content editor"></div>
            </div>
            <div class="form-actions">
                <button class="button-secondary" type="submit" name="status" value="draft">Save as draft</button>
                <button class="button-primary" type="submit" name="status" value="published">Publish blog</button>
            </div>
        </form>
    </section>
@endsection
