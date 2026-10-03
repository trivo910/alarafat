<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\AppServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AdminSmtpSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_save_smtp_settings_and_password_is_encrypted(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/admin/smtp')
            ->assertOk()
            ->assertSee('SMTP host')
            ->assertSee('From address');

        $this->put('/admin/smtp', [
            'mailer' => 'smtp',
            'encryption' => 'ssl',
            'host' => 'mail.example.com',
            'port' => 465,
            'username' => 'mailer@example.com',
            'password' => 'smtp-secret',
            'from_address' => 'hello@example.com',
            'from_name' => 'Al Arafat',
        ])->assertRedirect('/admin/smtp');

        $encryptedPassword = DB::table('settings')->where('key', 'smtp_password')->value('value');
        $this->assertNotSame('smtp-secret', $encryptedPassword);
        $this->assertSame('smtp-secret', Crypt::decryptString($encryptedPassword));
        $this->assertDatabaseHas('settings', [
            'key' => 'smtp_mailer',
            'value' => 'smtp',
        ]);

        (new AppServiceProvider(app()))->boot();
        $this->assertSame('smtp', config('mail.default'));
        $this->assertSame('smtps', config('mail.mailers.smtp.scheme'));
        $this->assertSame('mail.example.com', config('mail.mailers.smtp.host'));
        $this->assertSame('hello@example.com', config('mail.from.address'));
        $this->assertSame('smtp-secret', config('mail.mailers.smtp.password'));
    }

    public function test_blank_password_keeps_existing_password_and_is_never_prefilled(): void
    {
        $this->actingAs(User::factory()->create());
        $this->put('/admin/smtp', [
            'mailer' => 'smtp',
            'encryption' => 'tls',
            'host' => 'mail.example.com',
            'port' => 587,
            'username' => 'mailer@example.com',
            'password' => 'smtp-secret',
            'from_address' => 'hello@example.com',
            'from_name' => 'Al Arafat',
        ]);

        $this->put('/admin/smtp', [
            'mailer' => 'smtp',
            'encryption' => 'tls',
            'host' => 'mail.example.com',
            'port' => 587,
            'username' => 'mailer@example.com',
            'password' => '',
            'from_address' => 'hello@example.com',
            'from_name' => 'Al Arafat',
        ])->assertRedirect('/admin/smtp');

        $this->assertSame(
            'smtp-secret',
            Crypt::decryptString(DB::table('settings')->where('key', 'smtp_password')->value('value'))
        );
        $this->get('/admin/smtp')->assertOk()->assertDontSee('smtp-secret');
    }
}
