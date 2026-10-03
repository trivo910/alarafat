<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AdminSmtpSettingsController extends Controller
{
    public function edit()
    {
        $settings = DB::table('settings')->pluck('value', 'key');

        return view('admin.smtp.edit', [
            'mailer' => $settings->get('smtp_mailer') ?? config('mail.default'),
            'encryption' => $settings->get('smtp_encryption')
                ?? (config('mail.mailers.smtp.port') == 465 ? 'ssl' : 'tls'),
            'host' => $settings->get('smtp_host') ?? config('mail.mailers.smtp.host'),
            'port' => $settings->get('smtp_port') ?? config('mail.mailers.smtp.port'),
            'username' => $settings->get('smtp_username') ?? config('mail.mailers.smtp.username'),
            'passwordIsSet' => $settings->has('smtp_password'),
            'fromAddress' => $settings->get('mail_from_address') ?? config('mail.from.address'),
            'fromName' => $settings->get('mail_from_name') ?? config('mail.from.name'),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'mailer' => ['required', 'in:smtp,sendmail,log,array'],
            'encryption' => ['required', 'in:tls,ssl,none'],
            'host' => ['required_if:mailer,smtp', 'nullable', 'string', 'max:255'],
            'port' => ['required_if:mailer,smtp', 'nullable', 'integer', 'between:1,65535'],
            'username' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'max:1000'],
            'from_address' => ['required', 'email', 'max:255'],
            'from_name' => ['required', 'string', 'max:255'],
        ]);

        $settings = [
            'smtp_mailer' => $validated['mailer'],
            'smtp_encryption' => $validated['encryption'],
            'smtp_host' => $validated['host'] ?? null,
            'smtp_port' => $validated['port'] ?? null,
            'smtp_username' => $validated['username'] ?? null,
            'mail_from_address' => $validated['from_address'],
            'mail_from_name' => $validated['from_name'],
        ];

        if (! empty($validated['password'])) {
            $settings['smtp_password'] = Crypt::encryptString($validated['password']);
        }

        $timestamp = now();
        DB::table('settings')->upsert(
            collect($settings)->map(fn ($value, $key) => [
                'key' => $key,
                'value' => $value,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ])->all(),
            ['key'],
            ['value', 'updated_at']
        );

        return redirect()->route('admin.smtp.edit')->with('success', 'SMTP settings saved.');
    }
}
