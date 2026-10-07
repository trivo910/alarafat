<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = config('admin.bootstrap_user');

        if (collect($admin)->every(fn ($value): bool => $value === null || $value === '')) {
            return;
        }

        $admin = Validator::make($admin, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:16'],
        ])->validate();

        User::firstOrCreate(
            ['email' => $admin['email']],
            [
                'name' => $admin['name'],
                'username' => $admin['username'],
                'password' => Hash::make($admin['password']),
            ]
        );
    }
}
