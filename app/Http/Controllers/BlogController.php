<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Support\BlogContentSanitizer;
use App\Support\PublicImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
{
    public function __construct(private PublicImageStorage $imageStorage) {}

    public function publicIndex()
    {
        $blogs = Blog::where('status', 'published')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->get();

        return view('blog', compact('blogs'));
    }

    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:blogs,slug'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'image_alt_text' => ['nullable', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['content'] = $this->sanitizeContent($validated['content']);
        $validated['featured_image'] = $request->file('featured_image')
            ? $this->imageStorage->store($request->file('featured_image'), 'blogs')
            : null;
        $validated['published_at'] = $validated['status'] === 'published' ? ($validated['published_at'] ?? now()) : null;

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:blogs,slug,'.$blog->id],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'image_alt_text' => ['nullable', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['content'] = $this->sanitizeContent($validated['content']);
        unset($validated['featured_image']);
        $oldImage = $blog->featured_image;
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $this->imageStorage->store($request->file('featured_image'), 'blogs');
        }
        $validated['published_at'] = $validated['status'] === 'published' ? ($validated['published_at'] ?? $blog->published_at ?? now()) : null;

        $blog->update($validated);
        if (isset($validated['featured_image']) && $oldImage !== $validated['featured_image']) {
            $this->deleteStoredImage($oldImage);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $image = $blog->featured_image;
        $blog->delete();
        $this->deleteStoredImage($image);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }

    public function showPublic(string $slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $latestBlogs = Blog::where('status', 'published')
            ->where('id', '!=', $blog->id)
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->limit(3)
            ->get();

        return view('blog.show', compact('blog', 'latestBlogs'));
    }

    private function deleteStoredImage(?string $path): void
    {
        if ($path && ! Str::startsWith($path, ['http://', 'https://', '/'])) {
            Storage::disk('public')->delete($path);
        }
    }

    private function sanitizeContent(string $content): string
    {
        $content = BlogContentSanitizer::sanitize($content);
        $plainText = html_entity_decode(strip_tags($content), ENT_QUOTES | ENT_HTML5, 'UTF-8');

        if (trim(str_replace("\xc2\xa0", ' ', $plainText)) === '' && ! Str::contains($content, '<img')) {
            throw ValidationException::withMessages([
                'content' => 'The content field is required.',
            ]);
        }

        return $content;
    }
}
