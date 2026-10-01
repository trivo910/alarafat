<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $loginCandidates = [
            ['email' => $credentials['username'], 'password' => $credentials['password']],
            ['username' => $credentials['username'], 'password' => $credentials['password']],
            ['name' => $credentials['username'], 'password' => $credentials['password']],
        ];

        foreach ($loginCandidates as $attempt) {
            if (Auth::attempt($attempt, $request->boolean('remember'))) {
                $request->session()->regenerate();

                return redirect()->intended('/admin/dashboard');
            }
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
