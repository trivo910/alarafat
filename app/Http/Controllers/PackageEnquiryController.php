<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PackageEnquiryController extends Controller
{
    public function store(Request $request, string $slug): RedirectResponse
    {
        $package = Package::query()
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

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
            'type' => 'Booking',
            'package_id' => $package->id,
            'package_name' => $package->title,
            'message' => $validated['message'],
        ]);

        return redirect()->route('packages.show', $package->slug)
            ->with('status', 'Thank you for your enquiry. We will get back to you soon.');
    }
}
