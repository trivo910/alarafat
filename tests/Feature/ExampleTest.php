<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee('Welcome to Al Arafat Tours')
            ->assertSee('Mumbai Umrah Packages 2026')
            ->assertSee('Our Commitments')
            ->assertSee('Take a Look Our Haji Says');
    }

    public function test_the_hajj_page_shows_its_packages_and_article(): void
    {
        $this->get('/hajj')
            ->assertOk()
            ->assertSee('Hajj packages from Mumbai')
            ->assertSee('Hajj Package 2026 Double Sharing')
            ->assertSee('₹840,000')
            ->assertSee('Exploring the Spiritual and Cultural Significance of Hajj');
    }

    public function test_the_ziyarat_page_shows_packages_and_article(): void
    {
        $this->get('/ziyarat')
            ->assertOk()
            ->assertSee('Ziyarat Packages')
            ->assertSee('Mumbai Umrah Packages 2026')
            ->assertSee('Exploring the History and Cultural Significance of the Ziyarat')
            ->assertSee('Choose Ziyarat Tour Packages as per your Preference');
    }

    public function test_the_about_page_shows_its_mission_and_promise(): void
    {
        $this->get('/about')
            ->assertOk()
            ->assertSee('About Al Arafat')
            ->assertSee('A Sacred Journey, A Promise Fulfilled')
            ->assertSee('Our Mission and Vision')
            ->assertSee('To offer exceptional support');
    }

    public function test_the_contact_page_shows_the_map_and_contact_form(): void
    {
        $this->get('/contact')
            ->assertOk()
            ->assertSee('Contact with us')
            ->assertSee('Al-Arafat Tours And Travels')
            ->assertSee('Send a message')
            ->assertSee('umrah@alarafat.com');
    }

    public function test_the_umrah_package_page_shows_packages_guide_and_faq(): void
    {
        $this->get('/umrah-package-from-mumbai')
            ->assertOk()
            ->assertSee('Umrah Packages from Mumbai')
            ->assertSee('15 Days Umrah Package From Mumbai – 2026 (Gold Plus)')
            ->assertSee('The rituals of the Umrah pilgrimage')
            ->assertSee('Frequently Asked Questions')
            ->assertSee('Q4. Can I book 10 days before the Umrah tour date?');
    }

    public function test_the_ramzan_umrah_page_shows_its_content(): void
    {
        $this->get('/ramzan-umrah-package-from-mumbai')
            ->assertOk()
            ->assertSee('Ramzan Umrah Packages from Mumbai')
            ->assertSee('The Spiritual and Physical Benefits of Umrah')
            ->assertSee('What our clients say');
    }

    public function test_the_blog_page_loads_with_listing_content(): void
    {
        $this->get('/blog')
            ->assertOk()
            ->assertDontSee('Best Time to Book Umrah Packages from Mumbai')
            ->assertSee('Popular posts')
            ->assertDontSee('Tags');
    }

    public function test_the_retired_featured_article_url_is_not_available(): void
    {
        $this->get('/cheapest-umrah-packages-from-mumbai-a-journey-made-affordable')
            ->assertNotFound();
    }
}
