<?php

namespace Tests\Feature;

use App\Models\Package;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PackageEnquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_package_detail_displays_an_enquiry_form_instead_of_booking_form(): void
    {
        $package = $this->publishedPackage();

        $this->get(route('packages.show', $package->slug))
            ->assertOk()
            ->assertSee('Enquire About This Package')
            ->assertSee('Send Enquiry')
            ->assertSee('action="/st-tour/'.$package->slug.'/enquiry"', false)
            ->assertDontSee('Book now')
            ->assertDontSee('data-package-booking');
    }

    public function test_package_enquiry_is_saved_and_visible_in_admin_details(): void
    {
        $package = $this->publishedPackage();

        $this->post(route('packages.enquiry', $package->slug), [
            'name' => 'Arafat Visitor',
            'email' => 'visitor@example.com',
            'phone' => '+91 98765 43210',
            'message' => 'Please send me the itinerary.',
        ])->assertRedirect(route('packages.show', $package->slug))
            ->assertSessionHas('status');

        $this->assertDatabaseHas('enquiries', [
            'name' => 'Arafat Visitor',
            'email' => 'visitor@example.com',
            'phone' => '+91 98765 43210',
            'type' => 'Booking',
            'package_id' => $package->id,
            'package_name' => $package->title,
            'message' => 'Please send me the itinerary.',
        ]);

        $this->actingAs(User::factory()->create())
            ->get(route('admin.enquiries'))
            ->assertOk()
            ->assertSee('Arafat Visitor')
            ->assertSee($package->title)
            ->assertSee('Booking');

        $enquiryId = (int) \Illuminate\Support\Facades\DB::table('enquiries')->value('id');

        $this->get(route('admin.enquiries.show', $enquiryId))
            ->assertOk()
            ->assertSee('admin.css?v='.filemtime(public_path('css/pages/admin.css')), false)
            ->assertSee('visitor@example.com')
            ->assertSee('+91 98765 43210')
            ->assertSee($package->title)
            ->assertSee('Please send me the itinerary.');
    }

    public function test_package_enquiry_requires_valid_customer_details(): void
    {
        $package = $this->publishedPackage();

        $this->from(route('packages.show', $package->slug))
            ->post(route('packages.enquiry', $package->slug), [
                'name' => '',
                'email' => 'invalid',
                'message' => '',
            ])
            ->assertRedirect(route('packages.show', $package->slug))
            ->assertSessionHasErrors(['name', 'email', 'message']);

        $this->assertDatabaseCount('enquiries', 0);
    }

    private function publishedPackage(): Package
    {
        return Package::create([
            'title' => '15 Days Umrah Package',
            'slug' => '15-days-umrah-package',
            'category' => 'Umrah',
            'price' => 95786,
            'status' => 'published',
        ]);
    }
}
