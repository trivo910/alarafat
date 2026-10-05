<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Package;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminBlogTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_login_and_view_blogs(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@alarafat.com',
            'password' => bcrypt('Admin@123'),
        ]);

        $this->get('/admin')->assertRedirect('/admin/login');
        $this->get('/admin/login')->assertOk();

        $this->post('/admin/login', [
            'username' => 'admin',
            'password' => 'Admin@123',
        ])->assertRedirect('/admin/dashboard');

        $this->assertAuthenticated();

        $this->get('/admin/blogs')
            ->assertOk()
            ->assertSee('Save as draft')
            ->assertSee('Publish blog');
    }

    public function test_admin_cannot_publish_an_empty_rich_text_blog(): void
    {
        $this->actingAs(User::factory()->create())
            ->post('/admin/blogs', [
                'title' => 'Empty Blog Draft',
                'slug' => 'empty-blog-draft',
                'content' => '<p><br></p>',
                'status' => 'published',
            ])
            ->assertSessionHasErrors('content');

        $this->assertDatabaseMissing('blogs', ['slug' => 'empty-blog-draft']);
    }

    public function test_admin_can_publish_blog_using_publish_action(): void
    {
        $this->actingAs(User::factory()->create())
            ->post('/admin/blogs', [
                'title' => 'Publish Action Blog',
                'slug' => 'publish-action-blog',
                'content' => '<p>Blog content ready to publish.</p>',
                'status' => 'published',
            ])
            ->assertRedirect('/admin/blogs');

        $this->assertDatabaseHas('blogs', [
            'slug' => 'publish-action-blog',
            'status' => 'published',
        ]);
    }

    public function test_admin_dashboard_and_enquiries_start_empty_without_fake_counts(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/admin/dashboard')
            ->assertOk()
            ->assertSee('Packages')
            ->assertSee('Blog posts')
            ->assertSee('New enquiries')
            ->assertSee('No enquiries yet.');

        $this->assertDatabaseCount('packages', 0);
        $this->assertDatabaseCount('blogs', 0);
        $this->assertDatabaseCount('enquiries', 0);

        $this->get('/admin/enquiries')
            ->assertOk()
            ->assertSee('No enquiries yet.');
    }

    public function test_admin_can_create_a_package_manually(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create())
            ->post('/admin/packages', [
                'title' => 'Test Umrah Package',
                'slug' => '',
                'category' => 'Umrah',
                'price' => '95000',
                'description' => '<p>Package details entered by the admin.</p>',
                'status' => 'published',
                'show_in_trending' => '1',
                'duration' => '15 Days',
                'tour_type' => 'Daily Tour',
                'group_size' => '1 person',
                'languages' => 'English',
                'map_embed' => '<iframe title="Map"></iframe>',
                'featured_image' => UploadedFile::fake()->create('thumbnail.jpg', 10, 'image/jpeg'),
                'gallery_images' => [UploadedFile::fake()->create('gallery.jpg', 10, 'image/jpeg')],
                'included' => ['Visa application', '', 'Return flights'],
                'excluded' => ['Personal shopping expenses'],
                'itinerary' => [['days_label' => '5 Days', 'description' => '<p>Visit Madinah.</p>']],
                'meta_title' => 'Test Package SEO',
                'meta_description' => 'Test package meta description',
            ])
            ->assertRedirect('/admin/packages');

        $package = Package::firstOrFail();
        $this->assertSame('test-umrah-package', $package->slug);
        $this->assertSame('published', $package->status);
        $this->assertTrue($package->show_in_trending);
        $this->assertSame(['Umrah'], $package->categories);
        $this->assertSame(['Visa application', 'Return flights'], $package->included);
        $this->assertSame('5 Days', $package->itinerary[0]['days_label']);
        Storage::disk('public')->assertExists($package->featured_image);
        Storage::disk('public')->assertExists($package->gallery_images[0]);

        $this->get('/admin/packages')
            ->assertOk()
            ->assertSee('Test Umrah Package')
            ->assertSee('Umrah');

        $this->get('/admin/packages/'.$package->id.'/edit')
            ->assertOk()
            ->assertSee('Pricing & duration')
            ->assertSee('Current gallery images')
            ->assertSee('Itinerary overview')
            ->assertSee('Test Package SEO')
            ->assertSee('data-source-name="description"', false)
            ->assertDontSee('Feature this package');

        $thumbnail = $package->featured_image;
        $galleryImage = $package->gallery_images[0];
        $this->put('/admin/packages/'.$package->id, [
            'title' => 'Updated Umrah Package',
            'slug' => $package->slug,
            'category' => 'Umrah',
            'price' => '99000',
            'description' => '<p>Updated description.</p>',
            'status' => 'published',
            'duration' => '18 Days',
            'tour_type' => 'Group Tour',
            'group_size' => '2 people',
            'languages' => 'English, Urdu',
            'included' => ['Visa assistance'],
            'excluded' => ['Shopping'],
            'itinerary' => [['days_label' => '6 Days', 'description' => '<p>Updated itinerary.</p>']],
            'remove_gallery_images' => [$galleryImage],
        ])->assertRedirect('/admin/packages');

        $package->refresh();
        $this->assertSame('Updated Umrah Package', $package->title);
        $this->assertSame('18 Days', $package->duration);
        $this->assertSame($thumbnail, $package->featured_image);
        $this->assertSame([], $package->gallery_images);
        Storage::disk('public')->assertExists($thumbnail);
        Storage::disk('public')->assertMissing($galleryImage);
    }

    public function test_admin_can_assign_multiple_categories_to_a_package(): void
    {
        $this->actingAs(User::factory()->create())
            ->post('/admin/packages', [
                'title' => 'Hajj and Umrah Package',
                'slug' => 'hajj-and-umrah-package',
                'categories' => ['Hajj', 'Umrah'],
                'status' => 'published',
                'show_in_trending' => '1',
            ])
            ->assertRedirect('/admin/packages');

        $package = Package::where('slug', 'hajj-and-umrah-package')->firstOrFail();
        $this->assertSame(['Hajj', 'Umrah'], $package->categories);
        $this->assertSame('Hajj', $package->category);

        $this->get('/hajj')->assertSee('Hajj and Umrah Package');
        $this->get('/umrah-package-from-mumbai')->assertSee('Hajj and Umrah Package');
        $this->get('/')->assertSee('Hajj and Umrah Package');
    }

    public function test_published_hajj_package_appears_on_its_page_and_uses_st_tour_url(): void
    {
        $this->actingAs(User::factory()->create());

        $package = Package::create([
            'title' => 'Pilgrim Hajj Package',
            'slug' => 'pilgrim-hajj-package',
            'category' => 'Hajj',
            'price' => 840000,
            'description' => '<p>Package details for Hajj pilgrims.</p>',
            'status' => 'published',
        ]);

        $this->get('/admin/packages')
            ->assertOk()
            ->assertSee('/st-tour/pilgrim-hajj-package', false);

        $this->get('/hajj')
            ->assertOk()
            ->assertSee('Pilgrim Hajj Package')
            ->assertSee('/st-tour/pilgrim-hajj-package', false);

        $this->get('/st-tour/pilgrim-hajj-package')
            ->assertOk()
            ->assertSee('Pilgrim Hajj Package')
            ->assertSee('Package details for Hajj pilgrims.');
    }

    public function test_admin_can_publish_a_ramzan_package_to_the_ramzan_page(): void
    {
        $this->actingAs(User::factory()->create())
            ->post('/admin/packages', [
                'title' => 'Ramzan Admin Package',
                'slug' => 'ramzan-admin-package',
                'category' => 'Ramzan',
                'status' => 'published',
                'price' => '125000',
            ])
            ->assertRedirect('/admin/packages');

        $this->get('/ramzan-umrah-package-from-mumbai')
            ->assertOk()
            ->assertSee('Ramzan Admin Package')
            ->assertSee('/st-tour/ramzan-admin-package', false);

        $this->get('/umrah-package-from-mumbai')
            ->assertDontSee('Ramzan Admin Package');
    }

    public function test_published_admin_blogs_appear_on_listing_and_reusable_detail_page(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create();

        $this->actingAs($admin)->post('/admin/blogs', [
            'title' => 'Latest Admin Umrah Update',
            'slug' => 'latest-admin-umrah-update',
            'featured_image' => UploadedFile::fake()->create('umrah.jpg', 10, 'image/jpeg'),
            'image_alt_text' => 'Umrah update',
            'content' => '<h2>Fresh information for Umrah travelers.</h2><p><strong>Departure update</strong></p><script>alert("unsafe")</script>',
            'status' => 'published',
        ])->assertRedirect('/admin/blogs');

        $blog = Blog::where('slug', 'latest-admin-umrah-update')->firstOrFail();
        Storage::disk('public')->assertExists($blog->featured_image);

        $this->get('/blog')
            ->assertOk()
            ->assertSee('Latest Admin Umrah Update')
            ->assertSee('/latest-admin-umrah-update');

        $this->get('/latest-admin-umrah-update')
            ->assertOk()
            ->assertSee('Latest Admin Umrah Update')
            ->assertSee('Fresh information for Umrah travelers.')
            ->assertSee('<h2>Fresh information for Umrah travelers.</h2>', false)
            ->assertSee('<strong>Departure update</strong>', false)
            ->assertDontSee('unsafe')
            ->assertSee('storage/'.$blog->featured_image, false)
            ->assertSee('Latest Posts')
            ->assertSee('aria-label="Instagram"', false)
            ->assertSee('aria-label="Facebook"', false)
            ->assertSee('aria-label="X"', false);

        $this->get('/blog/latest-admin-umrah-update')
            ->assertRedirect('/latest-admin-umrah-update', 301);

        $this->put('/admin/blogs/'.$blog->id, [
            'title' => $blog->title,
            'slug' => $blog->slug,
            'image_alt_text' => $blog->image_alt_text,
            'content' => $blog->content,
            'status' => $blog->status,
        ])->assertRedirect('/admin/blogs');

        $this->assertSame($blog->featured_image, $blog->fresh()->featured_image);
        Storage::disk('public')->assertExists($blog->featured_image);
    }
}
