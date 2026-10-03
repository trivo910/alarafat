<?php

namespace App\Providers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (! Schema::hasTable('settings')) {
            return;
        }

        $settings = DB::table('settings')->pluck('value', 'key');

        if ($settings->isEmpty()) {
            return;
        }

        $encryption = $settings->get('smtp_encryption', 'tls');

        config([
            'mail.default' => $settings->get('smtp_mailer', config('mail.default')),
            'mail.mailers.smtp.scheme' => match ($encryption) {
                'ssl' => 'smtps',
                'tls', 'none' => 'smtp',
                default => config('mail.mailers.smtp.scheme'),
            },
            'mail.mailers.smtp.auto_tls' => $encryption !== 'none',
            'mail.mailers.smtp.host' => $settings->get('smtp_host', config('mail.mailers.smtp.host')),
            'mail.mailers.smtp.port' => $settings->get('smtp_port', config('mail.mailers.smtp.port')),
            'mail.mailers.smtp.username' => $settings->get('smtp_username', config('mail.mailers.smtp.username')),
            'mail.from.address' => $settings->get('mail_from_address', config('mail.from.address')),
            'mail.from.name' => $settings->get('mail_from_name', config('mail.from.name')),
        ]);

        if ($settings->has('smtp_password')) {
            config(['mail.mailers.smtp.password' => Crypt::decryptString($settings->get('smtp_password'))]);
        }
    }
}
