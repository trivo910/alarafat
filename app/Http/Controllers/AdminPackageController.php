<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Support\BlogContentSanitizer;
use App\Support\GoogleMapsEmbed;
use App\Support\PublicImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminPackageController extends Controller
{
    public function __construct(private PublicImageStorage $imageStorage) {}

    public function index()
    {
        $packages = Package::latest()->get();

        return view('admin.packages.index', compact('packages'));
    }

    public function store(Request $request)
    {
        $this->normalizeCategories($request);
        $validated = $request->validate($this->rules());

        $validated['categories'] = array_values(array_unique($validated['categories']));
        $validated['category'] = $validated['categories'][0];
        $validated['slug'] = Str::slug($validated['slug'] ?: $validated['title']);
        $validated['map_embed'] = GoogleMapsEmbed::extractUrl($validated['map_embed'] ?? null);
        $validated['description'] = BlogContentSanitizer::sanitize($validated['description'] ?? '');
        $validated['featured_image'] = $request->file('featured_image')
            ? $this->imageStorage->store($request->file('featured_image'), 'packages')
            : null;
        $validated['gallery_images'] = $this->storeGallery($request);
        $validated['included'] = $this->cleanList($request->input('included', []));
        $validated['excluded'] = $this->cleanList($request->input('excluded', []));
        $validated['itinerary'] = $this->cleanItinerary($request->input('itinerary', []));
        $validated['show_in_trending'] = $request->boolean('show_in_trending');
        Package::create($validated);

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $this->normalizeCategories($request);
        $validated = $request->validate($this->rules($package));

        $validated['categories'] = array_values(array_unique($validated['categories']));
        $validated['category'] = $validated['categories'][0];
        $validated['slug'] = Str::slug($validated['slug']);
        $validated['map_embed'] = GoogleMapsEmbed::extractUrl($validated['map_embed'] ?? null);
        $validated['description'] = BlogContentSanitizer::sanitize($validated['description'] ?? '');
        $validated['included'] = $this->cleanList($request->input('included', []));
        $validated['excluded'] = $this->cleanList($request->input('excluded', []));
        $validated['itinerary'] = $this->cleanItinerary($request->input('itinerary', []));
        $validated['show_in_trending'] = $request->boolean('show_in_trending');

        $oldThumbnail = $package->featured_image;
        unset($validated['featured_image']);
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $this->imageStorage->store($request->file('featured_image'), 'packages');
        }

        $gallery = $package->gallery_images ?? [];
        $removeImages = array_intersect($request->input('remove_gallery_images', []), $gallery);
        foreach ($removeImages as $image) {
            $this->deleteStoredImage($image);
        }
        $gallery = array_values(array_diff($gallery, $removeImages));
        $gallery = array_merge($gallery, $this->storeGallery($request));
        $validated['gallery_images'] = $gallery;

        $package->update($validated);
        if (isset($validated['featured_image'])) {
            $this->deleteStoredImage($oldThumbnail);
        }

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        $images = array_merge($package->gallery_images ?? [], [$package->featured_image]);
        $package->delete();
        foreach ($images as $image) {
            $this->deleteStoredImage($image);
        }

        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }

    private function rules(?Package $package = null): array
    {
        $uniqueSlug = 'unique:packages,slug'.($package ? ','.$package->id : '');

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', $uniqueSlug],
            'categories' => ['required', 'array', 'min:1'],
            'categories.*' => ['required', 'in:Umrah,Hajj,Ramzan,Ziyarat'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:4096'],
            'image_alt_text' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:50000'],
            'status' => ['required', 'in:draft,published'],
            'duration' => ['nullable', 'string', 'max:100'],
            'tour_type' => ['nullable', 'string', 'max:100'],
            'group_size' => ['nullable', 'string', 'max:100'],
            'languages' => ['nullable', 'string', 'max:255'],
            'map_embed' => [
                'nullable',
                'string',
                'max:10000',
                function (string $attribute, mixed $value, \Closure $fail): void {
                    if ($value !== null && trim($value) !== '' && GoogleMapsEmbed::extractUrl($value) === null) {
                        $fail('The map embed must be a Google Maps embed URL or iframe.');
                    }
                },
            ],
            'gallery_images' => ['nullable', 'array', 'max:10'],
            'gallery_images.*' => ['image', 'mimes:jpg,jpeg,png', 'max:4096'],
            'included' => ['nullable', 'array'],
            'included.*' => ['nullable', 'string', 'max:255'],
            'excluded' => ['nullable', 'array'],
            'excluded.*' => ['nullable', 'string', 'max:255'],
            'itinerary' => ['nullable', 'array'],
            'itinerary.*.days_label' => ['nullable', 'string', 'max:100'],
            'itinerary.*.description' => ['nullable', 'string', 'max:2000'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'remove_gallery_images' => ['nullable', 'array'],
            'remove_gallery_images.*' => ['string'],
        ];
    }

    private function normalizeCategories(Request $request): void
    {
        if (! $request->exists('categories') && $request->exists('category')) {
            $request->merge(['categories' => [$request->input('category')]]);
        }
    }

    private function storeGallery(Request $request): array
    {
        $paths = [];
        foreach ($request->file('gallery_images', []) as $image) {
            $paths[] = $this->imageStorage->store($image, 'packages/gallery');
        }

        return $paths;
    }

    private function cleanList(array $items): array
    {
        $items = array_map(fn ($item): string => is_string($item) ? trim($item) : '', $items);

        return array_values(array_filter($items, fn (string $item): bool => $item !== ''));
    }

    private function cleanItinerary(array $items): array
    {
        return array_values(array_filter(array_map(function (array $item): array {
            return [
                'days_label' => trim($item['days_label'] ?? ''),
                'description' => BlogContentSanitizer::sanitize($item['description'] ?? ''),
            ];
        }, $items), fn (array $item): bool => $item['days_label'] !== '' || strip_tags($item['description']) !== ''));
    }

    private function deleteStoredImage(?string $path): void
    {
        if ($path && ! Str::startsWith($path, ['http://', 'https://', '/'])) {
            Storage::disk('public')->delete($path);
        }
    }
}
