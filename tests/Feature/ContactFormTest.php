<?php

namespace Tests\Feature;

use App\Mail\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_uses_a_same_origin_post_and_csrf_token(): void
    {
        $this->get('/contact')
            ->assertOk()
            ->assertSee('action="/contact"', false)
            ->assertSee('name="_token"', false)
            ->assertDontSee('action="mailto:umrah@alarafat.com"', false);
    }

    public function test_contact_form_sends_message_to_the_contact_email(): void
    {
        Mail::fake();

        $this->post('/contact', [
            'name' => 'Arafat Visitor',
            'email' => 'visitor@example.com',
            'phone' => '+91 98765 43210',
            'message' => 'Please share details about your packages.',
        ])->assertRedirect('/contact')
            ->assertSessionHas('status');

        $this->assertDatabaseHas('enquiries', [
            'name' => 'Arafat Visitor',
            'email' => 'visitor@example.com',
            'type' => 'Contact',
            'message' => 'Please share details about your packages.',
        ]);

        Mail::assertSent(ContactMessage::class, function (ContactMessage $mail): bool {
            return $mail->hasTo('umrah@alarafat.com')
                && $mail->name === 'Arafat Visitor'
                && $mail->email === 'visitor@example.com'
                && $mail->phone === '+91 98765 43210'
                && $mail->body === 'Please share details about your packages.';
        });
    }

    public function test_contact_form_rejects_invalid_input_without_sending_mail(): void
    {
        Mail::fake();

        $this->from('/contact')->post('/contact', [
            'name' => '',
            'email' => 'not-an-email',
            'message' => '',
        ])->assertRedirect('/contact')
            ->assertSessionHasErrors(['name', 'email', 'message']);

        Mail::assertNothingSent();
    }
}
