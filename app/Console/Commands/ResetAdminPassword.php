<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetAdminPassword extends Command
{
    protected $signature = 'admin:password-reset {email : Email address of the admin account}';

    protected $description = 'Reset an admin password using hidden interactive prompts';

    public function handle(): int
    {
        if (! $this->input->isInteractive()) {
            $this->error('Run this command in an interactive terminal so the password can be entered securely.');

            return self::FAILURE;
        }

        $user = User::where('email', $this->argument('email'))->first();

        if (! $user) {
            $this->error('No user account was found for that email address.');

            return self::FAILURE;
        }

        $password = $this->secret('New password (minimum 16 characters)');

        if (! is_string($password) || Str::length($password) < 16) {
            $this->error('The password must be at least 16 characters long.');

            return self::FAILURE;
        }

        $confirmation = $this->secret('Confirm new password');

        if (! is_string($confirmation) || ! hash_equals($password, $confirmation)) {
            $this->error('The passwords do not match.');

            return self::FAILURE;
        }

        $user->forceFill(['password' => Hash::make($password)])->save();

        $this->info('Admin password updated successfully.');

        return self::SUCCESS;
    }
}
