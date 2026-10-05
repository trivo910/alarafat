<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadedImageNamesTest extends TestCase
{
    use RefreshDatabase;

    public function test_package_and_blog_images_keep_safe_original_names_and_avoid_overwriting(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create());

        $this->post('/admin/packages', [
            'title' => 'First Package',
            'slug' => 'first-package',
            'category' => 'Hajj',
            'status' => 'draft',
            'featured_image' => UploadedFile::fake()->create('Hajj Cover.jpg', 10, 'image/jpeg'),
            'gallery_images' => [UploadedFile::fake()->create('Gallery Photo.png', 10, 'image/png')],
        ])->assertRedirect('/admin/packages');

        $this->post('/admin/packages', [
            'title' => 'Second Package',
            'slug' => 'second-package',
            'category' => 'Hajj',
            'status' => 'draft',
            'featured_image' => UploadedFile::fake()->create('Hajj Cover.jpg', 10, 'image/jpeg'),
        ])->assertRedirect('/admin/packages');

        $this->post('/admin/blogs', [
            'title' => 'Travel Update',
            'slug' => 'travel-update',
            'content' => '<p>Latest travel update.</p>',
            'status' => 'draft',
            'featured_image' => UploadedFile::fake()->create('Travel News.png', 10, 'image/png'),
        ])->assertRedirect('/admin/blogs');

        $this->assertDatabaseHas('packages', [
            'slug' => 'first-package',
            'featured_image' => 'packages/hajj-cover.jpg',
        ]);
        $this->assertDatabaseHas('packages', [
            'slug' => 'second-package',
            'featured_image' => 'packages/hajj-cover-2.jpg',
        ]);
        $this->assertDatabaseHas('blogs', [
            'slug' => 'travel-update',
            'featured_image' => 'blogs/travel-news.png',
        ]);
        Storage::disk('public')->assertExists('packages/gallery/gallery-photo.png');
    }
}
