<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:10000'],
        ]);

        Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'type' => 'Contact',
            'message' => $validated['message'],
        ]);

        Mail::to('umrah@alarafat.com')->send(new ContactMessage(
            name: $validated['name'],
            email: $validated['email'],
            phone: $validated['phone'] ?? null,
            body: $validated['message'],
        ));

        return redirect()->route('contact')->with('status', 'Thank you for your message. We will get back to you soon.');
    }
}
